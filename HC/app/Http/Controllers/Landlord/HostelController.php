<?php
namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::where('user_id', Auth::id())->paginate(10);
        return view('landlord.hostels.index', compact('hostels'));
    }

    public function create()
    {
        return view('landlord.hostels.create');
    }

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

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hostel_images', 'public');
        }

        Hostel::create($data);

        return redirect()->route('landlord.hostels.index')->with('success', 'Hostel created successfully.');
    }

    public function edit(Hostel $hostel)
    {
        return view('landlord.hostels.edit', compact('hostel'));
    }

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

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hostel_images', 'public');
        }

        $hostel->update($data);

        return redirect()->route('landlord.hostels.index')->with('success', 'Hostel updated successfully.');
    }

    public function destroy(Hostel $hostel)
    {
        $hostel->delete();

        return redirect()->route('landlord.hostels.index')->with('success', 'Hostel deleted successfully.');
    }
}
