<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * MQQuestionPriority class
 *
 * @param int $id
 * @param string $name
 */
class MQQuestionPriority extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

}
