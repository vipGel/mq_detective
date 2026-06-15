<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MQCase;
use Illuminate\Auth\Access\HandlesAuthorization;

class MQCasePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MQCase');
    }

    public function view(AuthUser $authUser, MQCase $mQCase): bool
    {
        return $authUser->can('View:MQCase');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MQCase');
    }

    public function update(AuthUser $authUser, MQCase $mQCase): bool
    {
        return $authUser->can('Update:MQCase');
    }

    public function delete(AuthUser $authUser, MQCase $mQCase): bool
    {
        return $authUser->can('Delete:MQCase');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MQCase');
    }

    public function restore(AuthUser $authUser, MQCase $mQCase): bool
    {
        return $authUser->can('Restore:MQCase');
    }

    public function forceDelete(AuthUser $authUser, MQCase $mQCase): bool
    {
        return $authUser->can('ForceDelete:MQCase');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MQCase');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MQCase');
    }

    public function replicate(AuthUser $authUser, MQCase $mQCase): bool
    {
        return $authUser->can('Replicate:MQCase');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MQCase');
    }

}