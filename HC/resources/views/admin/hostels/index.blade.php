@extends('adminlte::page')

@section('title', 'Manage Hostels')

@section('content_header')
    <h1>Manage Hostels</h1>
@stop

@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin.hostels.create') }}" class="btn btn-primary mb-3">Add New Hostel</a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hostel List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hostel Name</th>
                            <th>Location</th>
                            <th>Rooms</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hostels as $hostel)
                            <tr>
                                <td>{{ $hostel->name }}</td>
                                <td>{{ $hostel->location }}</td>
                                <td>{{ $hostel->rooms }}</td>
                                <td>
                                    <a href="{{ route('admin.hostels.edit', $hostel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.hostels.destroy', $hostel->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this hostel?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
