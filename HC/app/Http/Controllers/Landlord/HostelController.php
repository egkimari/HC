<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HostelController extends Controller
{
    /**
     * Display a listing of the hostels owned by the authenticated landlord.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $hostels = Hostel::where('user_id', Auth::id())->paginate(10);
        return view('landlord.hostels.index', compact('hostels'));
    }

    /**
     * Show the form for creating a new hostel.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('landlord.hostels.create');
    }

    /**
     * Store a newly created hostel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'rent' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available_from' => 'required|date|after_or_equal:today',
            'available_until' => 'required|date|after_or_equal:available_from',
        ]);

        $data = $request->only([
            'name', 'address', 'description', 'rent', 'capacity', 'available_from', 'available_until'
        ]);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hostel_images', 'public');
        }

        Hostel::create($data);

        return redirect()->route('landlord.hostels.index')->with('success', 'Hostel created successfully.');
    }
    public function show(Hostel $hostel)
    {
        return view('hostels.show', compact('hostel'));
    }
    
    /**
     * Show the form for editing the specified hostel.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\View\View
     */
    public function edit(Hostel $hostel)
    {
        return view('landlord.hostels.edit', compact('hostel'));
    }

    /**
     * Update the specified hostel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Hostel $hostel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'rent' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available_from' => 'required|date|after_or_equal:today',
            'available_until' => 'required|date|after_or_equal:available_from',
        ]);

        $data = $request->only([
            'name', 'address', 'description', 'rent', 'capacity', 'available_from', 'available_until'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if new one is uploaded
            if ($hostel->image) {
                Storage::disk('public')->delete($hostel->image);
            }
            $data['image'] = $request->file('image')->store('hostel_images', 'public');
        }

        $hostel->update($data);

        return redirect()->route('landlord.hostels.index')->with('success', 'Hostel updated successfully.');
    }

    /**
     * Remove the specified hostel from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Hostel $hostel)
    {
        // Delete hostel image if it exists
        if ($hostel->image) {
            Storage::disk('public')->delete($hostel->image);
        }

        $hostel->delete();

        return redirect()->route('landlord.hostels.index')->with('success', 'Hostel deleted successfully.');
    }
}
