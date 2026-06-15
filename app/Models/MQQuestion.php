<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * MQQuestion class
 *
 * @param int $id
 * @param string $question
 * @param string $answer
 * @param string $proof
 * @param integer $max_points
 * @param MQCase $case
 * @param MQQuestionPriority $question_priority
 */
class MQQuestion extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'proof',
        'max_points',
        'm_q_case_id',
        'm_q_question_priority_id',
    ];

    public $timestamps = false;

    public function mQCase(): BelongsTo
    {
        return $this->belongsTo(MQCase::class, 'm_q_case_id');
    }
    public function mQQuestionPriority(): BelongsTo
    {
        return $this->belongsTo(MQQuestionPriority::class, 'm_q_question_priority_id');
    }
}
