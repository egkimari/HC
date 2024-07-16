@extends('frontend.layout')

@section('title', 'Booking Details')

@section('content')
<div class="container mt-5">
    <h1>Booking Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hostel: {{ $booking->hostel->name }}</h5>
            <p><strong>Check-in Date:</strong> {{ $booking->check_in_date }}</p>
            <p><strong>Check-out Date:</strong> {{ $booking->check_out_date }}</p>
            <p><strong>Status:</strong> {{ $booking->status }}</p>
            <p><strong>Hostel Address:</strong> {{ $booking->hostel->address }}</p>
            <p><strong>Payment Status:</strong> {{ $booking->payment_status }}</p>

        </div>
    </div>
</div>
@endsection
