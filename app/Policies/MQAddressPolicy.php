<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MQAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class MQAddressPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return true;
    }

    public function view(AuthUser $authUser, MQAddress $mQAddress): bool
    {
        return true;
    }

    public function create(AuthUser $authUser): bool
    {
        return true;
    }

    public function update(AuthUser $authUser, MQAddress $mQAddress): bool
    {
        return $mQAddress->author_id == $authUser->id || $authUser->hasRole('super_admin');
    }

    public function delete(AuthUser $authUser, MQAddress $mQAddress): bool
    {
        return $mQAddress->author_id == $authUser->id || $authUser->hasRole('super_admin');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MQAddress');
    }

    public function restore(AuthUser $authUser, MQAddress $mQAddress): bool
    {
        return $authUser->can('Restore:MQAddress');
    }

    public function forceDelete(AuthUser $authUser, MQAddress $mQAddress): bool
    {
        return $authUser->can('ForceDelete:MQAddress');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MQAddress');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MQAddress');
    }

    public function replicate(AuthUser $authUser, MQAddress $mQAddress): bool
    {
        return $authUser->can('Replicate:MQAddress');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MQAddress');
    }

}
