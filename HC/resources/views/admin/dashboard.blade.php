@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Admin Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Hostel Count Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Hostels</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $hostelCount }}</p>
                    </div>
                </div>
            </div>

            <!-- User Count Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Users</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $userCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Recent Hostels Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Hostels</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($recentHostels as $hostel)
                                <li>{{ $hostel->name }} ({{ $hostel->created_at->format('Y-m-d') }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Users Card -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
    @foreach ($recentUsers as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
        </tr>
    @endforeach
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
