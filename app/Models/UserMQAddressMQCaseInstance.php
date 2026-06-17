<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * UserMQAddressMQCaseInstance class
 *
 * @param int $user_id
 * @param int $m_q_address_id
 * @param int $m_q_case_instance_id
 */
class UserMQAddressMQCaseInstance extends Pivot
{

    public $timestamps = false;
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mQAddress(): BelongsTo
    {
        return $this->belongsTo(MQAddress::class, 'm_q_address_id');
    }

    public function mQCaseInstance(): BelongsTo
    {
        return $this->belongsTo(MQCaseInstance::class, 'm_q_case_instance_id');
    }
}
