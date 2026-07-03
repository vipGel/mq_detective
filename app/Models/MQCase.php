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
 * @param User $author
 */
class MQCase extends Model
{
    protected $fillable = [
        'name',
        'briefing',
        'debriefing',
        'm_q_genre_id',
        'author_id',
    ];

    public $timestamps = false;


    public function mQGenre(): BelongsTo
    {
        return $this->belongsTo(MQGenre::class, 'm_q_genre_id');
    }

    public function mQQuestions(): HasMany
    {
        return $this->hasMany(MQQuestion::class);
    }

    public function mQTips(): HasMany
    {
        return $this->hasMany(MQTips::class);
    }

    public function author(): BelongsTo{
        return $this->belongsTo(User::class, 'author_id');
    }
}
