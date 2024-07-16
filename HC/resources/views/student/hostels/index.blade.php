@extends('frontend.layout')

@section('content')
    <div class="container">
        <h1>Available Hostels</h1>
        <div class="row">
            @foreach($hostels as $hostel)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $hostel->image) }}" class="card-img-top" alt="{{ $hostel->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hostel->name }}</h5>
                            <p class="card-text">{{ $hostel->location }}</p>
                            <a href="{{ route('hostels.show', $hostel->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
