<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * MQAddressObject class
 *
 * @param int $id
 * @param string $name
 * @param User $author
 */
class MQAddressObject extends Model
{
    protected $fillable = [
        'name',
        'author_id',
    ];
    public $timestamps = false;

    public function author(): BelongsTo{
        return $this->belongsTo(User::class, 'author_id');
    }
}
