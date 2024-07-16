<!-- Extend the main layout -->
@extends('frontend.layout')

<!-- Set the content section -->
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Card for hostel details -->
                <div class="card">
                    <div class="card-header">
                        <!-- Hostel Title -->
                        <h2>{{ $hostel->name }}</h2>
                    </div>
                    <div class="card-body">
                        <!-- Display large hostel image -->
                        <img src="{{ asset('images/hostels/' . $hostel->image) }}" class="img-fluid mb-4" alt="Hostel Image">

                        <!-- Hostel details -->
                        <p><strong>Location:</strong> {{ $hostel->location }}</p>
                        <p><strong>Rent:</strong> {{ $hostel->rent }}</p>
                        <p><strong>Ratings:</strong> {{ $hostel->ratings }}</p>
                        <p><strong>Description:</strong> {{ $hostel->description }}</p>

                        <!-- Booking Form -->
                        <h4 class="mt-4">Book This Hostel</h4>
                        <form method="POST" action="{{ route('bookings.store') }}">
                            @csrf
                            <input type="hidden" name="hostel_id" value="{{ $hostel->id }}">

                            <!-- Check-in Date -->
                            <div class="form-group">
                                <label for="checkin_date">Check-in Date:</label>
                                <input type="date" id="checkin_date" name="checkin_date" class="form-control" required>
                            </div>

                            <!-- Check-out Date -->
                            <div class="form-group">
                                <label for="checkout_date">Check-out Date:</label>
                                <input type="date" id="checkout_date" name="checkout_date" class="form-control" required>
                            </div>

                            <!-- Additional Preferences -->
                            <div class="form-group">
                                <label for="preferences">Additional Preferences (optional):</label>
                                <textarea id="preferences" name="preferences" class="form-control"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
