<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * MQUserAnswer class
 *
 * @param int $id
 * @param string $answer
 * @param string|null $points
 */
class MQUserAnswer extends Model
{
    protected $fillable = [
        'answer',
    ];

    //TODO make $points to be filled only by team admin

    public function question(): BelongsTo
    {
        return $this->belongsTo(MQQuestion::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function instance(): BelongsTo
    {
        return $this->belongsTo(MQCaseInstance::class);
    }
}
