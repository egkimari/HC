<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:landlord'); // Ensure only landlords can access these methods
    }

    public function manageHostels()
    {
        // Logic to fetch and display hostels managed by the landlord
        return view('hostels.show');
    }

    public function manageBookings()
    {
        // Logic to fetch and display bookings managed by the landlord
        return view('hostels.index');
    }

    public function createBooking()
    {
        // Logic to create a new booking by the landlord
        return view('bookings.create');
    }
}
