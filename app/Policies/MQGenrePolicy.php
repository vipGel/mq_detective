<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MQGenre;
use Illuminate\Auth\Access\HandlesAuthorization;

class MQGenrePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MQGenre');
    }

    public function view(AuthUser $authUser, MQGenre $mQGenre): bool
    {
        return $authUser->can('View:MQGenre');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MQGenre');
    }

    public function update(AuthUser $authUser, MQGenre $mQGenre): bool
    {
        return $authUser->can('Update:MQGenre');
    }

    public function delete(AuthUser $authUser, MQGenre $mQGenre): bool
    {
        return $authUser->can('Delete:MQGenre');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MQGenre');
    }

    public function restore(AuthUser $authUser, MQGenre $mQGenre): bool
    {
        return $authUser->can('Restore:MQGenre');
    }

    public function forceDelete(AuthUser $authUser, MQGenre $mQGenre): bool
    {
        return $authUser->can('ForceDelete:MQGenre');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MQGenre');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MQGenre');
    }

    public function replicate(AuthUser $authUser, MQGenre $mQGenre): bool
    {
        return $authUser->can('Replicate:MQGenre');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MQGenre');
    }

}