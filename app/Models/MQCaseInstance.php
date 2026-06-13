<?php

namespace App\Models;

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

    //TODO make a function to calculate $team_points

    public function case(): BelongsTo
    {
        return $this->belongsTo(MQCase::class, 'm_q_case_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(MQInstanceState::class, 'm_q_case_id');
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
}
