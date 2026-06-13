<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'm_q_genre_id',
        'm_q_address_object_id',
    ];

    public $timestamps = false;

    public function genre(): BelongsTo
    {
        return $this->belongsTo(MQGenre::class, 'm_q_genre_id');
    }

    public function addressObject(): BelongsTo
    {
        return $this->belongsTo(MQAddressObject::class, 'm_q_address_object_id');
    }

    public function npcs(): HasMany
    {
        return $this->hasMany(MQAddressNpc::class);
    }

    public function hasNpc(int $case_id): bool
    {
        return $this->npcs()->where('m_q_case_id', $case_id)->exists();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(UserMQAddressMQCaseInstance::class);
    }
}
