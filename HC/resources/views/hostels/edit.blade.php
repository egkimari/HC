@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Edit Hostel</h1>
    <!-- Form for editing a hostel -->
    <form method="POST" action="{{ route('hostels.update', $hostel->id) }}">
        @csrf <!-- CSRF protection -->
        @method('PUT') <!-- Method spoofing for PUT request -->

        <!-- Hostel Name -->
        <div class="form-group">
            <label for="name">Hostel Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $hostel->name }}" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $hostel->description }}</textarea>
        </div>

        <!-- Location -->
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $hostel->location }}" required>
        </div>

        <!-- Rent -->
        <div class="form-group">
            <label for="rent">Rent</label>
            <input type="number" class="form-control" id="rent" name="rent" value="{{ $hostel->rent }}" required>
        </div>

        <!-- Amenities -->
        <div class="form-group">
            <label for="amenities">Amenities</label>
            <textarea class="form-control" id="amenities" name="amenities" required>{{ implode(', ', json_decode($hostel->amenities)) }}</textarea>
        </div>

        <!-- Update Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
