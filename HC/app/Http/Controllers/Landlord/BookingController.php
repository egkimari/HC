<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::whereHas('hostel', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('landlord.bookings.index', compact('bookings'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $booking->status = $request->input('status');
        $booking->save();

        return redirect()->route('landlord.bookings.index')->with('success', 'Booking status updated successfully.');
    }
}
