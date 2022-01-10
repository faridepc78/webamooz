<?php
namespace Faridepc78\Course\Rules;
use Faridepc78\Course\Repositories\SeasonRepo;
use Faridepc78\RolePermissions\Models\Permission;
use Faridepc78\User\Repositories\UserRepo;
use Illuminate\Contracts\Validation\Rule;

class ValidSeason implements Rule
{

    public function passes($attribute, $value)
    {
       $season = resolve(SeasonRepo::class)->findByIdandCourseId($value, request()->route('course'));
        if ($season) {
            return true;
        }
        return false;
    }

    public function message()
    {
        return "سرفصل انتخاب شده معتبر نمی باشد.";
    }
}
