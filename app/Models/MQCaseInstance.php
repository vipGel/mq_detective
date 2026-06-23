<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * MQCaseInstance class
 *
 * @param int $id
 * @param string $name
 * @param float|null $team_points
 * @param MQCase $case
 */
class MQCaseInstance extends Model
{
    protected $fillable = [
        'name',
        'team_points',
        'admin_id',
        'm_q_case_id',
        'm_q_instance_state_id',
    ];

    protected $appends = [
        'calculated_team_points',
    ];

    const threshold = 60;

//    public int $id;

    public function mQCase(): BelongsTo
    {
        return $this->belongsTo(MQCase::class, 'm_q_case_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mQInstanceState(): BelongsTo
    {
        return $this->belongsTo(MQInstanceState::class, 'm_q_case_id');
    }

    public function userAddress(): HasMany
    {
        return $this->hasMany(UserMQAddressMQCaseInstance::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_m_q_case_instance',
            'm_q_case_instance_id',
            'user_id'
        );
    }

    public function mQUserAnswers(): HasMany
    {
        return $this->hasMany(MQUserAnswer::class);
    }

    public function getCalculatedTeamPointsAttribute(): float
    {
        return $this->teamPoints();
    }

    public function teamPoints(): float
    {
        $coefAboveThreshold = 100; // Коэффициент если очки команды больше порога
        $coefBelowThreshold = 25; // Коэффициент если очки команды ниже порога

        $points = 0; // общие очки команды за вопросы
        $maxTeamPoints = 0; // максимум очков набранные в игре за вопросы

        $admin_id = $this->admin()->first()->id;

        // получение всех команд которые сейчас играют
        $instances = MQCaseInstance::where('m_q_instance_state_id', MQInstanceState::started)
            ->where('admin_id', $admin_id)
            ->get();

        // вычисление максимума очков набранных в игре за вопросы
        foreach ($instances as $instance) {
            // очки одной команды
            $instanceUserAnswerPoints = 0;
            $instance->mQUserAnswers()->each(function (MQUserAnswer $answer) use (&$instanceUserAnswerPoints) {
                $instanceUserAnswerPoints += $answer->points ?? 0;
            });
            if ($instanceUserAnswerPoints > $maxTeamPoints) {
                $maxTeamPoints = $instanceUserAnswerPoints;
            }

            // очки текущей команды
            if ($this->id == $instance->id) {
                $points = $instanceUserAnswerPoints;
            }
        }

        // вычисление порога очков
        $thresholdPoints = $maxTeamPoints / self::threshold;

        // определение прошла ли команда через порог
        $coef = $points > $thresholdPoints ? $coefAboveThreshold : $coefBelowThreshold;

        // количество поездок команды
        $trips = $this->userAddress()->count();
        if ($trips === 0) {
            return 0;
        }

        try {
            // очки в квадрате умноженные на коэффициент деленные на количество поездок
            return (($points * $points) * $coef) / $trips;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function teamPointsSimplified(): float
    {
        $points = 0;
        $this->mQUserAnswers()->each(function (MQUserAnswer $answer) use (&$points) {
            $points += $answer->points ?? 0;
        });

        $trips = $this->userAddress()->count();
        if ($trips === 0) {
            return 0;
        }

        return 20 * $points * $points / sqrt($trips);
    }
}
