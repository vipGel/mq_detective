<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserMQAddressMQCaseInstance extends Pivot
{
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
