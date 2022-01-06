<?php

namespace Faridepc78\User\Http\Requests;

use Faridepc78\User\Rules\ValidPassword;
use Faridepc78\User\Services\VerifyCodeService;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() == true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['required', new ValidPassword(), 'confirmed']
        ];
    }
}
