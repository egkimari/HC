@extends('frontend.layout')

@section('content')
    <div class="container">
        <h1>{{ $hostel->name }}</h1>
        <img src="{{ asset('storage/' . $hostel->image) }}" class="img-fluid" alt="{{ $hostel->name }}">
        <p><strong>Location:</strong> {{ $hostel->location }}</p>
        <p><strong>Rooms:</strong> {{ $hostel->rooms }}</p>
        <p><strong>Description:</strong> {{ $hostel->description }}</p>
        <a href="{{ route('hostels.index') }}" class="btn btn-secondary">Back to Hostels</a>
    </div>
@endsection
