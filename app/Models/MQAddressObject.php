<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * MQAddressObject class
 *
 * @param int $id
 * @param string $name
 */
class MQAddressObject extends Model
{
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;

}
