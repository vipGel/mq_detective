<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * MQCaseInstance class
 *
 * @param int $id
 * @param string $name
 * @param float|null $team_points
 * @param MQCase $case
 */
class MQCaseInstance extends Model
{
    protected $fillable = [
        'name',
    ];

    //TODO make a function to calculate $team_points

    public function case(): BelongsTo
    {
        return $this->belongsTo(MQCase::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(MQInstanceState::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
