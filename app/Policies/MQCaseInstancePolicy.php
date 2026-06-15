<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MQCaseInstance;
use Illuminate\Auth\Access\HandlesAuthorization;

class MQCaseInstancePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MQCaseInstance');
    }

    public function view(AuthUser $authUser, MQCaseInstance $mQCaseInstance): bool
    {
//        return $authUser->can('View:MQCaseInstance');
        if (auth()->user()->hasRole('super_admin')) {
            return true;
        }
        return $authUser->id == $mQCaseInstance->admin()->first()->id;
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MQCaseInstance');
    }

    public function update(AuthUser $authUser, MQCaseInstance $mQCaseInstance): bool
    {
        if (auth()->user()->hasRole('super_admin')) {
            return true;
        }
        return $authUser->id == $mQCaseInstance->admin()->first()->id;
//        return $authUser->can('Update:MQCaseInstance');
    }

    public function delete(AuthUser $authUser, MQCaseInstance $mQCaseInstance): bool
    {
        if (auth()->user()->hasRole('super_admin')) {
            return true;
        }
        return $authUser->id == $mQCaseInstance->admin()->first()->id;
//        return $authUser->can('Delete:MQCaseInstance');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MQCaseInstance');
    }

    public function restore(AuthUser $authUser, MQCaseInstance $mQCaseInstance): bool
    {
        return $authUser->can('Restore:MQCaseInstance');
    }

    public function forceDelete(AuthUser $authUser, MQCaseInstance $mQCaseInstance): bool
    {
        return $authUser->can('ForceDelete:MQCaseInstance');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MQCaseInstance');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MQCaseInstance');
    }

    public function replicate(AuthUser $authUser, MQCaseInstance $mQCaseInstance): bool
    {
        return $authUser->can('Replicate:MQCaseInstance');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MQCaseInstance');
    }

}
