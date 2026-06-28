<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * MQInstanceState class
 *
 * @param int $id
 * @param string $name
 */
class MQInstanceState extends Model
{

    const not_started = 'not started';
    const started = 'started';
    const paused = 'paused';
    const ended = 'ended';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

}
