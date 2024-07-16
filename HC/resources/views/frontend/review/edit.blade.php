@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Edit Review</h1>
    <form method="POST" action="{{ route('reviews.update', $review->id) }}">
        @csrf
        @method('PUT')
        
        <!-- Hostel Selection Dropdown -->
        <div class="form-group">
            <label for="hostel_id">Hostel</label>
            <select class="form-control" id="hostel_id" name="hostel_id" required>
                @foreach($hostels as $hostel)
                    <option value="{{ $hostel->id }}" {{ $review->hostel_id == $hostel->id ? 'selected' : '' }}>
                        {{ $hostel->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Rating Input -->
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="{{ $review->rating }}" required>
        </div>
        
        <!-- Comment Input -->
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" id="comment" name="comment" required>{{ $review->comment }}</textarea>
        </div>
        
        <!-- Update Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
