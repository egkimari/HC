@extends('adminlte::page')

@section('title', 'Create Hostel')

@section('content_header')
    <h1>Create Hostel</h1>
@stop

@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.hostels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Hostel Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input type="number" class="form-control" id="rooms" name="rooms" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Create Hostel</button>
        </form>
    </div>
@stop
