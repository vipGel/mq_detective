<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MQAddressObject;
use Illuminate\Auth\Access\HandlesAuthorization;

class MQAddressObjectPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MQAddressObject');
    }

    public function view(AuthUser $authUser, MQAddressObject $mQAddressObject): bool
    {
        return $authUser->can('View:MQAddressObject');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MQAddressObject');
    }

    public function update(AuthUser $authUser, MQAddressObject $mQAddressObject): bool
    {
        return $authUser->can('Update:MQAddressObject');
    }

    public function delete(AuthUser $authUser, MQAddressObject $mQAddressObject): bool
    {
        return $authUser->can('Delete:MQAddressObject');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MQAddressObject');
    }

    public function restore(AuthUser $authUser, MQAddressObject $mQAddressObject): bool
    {
        return $authUser->can('Restore:MQAddressObject');
    }

    public function forceDelete(AuthUser $authUser, MQAddressObject $mQAddressObject): bool
    {
        return $authUser->can('ForceDelete:MQAddressObject');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MQAddressObject');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MQAddressObject');
    }

    public function replicate(AuthUser $authUser, MQAddressObject $mQAddressObject): bool
    {
        return $authUser->can('Replicate:MQAddressObject');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MQAddressObject');
    }

}