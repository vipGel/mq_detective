<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * MQGenre class
 *
 * @param int $id
 * @param string $name
 */
class MQGenre extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
}
