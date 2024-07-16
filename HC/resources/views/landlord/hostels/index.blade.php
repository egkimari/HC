@extends('frontend.layout')

@section('title', 'Manage Hostels')

@section('content')
<div class="container mt-5">
    <h1>Manage Hostels</h1>
    <a href="{{ route('landlord.hostels.create') }}" class="btn btn-primary mb-3">Add New Hostel</a>
    <!-- List of hostels -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Rent</th>
                <th>Capacity</th>
                <th>Available From</th>
                <th>Available Until</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hostels as $hostel)
                <tr>
                    <td>{{ $hostel->name }}</td>
                    <td>{{ $hostel->address }}</td>
                    <td>${{ $hostel-> Rent }}</td>
                    <td>{{ $hostel->capacity }}</td>
                    <td>{{ $hostel->available_from->format('Y-m-d') }}</td>
                    <td>{{ $hostel->available_until->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('landlord.hostels.edit', $hostel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('landlord.hostels.destroy', $hostel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this hostel?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hostels found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $hostels->links() }}
</div>
@endsection
