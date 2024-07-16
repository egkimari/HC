<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::all();
        return view('admin.hostels.index', compact('hostels'));
    }

    public function create()
    {
        return view('admin.hostels.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'rooms' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Hostel::create($data);

        return redirect()->route('admin.hostels.index')->with('success', 'Hostel added successfully.');
    }

    public function edit(Hostel $hostel)
    {
        return view('admin.hostels.edit', compact('hostel'));
    }

    public function update(Request $request, Hostel $hostel)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'rooms' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $hostel->update($data);

        return redirect()->route('admin.hostels.index')->with('success', 'Hostel updated successfully.');
    }

    public function destroy(Hostel $hostel)
    {
        $hostel->delete();
        return redirect()->route('admin.hostels.index')->with('success', 'Hostel deleted successfully.');
    }
}
