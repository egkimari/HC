@extends('frontend.layout')

@section('title', 'Hostels')

@section('content')
<div class="container mt-5">
    <h1>Hostels</h1>
    <div class="row">
        @foreach($hostels as $hostel)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $hostel->image_url }}" class="card-img-top" alt="{{ $hostel->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hostel->name }}</h5>
                        <p class="card-text">{{ $hostel->location }}</p>
                        <p class="card-text">Rooms: {{ $hostel->rooms }}</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
