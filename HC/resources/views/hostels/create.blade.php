@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Add New Hostel</h1>
    <!-- Form for adding a new hostel -->
    <form method="POST" action="{{ route('hostels.store') }}" enctype="multipart/form-data">
        @csrf <!-- CSRF protection -->

        <!-- Hostel Name -->
        <div class="form-group">
            <label for="name">Hostel Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <!-- Location -->
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <!-- Rent -->
        <div class="form-group">
            <label for="rent">Rent</label>
            <input type="number" class="form-control" id="rent" name="rent" required>
        </div>

        <!-- Amenities -->
        <div class="form-group">
            <label for="amenities">Amenities</label>
            <textarea class="form-control" id="amenities" name="amenities" required></textarea>
        </div>

        <!-- Hostel Image -->
        <div class="form-group">
            <label for="image">Hostel Image (JPG only)</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
