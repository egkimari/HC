@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Reviews</h1>
    <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add New Review</a>
    <div class="row">
        @foreach($reviews as $review)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->hostel->name }}</h5>
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text">Rating: {{ $review->rating }}</p>
                        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
