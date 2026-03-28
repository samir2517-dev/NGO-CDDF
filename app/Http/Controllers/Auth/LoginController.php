<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ]);
    }

    /**
     * Attempt to log the user in with case-sensitive email matching.
     */
    protected function attemptLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Find user with exact case-sensitive email match using BINARY comparison
        $user = User::whereRaw('BINARY email = ?', [$email])->first();

        if (!$user) {
            return false;
        }

        // Check if user is active
        if (!$user->is_active) {
            return false;
        }

        // Verify password
        if (!Hash::check($password, $user->password)) {
            return false;
        }

        // Log the user in
        Auth::login($user, $request->boolean('remember'));

        return true;
    }

    /**
     * Get the failed login response instance.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['Invalid email or password. Please check your credentials and try again.'],
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('/admin/home');
    }
}
