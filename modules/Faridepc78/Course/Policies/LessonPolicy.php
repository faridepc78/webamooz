<?php


namespace Faridepc78\Course\Policies;


use Faridepc78\Course\Models\Lesson;
use Faridepc78\RolePermissions\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    public function edit($user, $lesson)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_COURSES) ||
            ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_OWN_COURSES) && $user->id == $lesson->course->teacher_id)
        ) {
            return true;
        }
    }

    public function delete($user, $lesson)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_COURSES) ||
            ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_OWN_COURSES) && $user->id == $lesson->course->teacher_id)
        ) {
            return true;
        }
    }
}
