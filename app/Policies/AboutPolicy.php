<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\About;
use App\Models\User;

class AboutPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any About');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, About $about): bool
    {
        return $user->checkPermissionTo('view About');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create About');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, About $about): bool
    {
        return $user->checkPermissionTo('update About');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, About $about): bool
    {
        return $user->checkPermissionTo('delete About');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, About $about): bool
    {
        return $user->checkPermissionTo('restore About');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, About $about): bool
    {
        return $user->checkPermissionTo('force-delete About');
    }
}
