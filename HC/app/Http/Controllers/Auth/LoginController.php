<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = Auth::user();

            if ($user->is_admin) {
                return $this->sendLoginResponse($request, '/admin/dashboard');
            } elseif ($user->userable_type === 'App\Models\Landlord') {
                return $this->sendLoginResponse($request, '/landlord');
            } else {
                return $this->sendLoginResponse($request, '/home');
            }
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendLoginResponse(Request $request, $redirectPath)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return redirect()->intended($redirectPath);
    }
}
