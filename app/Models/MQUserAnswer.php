<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * MQUserAnswer class
 *
 * @param int $id
 * @param string $answer
 * @param integer|null $points
 * @param MQQuestion $question
 * @param User $user
 * @param MQCaseInstance $instance
 */
class MQUserAnswer extends Model
{
    protected $fillable = [
        'answer',
        'points',
        'm_q_question_id',
        'user_id',
        'm_q_instance_id',
    ];

    //TODO make $points to be filled only by team admin

    public function question(): BelongsTo
    {
        return $this->belongsTo(MQQuestion::class, 'm_q_question_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function instance(): BelongsTo
    {
        return $this->belongsTo(MQCaseInstance::class, 'm_q_instance_id');
    }
}
