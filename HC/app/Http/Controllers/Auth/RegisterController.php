<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Landlord;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException; // Include ValidationException
use Psr\Log\LoggerInterface;

class RegisterController extends Controller
{
    protected $redirectTo = '/home';
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->middleware('guest');
        $this->logger = $logger;
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Assuming your registration form view is in 'resources/views/auth/register.blade.php'
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'string', 'in:student,landlord'],
        ]);
    }

    protected function create(array $data)
    {
        $userable = null;

        if ($data['user_type'] === 'student') {
            $userable = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'address' => $data['address'] ?? null,
            ]);
        } elseif ($data['user_type'] === 'landlord') {
            $userable = Landlord::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone'] ?? null,
                'address' => $data['address'] ?? null,
            ]);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => false,
            'is_landlord' => $data['user_type'] === 'landlord',
            'userable_type' => $userable ? get_class($userable) : null,
            'userable_id' => $userable ? $userable->id : null,
        ]);
    }

    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            Auth::guard('web')->login($user);

            return redirect()->intended($this->redirectTo);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            $this->logger->error('Error registering user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
}
