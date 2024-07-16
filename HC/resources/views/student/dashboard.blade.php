@extends('frontend.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Dashboard') }}</div>

                    <div class="card-body">
                        <h3>Welcome, {{ auth()->user()->name }}</h3>
                        <p>Email: {{ auth()->user()->email }}</p>
                        <p>Role: Student</p>

                        <!-- Links to student-specific features -->
                        <div class="mt-4">
                            <h4>Actions:</h4>
                            <ul>
                                <li><a href="{{ route('profile.show') }}">View Profile</a></li>
                                <li><a href="{{ route('bookings.index') }}">Manage Bookings</a></li>
                                <li><a href="{{ route('payments.index') }}">View Payments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
