<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;

class HostelController extends Controller
{
    /**
     * Display a listing of the hostels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch and return all hostels
        $hostels = Hostel::all();
        return view('hostels.index', compact('hostels'));
    }

    /**
     * Show the form for creating a new hostel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the create hostel form
        return view('hostels.create');
    }

    /**
     * Store a newly created hostel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add more fields as needed
        ]);

        // Create the hostel
        $hostel = Hostel::create($validatedData);

        // Redirect to the newly created hostel's details page
        return redirect()->route('hostels.show', $hostel->id);
    }

    /**
     * Display the specified hostel.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(Hostel $hostel)
    {
        // Show hostel details
        return view('hostels.show', compact('hostel'));
    }
}
