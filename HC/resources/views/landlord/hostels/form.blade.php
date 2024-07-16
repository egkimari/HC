@extends('frontend.layout')

@section('title', $hostel ? 'Edit Hostel' : 'Create Hostel')

@section('content')
<div class="container mt-5">
    <h1>{{ $hostel ? 'Edit Hostel' : 'Create New Hostel' }}</h1>
    <form action="{{ $hostel ? route('landlord.hostels.update', $hostel->id) : route('landlord.hostels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($hostel)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Hostel Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $hostel->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $hostel->address ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $hostel->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="Rent">Rent</label>
            <input type="number" name="Rent" id="price_per_night" class="form-control" value="{{ old('price_per_night', $hostel->price_per_night ?? '') }}" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ old('capacity', $hostel->capacity ?? '') }}" min="1" required>
        </div>

        <div class="form-group">
            <label for="image">Hostel Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if($hostel && $hostel->image)
                <img src="{{ asset('storage/' . $hostel->image) }}" alt="Hostel Image" class="mt-2" style="max-width: 200px;">
            @endif
        </div>

        <div class="form-group">
            <label for="available_from">Available From</label>
            <input type="date" name="available_from" id="available_from" class="form-control" value="{{ old('available_from', $hostel->available_from->format('Y-m-d') ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="available_until">Available Until</label>
            <input type="date" name="available_until" id="available_until" class="form-control" value="{{ old('available_until', $hostel->available_until->format('Y-m-d') ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ $hostel ? 'Update Hostel' : 'Create Hostel' }}</button>
        <a href="{{ route('landlord.hostels.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
