<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;

class AdminController extends Controller
{
    public function dashboard()
    {
        // logic for the dashboard
    }

    public function pages()
    {
        // logic for the pages route
        return view('admin.pages');
    }

    public function create()
    {
        // view for creating a new hostel
        return view('admin.create');
    }

    // Store method for handling the form submission
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rooms' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validation rule for image file
        ]);

        // Create a new Hostel instance with all request data except 'image'
        $hostel = new Hostel($request->except('image'));

        // Handle image upload if a file is present in the request
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hostel_images', 'public');
            $hostel->image = $imagePath;
        }

        // Assign the authenticated user's ID as the user_id for the hostel
        $hostel->user_id = auth()->id();

        // Save the hostel instance to the database
        $hostel->save();

        // Redirect to the index route for hostels after successful creation
        return redirect()->route('admin.hostels.index');
    }
}
