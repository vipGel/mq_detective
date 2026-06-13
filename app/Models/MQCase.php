<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * MQCase class
 *
 * @param int $id
 * @param string $name
 * @param string $briefing
 * @param string $debriefing
 * @param MQGenre $genre
 */
class MQCase extends Model
{
    protected $fillable = [
        'name',
        'briefing',
        'debriefing',
        'm_q_genre_id',
    ];

    public $timestamps = false;


    public function genre(): BelongsTo
    {
        return $this->belongsTo(MQGenre::class, 'm_q_genre_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(MQQuestion::class);
    }

    public function tips(): HasMany
    {
        return $this->hasMany(MQTips::class);
    }
}
