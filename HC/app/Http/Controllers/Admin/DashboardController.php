<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the count of all hostels
        $hostelCount = Hostel::count();

        // Get the count of all users
        $userCount = User::count();

        // Get the 5 most recently added hostels
        $recentHostels = Hostel::latest()->take(5)->get();

        // Get the 5 most recently registered users
        $recentUsers = User::latest()->take(5)->get();

        // Return the admin dashboard view with the above data
        return view('admin.dashboard', compact('hostelCount', 'userCount', 'recentHostels', 'recentUsers'));
    }
    
    public function showReports()
{
    // Your logic for reports
    return view('admin.reports');
}

}
