<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Hostel;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Store a newly created booking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'hostel_id' => 'required|exists:hostels,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Create a new booking instance
        $booking = new Booking();
        $booking->hostel_id = $request->hostel_id;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;

        // Assign the authenticated user's ID to the booking
        $booking->user_id = Auth::id(); // Use Auth::id() to get the authenticated user's ID

        // Set default status for the booking
        $booking->status = 'pending';

        // Save the booking
        $booking->save();

        // Redirect to the bookings index page with a success message
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    /**
     * Display a listing of the bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all bookings with hostel data
        $bookings = Booking::with('hostel')->get();

        // Return the bookings index view with bookings data
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch all hostels
        $hostels = Hostel::all();

        // Return the bookings create view with hostels data
        return view('bookings.create', compact('hostels'));
    }
}
