<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Role class
 *
 * @param int $id
 * @param string $name
 * @param User[] $users
 */
class Role extends Model
{
    public mixed $name;
    protected $fillable = [
        'name',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
