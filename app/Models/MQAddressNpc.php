<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * MQAddressNpc class
 *
 * @param int $id
 * @param string $information
 * @param string $applicationPath
 * @param MQAddress $address
 * @param MQCase $case
 */
class MQAddressNpc extends Model
{
    protected $fillable = [
        'information',
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(MQAddress::class);
    }
    public function case(): BelongsTo
    {
        return $this->belongsTo(MQCase::class);
    }

    //TODO add access to application
}
