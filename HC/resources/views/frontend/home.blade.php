<!-- resources/views/frontend/home.blade.php -->
@extends('frontend.layout')

@section('title', 'Home - HostelConnect')

@section('styles')
    <style>
        .main-content {
            text-align: center;
        }

        .main-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 1.25rem;
        }

        .card-deck .card {
            margin-bottom: 30px; /* Add space between cards */
        }

        .card-img-top {
            height: 200px; /* Adjust this value as needed */
            object-fit: cover;
        }

        /* Ensure that the text is visible */
        .main-content a {
            color: #010913; /* Primary link color */
        }

        .main-content a:hover {
            color: #0044cc; /* Changed hover color for better visibility */
        }

        /* Ensure container max-width */
        .container {
            max-width: 1200px; /* Adjust the maximum width */
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="main-content">
            <h1>Welcome to HostelConnect</h1>
            <p>The Ultimate Hostel Solution To Your Housing Problem</p>

            <div class="card-deck mt-4">
                <div class="card">
                    <a href="{{ route('hostels.index') }}" class="card-link">
                        <div class="card-body text-center">
                            <h3 class="card-title">Find a Hostel</h3>
                            <p class="card-text">Browse through our extensive list of hostels and find the one that suits your needs.</p>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="{{ route('bookings.index') }}" class="card-link">
                        <div class="card-body text-center">
                            <h3 class="card-title">Manage Your Bookings</h3>
                            <p class="card-text">Keep track of your bookings and payments easily through our user-friendly interface.</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Display featured hostels -->
            @if($hostels->count())
                <div class="mt-5">
                    <h3 class="text-center">Featured Hostels</h3>
                    <div class="row">
                        @foreach($hostels as $hostel)
                            <div class="col-md-4">
                                <div class="card">
                                    @if($hostel->image)
                                        <img class="card-img-top img-fluid" src="{{ asset($hostel->image) }}" alt="{{ $hostel->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $hostel->name }}</h5>
                                        <p class="card-text">{{ $hostel->description }}</p>
                                        <a href="{{ route('hostels.show', $hostel->id) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center">No hostels available at the moment.</p>
            @endif
        </div>
    </div>
@endsection
