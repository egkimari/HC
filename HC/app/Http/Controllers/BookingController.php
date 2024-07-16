<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the user's bookings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all bookings associated with the authenticated user
        $bookings = Booking::where('user_id', auth()->id())->get();
        
        // Return view with the retrieved bookings
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return view for creating a new booking
        return view('bookings.create');
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Create a new booking instance with the request data
        $booking = new Booking($request->all());
        
        // Assign the authenticated user's ID to the booking
        $booking->user_id = auth()->id();
        
        // Set default status for the booking
        $booking->status = 'pending';
        
        // Save the booking to the database
        $booking->save();
        
        // Redirect to the bookings index page
        return redirect()->route('bookings.index');
    }

    /**
     * Display the specified booking.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Find the booking by its ID or throw a 404 error if not found
        $booking = Booking::findOrFail($id);
        
        // Return view with the booking details
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the booking by its ID or throw a 404 error if not found
        $booking = Booking::findOrFail($id);
        
        // Return view with the booking details for editing
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified booking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Find the booking by its ID or throw a 404 error if not found
        $booking = Booking::findOrFail($id);
        
        // Update the booking with the new request data
        $booking->update($request->all());
        
        // Redirect to the bookings index page after updating
        return redirect()->route('bookings.index');
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the booking by its ID or throw a 404 error if not found, then delete it
        Booking::findOrFail($id)->delete();
        
        // Redirect to the bookings index page after deletion
        return redirect()->route('bookings.index');
    }
}

