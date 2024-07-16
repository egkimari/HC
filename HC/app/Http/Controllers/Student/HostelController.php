<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::all();
        return view('student.hostels.index', compact('hostels'));
    }

    public function show(Hostel $hostel)
    {
        return view('student.hostels.show', compact('hostel'));
    }
}
