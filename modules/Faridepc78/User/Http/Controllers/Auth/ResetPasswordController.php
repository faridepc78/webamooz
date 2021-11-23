<?php

namespace Faridepc78\User\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Faridepc78\User\Http\Requests\ChangePasswordRequest;
use Faridepc78\User\Services\UserService;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm()
    {
        return view('User::Front.passwords.reset');
    }

    public function reset(ChangePasswordRequest $request)
    {
        UserService::changePassword(auth()->user(), $request->password);
        return redirect(route('home'));
    }
}
