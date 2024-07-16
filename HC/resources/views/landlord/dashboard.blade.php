@extends('layouts.app')

@section('title', 'Landlord Dashboard')

@section('content')
<div class="container mt-5">
    <h1>Landlord Dashboard</h1>
    <p>Welcome to your dashboard, {{ Auth::user()->name }}.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Hostels</h5>
                    <p class="card-text">View and manage your hostels.</p>
                    <a href="{{ route('landlord.hostels.index') }}" class="btn btn-primary">Manage Hostels</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Bookings</h5>
                    <p class="card-text">View and update bookings for your hostels.</p>
                    <a href="{{ route('landlord.bookings.index') }}" class="btn btn-primary">Manage Bookings</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <p class="card-text">Update your profile information.</p>
                    <a href="{{ route('landlord.profile') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
