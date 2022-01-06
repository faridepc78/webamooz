<?php
namespace Faridepc78\Course\Rules;
use Faridepc78\RolePermissions\Models\Permission;
use Faridepc78\User\Repositories\UserRepo;
use Illuminate\Contracts\Validation\Rule;

class ValidTeacher implements Rule
{

    public function passes($attribute, $value)
    {
       $user = resolve(UserRepo::class)->findById($value);
       return $user->hasPermissionTo(Permission::PERMISSION_TEACH);
    }

    public function message()
    {
        return "کاربر انتخاب شده یک مدرس معتبر نیست.";
    }
}
