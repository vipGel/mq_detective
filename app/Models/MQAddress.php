<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * MQAddress class
 *
 * @param int $id
 * @param string $name
 * @param string $number
 * @param MQGenre $genre
 * @param MQAddressObject $addressObject
 */
class MQAddress extends Model
{
    protected $fillable = [
        'name',
        'number',
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(MQGenre::class);
    }

    public function addressObject(): BelongsTo
    {
        return $this->belongsTo(MQAddressObject::class);
    }

    public function npcs(): HasMany
    {
        return $this->hasMany(MQAddressNpc::class);
    }
}
