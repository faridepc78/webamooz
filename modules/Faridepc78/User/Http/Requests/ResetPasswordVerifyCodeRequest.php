<?php

namespace Faridepc78\User\Http\Requests;

use Faridepc78\User\Services\VerifyCodeService;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordVerifyCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'verify_code' => VerifyCodeService::getRule(),
            'email' => 'required|email'
        ];
    }
}
