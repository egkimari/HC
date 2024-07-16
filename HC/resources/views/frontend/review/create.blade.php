@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Add New Review</h1>
    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf
        <!-- Select Hostel Dropdown -->
        <div class="form-group">
            <label for="hostel_id">Hostel</label>
            <select class="form-control" id="hostel_id" name="hostel_id" required>
                @foreach($hostels as $hostel)
                    <option value="{{ $hostel->id }}">{{ $hostel->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Input for Rating -->
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <!-- Textarea for Comment -->
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" id="comment" name="comment" required></textarea>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
