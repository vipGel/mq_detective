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
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

}
