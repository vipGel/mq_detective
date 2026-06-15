<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MQQuestionPriority;
use Illuminate\Auth\Access\HandlesAuthorization;

class MQQuestionPriorityPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MQQuestionPriority');
    }

    public function view(AuthUser $authUser, MQQuestionPriority $mQQuestionPriority): bool
    {
        return $authUser->can('View:MQQuestionPriority');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MQQuestionPriority');
    }

    public function update(AuthUser $authUser, MQQuestionPriority $mQQuestionPriority): bool
    {
        return $authUser->can('Update:MQQuestionPriority');
    }

    public function delete(AuthUser $authUser, MQQuestionPriority $mQQuestionPriority): bool
    {
        return $authUser->can('Delete:MQQuestionPriority');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MQQuestionPriority');
    }

    public function restore(AuthUser $authUser, MQQuestionPriority $mQQuestionPriority): bool
    {
        return $authUser->can('Restore:MQQuestionPriority');
    }

    public function forceDelete(AuthUser $authUser, MQQuestionPriority $mQQuestionPriority): bool
    {
        return $authUser->can('ForceDelete:MQQuestionPriority');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MQQuestionPriority');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MQQuestionPriority');
    }

    public function replicate(AuthUser $authUser, MQQuestionPriority $mQQuestionPriority): bool
    {
        return $authUser->can('Replicate:MQQuestionPriority');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MQQuestionPriority');
    }

}