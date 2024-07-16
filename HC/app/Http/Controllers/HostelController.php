<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use Illuminate\Support\Facades\Auth;

class HostelController extends Controller
{
    /**
     * Display a listing of the hostels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all hostels with images
        $hostels = Hostel::with('images')->get();

        // Return the hostels index view with hostels data
        return view('hostels.index', compact('hostels'));
    }

    /**
     * Show the form for creating a new hostel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the hostels create view
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image upload
        ]);

        // Create the hostel
        $hostel = Hostel::create($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/hostels'), $imageName);
            $hostel->image = $imageName;
            $hostel->save();
        }

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
        // Return the hostels show view with the hostel data
        return view('hostels.show', compact('hostel'));
    }

    /**
     * Show the form for editing the specified hostel.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hostel $hostel)
    {
        // Return the hostels edit view with the hostel data
        return view('hostels.edit', compact('hostel'));
    }

    /**
     * Update the specified hostel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostel $hostel)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image upload
        ]);

        // Update the hostel
        $hostel->update($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/hostels'), $imageName);
            $hostel->image = $imageName;
            $hostel->save();
        }

        // Redirect to the updated hostel's details page
        return redirect()->route('hostels.show', $hostel->id);
    }

    /**
     * Remove the specified hostel from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        // Delete the hostel
        $hostel->delete();

        // Redirect back to the list of hostels
        return redirect()->route('hostels.index');
    }
}
