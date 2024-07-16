<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Landlord;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'in:student,landlord,admin'],
            'phone' => ['nullable', 'string', 'max:15'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        $relatedEntity = null;

        if ($data['user_type'] === 'student') {
            $relatedEntity = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? '',
                'address' => $data['address'] ?? '',
            ]);
        } elseif ($data['user_type'] === 'landlord') {
            $relatedEntity = Landlord::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? '',
                'address' => $data['address'] ?? '',
            ]);
        } elseif ($data['user_type'] === 'admin') {
            $relatedEntity = Admin::create(); 
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $data['user_type'] === 'admin',
            'userable_type' => $data['user_type'] === 'student' ? Student::class : ($data['user_type'] === 'landlord' ? Landlord::class : ($data['user_type'] === 'admin' ? Admin::class : null)),
            'userable_id' => $relatedEntity->id,
        ]);

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        
    }
}
