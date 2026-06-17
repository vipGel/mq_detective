<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * User class
 *
 * @param int $id
 * @param string $name
 * @param string $email
// * @param Role $role
 */
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
//        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

//    public function role(): BelongsTo
//    {
//        return $this->belongsTo(Role::class);
//    }

//    public function hasRole(string|array $roles): bool
//    {
//        return in_array($this->role->name, Arr::wrap($roles));
//    }

    protected static function booted(): void
    {
        static::creating(function (User $user) {
            // Assign the role 'user' right before saving
            $user->assignRole('Participant');
        });
    }

    public function mQAddresses(): BelongsToMany
    {
        return $this->belongsToMany(MQAddress::class)->using(UserMQAddressMQCaseInstance::class);
    }

    public function mQCaseInstances(): BelongsToMany
    {
        return $this->belongsToMany(
            MQCaseInstance::class,
            'user_m_q_case_instance',
            'user_id',
            'm_q_case_instance_id'
        );
    }
}
