<?php


namespace Faridepc78\Category\Policies;


use Faridepc78\RolePermissions\Models\Permission;
use Faridepc78\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        return $user->hasPermissionTo(Permission::PERMISSION_MANAGE_CATEGORIES);
    }
}
