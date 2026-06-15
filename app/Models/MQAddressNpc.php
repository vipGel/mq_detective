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
        'application_path',
        'm_q_address_id',
        'm_q_case_id',
    ];
    public $timestamps = false;

    public function mQAddress(): BelongsTo
    {
        return $this->belongsTo(MQAddress::class, 'm_q_address_id');
    }
    public function mQCase(): BelongsTo
    {
        return $this->belongsTo(MQCase::class, 'm_q_case_id');
    }

    //TODO add access to application
}
