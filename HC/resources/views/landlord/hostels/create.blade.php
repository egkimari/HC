@section('title', 'Create New Hostel')

@section('content_header')
    <h1>Create New Hostel</h1>
@stop

@section('content')
    <div class="container-fluid">
        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Hostel Creation Form -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hostel Information</h3>
            </div>
            <form action="{{ route('landlord.hostels.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Hostel Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price_per_night">Price per Night</label>
                        <input type="number" name="price_per_night" id="price_per_night" class="form-control" value="{{ old('price_per_night') }}" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" name="capacity" id="capacity" class="form-control" value="{{ old('capacity') }}" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Hostel Image</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="available_from">Available From</label>
                        <input type="date" name="available_from" id="available_from" class="form-control" value="{{ old('available_from') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="available_until">Available Until</label>
                        <input type="date" name="available_until" id="available_until" class="form-control" value="{{ old('available_until') }}" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Hostel</button>
                    <a href="{{ route('landlord.hostels.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop
