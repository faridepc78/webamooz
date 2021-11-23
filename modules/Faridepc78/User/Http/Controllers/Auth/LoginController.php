<?php

namespace Faridepc78\User\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        $username = $request->get($this->username());

        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        return [
            $field => $username,
            'password' => $request->password
        ];
    }

    public function showLoginForm()
    {
        return view('User::Front.login');
    }
}
