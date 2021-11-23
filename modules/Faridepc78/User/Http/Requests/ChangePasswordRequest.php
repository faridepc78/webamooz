<?php

namespace Faridepc78\User\Http\Requests;

use Faridepc78\User\Rules\ValidPassword;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'password' => ['required', new ValidPassword(), 'confirmed']
        ];
    }
}
