<?php
namespace App\Http\Controllers;

use App\Models\Landlord;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function create()
    {
        return view('auth.register-landlord');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:landlords',
            'password' => 'required|confirmed',
        ]);

        $landlord = Landlord::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user = $landlord->user()->create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login');
    }
}