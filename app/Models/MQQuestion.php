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
 * @param MQQuestionPriority $questionPriority
 */
class MQQuestion extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'proof',
        'max_points',
    ];

    public function case(): BelongsTo
    {
        return $this->belongsTo(MQCase::class);
    }
    public function questionPriority(): BelongsTo
    {
        return $this->belongsTo(MQQuestionPriority::class);
    }
}
