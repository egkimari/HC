@extends('frontend.layout')

@section('title', 'Manage Bookings')

@section('content')
<div class="container mt-5">
    <h1>Manage Your Bookings</h1>

    @if ($bookings->isEmpty())
        <p>You have no bookings yet.</p>
    @else
        <div class="list-group">
            @foreach ($bookings as $booking)
                <a href="{{ route('student.bookings.show', $booking->id) }}" class="list-group-item list-group-item-action">
                    Hostel: {{ $booking->hostel->name }} <br>
                    Check-in: {{ $booking->check_in_date }} <br>
                    Check-out: {{ $booking->check_out_date }}
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
