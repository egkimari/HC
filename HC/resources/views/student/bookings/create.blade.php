@extends('frontend.layout')

@section('content')
<div class="container">
    <h2>Book a Hostel</h2>
    <form method="POST" action="{{ route('student.bookings.store') }}">
        @csrf
        <div class="form-group">
            <label for="hostel_id">Select Hostel:</label>
            <select name="hostel_id" class="form-control" required>
                @foreach($hostels as $hostel)
                    <option value="{{ $hostel->id }}">{{ $hostel->name }} - {{ $hostel->location }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection
