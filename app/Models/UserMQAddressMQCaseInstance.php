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

    public function address(): BelongsTo
    {
        return $this->belongsTo(MQAddress::class);
    }

    public function instance(): BelongsTo
    {
        return $this->belongsTo(MQCaseInstance::class);
    }
}
