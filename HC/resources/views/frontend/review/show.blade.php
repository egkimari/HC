@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Review Details</h1>
    <!-- Display Hostel Name -->
    <p>Hostel: {{ $review->hostel->name }}</p>
    <!-- Display Rating -->
    <p>Rating: {{ $review->rating }}</p>
    <!-- Display Comment -->
    <p>Comment: {{ $review->comment }}</p>
    
    <!-- Edit Button -->
    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary">Edit</a>
    
    <!-- Delete Form -->
    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
