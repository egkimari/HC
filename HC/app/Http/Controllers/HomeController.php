<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all hostels
        $hostels = Hostel::all();



        // Pass hostels to the home view
        return view('frontend.home', compact('hostels'));
    }
}
