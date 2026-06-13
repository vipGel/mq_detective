<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * MQQuestionPriority class
 *
 * @param int $id
 * @param string $hint
 * @param string $clue don't show to user
 * @param integer $time minutes after game starts to show this tip
 * @param MQCase $case
 */
class MQTips extends Model
{
    protected $fillable = [
        'hint',
        'clue',
        'time',
        'm_q_case_id',
    ];

    public $timestamps = false;


    //TODO figure out how to make $time

    public function case(): BelongsTo
    {
        return $this->belongsTo(MQCase::class, 'm_q_case_id');
    }
}
