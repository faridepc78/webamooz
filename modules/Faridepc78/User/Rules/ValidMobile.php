<?php

namespace Faridepc78\User\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidMobile implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^9[0-9]{9}$/', $value);
    }

    public function message()
    {
        return 'فرمت موبایل نامعتبر است. شماره موبایل باید با 9 شروع بشود و بدون فاصله وارد شود.';
    }
}
