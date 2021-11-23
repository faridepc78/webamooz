<?php

namespace Faridepc78\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Faridepc78\User\Http\Requests\ResetPasswordVerifyCodeRequest;
use Faridepc78\User\Http\Requests\SendResetPasswordVerifyCodeRequest;
use Faridepc78\User\Repositories\UserRepo;
use Faridepc78\User\Services\VerifyCodeService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showVerifyCodeRequestForm()
    {
        return view('User::Front.passwords.email');
    }

    public function sendVerifyCodeEmail(SendResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);

        if ($user && !VerifyCodeService::has($user->id)) {
            $user->sendResetPasswordRequestNotification();
        }

        return view('User::Front.passwords.enter-verify-code-form');
    }

    public function checkVerifyCode(ResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);

        if ($user == null || !VerifyCodeService::check($user->id, $request->verify_code)) {
            return back()->withErrors(['verify_code' => 'کد وارد شده معتبر نمیباشد!']);
        }

        auth()->loginUsingId($user->id);

        return redirect()->route('password.showResetForm');
    }
}
