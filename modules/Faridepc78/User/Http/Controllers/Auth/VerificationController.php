<?php

namespace Faridepc78\User\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Faridepc78\User\Http\Requests\VerifyCodeRequest;
use Faridepc78\User\Services\VerifyCodeService;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('User::Front.verify');
    }

    public function verify(VerifyCodeRequest $request)
    {
       if(! VerifyCodeService::check(auth()->id(), $request->verify_code)){
           return back()->withErrors(['verify_code' => 'کد وارد شده معتبر نمیباشد!']);
       }

        auth()->user()->markEmailAsVerified();
        return redirect()->route('home');
    }
}
