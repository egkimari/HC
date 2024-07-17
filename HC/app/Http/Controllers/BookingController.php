<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Hostel;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'hostel_id' => 'required|exists:hostels,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $booking = new Booking();
        $booking->hostel_id = $request->hostel_id;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->user_id = Auth::id();
        $booking->status = 'pending';
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    public function index()
    {
        $bookings = Booking::with('hostel')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $hostels = Hostel::all();
        return view('bookings.create', compact('hostels'));
    }
}
