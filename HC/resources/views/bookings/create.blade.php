@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Add New Booking</h1>
    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        <!-- CSRF Token -->
        
        <!-- Select Hostel -->
        <div class="form-group">
            <label for="hostel_id">Hostel</label>
            <select class="form-control" id="hostel_id" name="hostel_id" required>
                @foreach($hostels as $hostel)
                    <option value="{{ $hostel->id }}">{{ $hostel->name }}</option> <!-- Option with hostel ID and name -->
                @endforeach
            </select>
        </div>
        <!-- Input for Start Date -->
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <!-- Input for End Date -->
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
