<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Items;
use App\Models\User;

class ItemsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Items');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Items $items): bool
    {
        return $user->checkPermissionTo('view Items');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Items');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Items $items): bool
    {
        return $user->checkPermissionTo('update Items');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Items $items): bool
    {
        return $user->checkPermissionTo('delete Items');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Items $items): bool
    {
        return $user->checkPermissionTo('restore Items');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Items $items): bool
    {
        return $user->checkPermissionTo('force-delete Items');
    }
}
