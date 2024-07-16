<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::with('images')->get();
        return view('hostels.index', compact('hostels'));
    }

    public function create()
    {
        return view('hostels.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'rent' => 'required|numeric',
            'ratings' => 'nullable|numeric',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hostel = Hostel::create($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('hostel_images', 'public');
                $hostel->images()->create(['path' => $imagePath]);
            }
        }

        return redirect()->route('hostels.show', $hostel->id)->with('success', 'Hostel created successfully.');
    }

    public function show(Hostel $hostel)
    {
        return view('hostels.show', compact('hostel'));
    }

    public function edit(Hostel $hostel)
    {
        return view('hostels.edit', compact('hostel'));
    }

    public function update(Request $request, Hostel $hostel)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'rent' => 'required|numeric',
            'ratings' => 'nullable|numeric',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hostel->update($validatedData);

        if ($request->hasFile('images')) {
            // Optionally delete old images if needed
            $hostel->images()->delete();

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('hostel_images', 'public');
                $hostel->images()->create(['path' => $imagePath]);
            }
        }

        return redirect()->route('hostels.show', $hostel->id)->with('success', 'Hostel updated successfully.');
    }

    public function destroy(Hostel $hostel)
    {
        // Delete images associated with the hostel
        foreach ($hostel->images as $image) {
            Storage::disk('public')->delete($image->path);
        }
        $hostel->images()->delete();

        $hostel->delete();
        return redirect()->route('hostels.index')->with('success', 'Hostel deleted successfully.');
    }
}
