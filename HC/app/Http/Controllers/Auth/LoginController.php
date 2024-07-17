<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home'; // Default redirect path if not overridden

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Customizing the login form view
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handling the login logic
    public function login(Request $request)
    {
        $this->validateLogin($request); // Validate the login request

        // Attempt to log in the user
        if ($this->attemptLogin($request)) {
            $user = Auth::user(); // Get the authenticated user

            // Check user role and redirect accordingly
            if ($user->is_admin) {
                return $this->sendLoginResponse($request, '/admin/dashboard');
            } elseif ($user->userable_type === 'App\Models\Landlord') {
                return $this->sendLoginResponse($request, '/landlord');
            } else {
                return $this->sendLoginResponse($request, '/home');
            }
        }

        // If login attempt fails, redirect back with errors
        return $this->sendFailedLoginResponse($request);
    }

    // Customize the redirect path after successful login
    protected function sendLoginResponse(Request $request, $redirectPath)
    {
        $request->session()->regenerate(); // Regenerate the session ID

        $this->clearLoginAttempts($request); // Clear login attempts

        return redirect()->intended($redirectPath); // Redirect to intended URL
    }
}
