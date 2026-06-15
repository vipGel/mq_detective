<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MQInstanceState;
use Illuminate\Auth\Access\HandlesAuthorization;

class MQInstanceStatePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MQInstanceState');
    }

    public function view(AuthUser $authUser, MQInstanceState $mQInstanceState): bool
    {
        return $authUser->can('View:MQInstanceState');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MQInstanceState');
    }

    public function update(AuthUser $authUser, MQInstanceState $mQInstanceState): bool
    {
        return $authUser->can('Update:MQInstanceState');
    }

    public function delete(AuthUser $authUser, MQInstanceState $mQInstanceState): bool
    {
        return $authUser->can('Delete:MQInstanceState');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MQInstanceState');
    }

    public function restore(AuthUser $authUser, MQInstanceState $mQInstanceState): bool
    {
        return $authUser->can('Restore:MQInstanceState');
    }

    public function forceDelete(AuthUser $authUser, MQInstanceState $mQInstanceState): bool
    {
        return $authUser->can('ForceDelete:MQInstanceState');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MQInstanceState');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MQInstanceState');
    }

    public function replicate(AuthUser $authUser, MQInstanceState $mQInstanceState): bool
    {
        return $authUser->can('Replicate:MQInstanceState');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MQInstanceState');
    }

}