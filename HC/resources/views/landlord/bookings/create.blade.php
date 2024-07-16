@extends('frontend.layout')

@section('content')
<div class="container">
    <h2>Create Booking</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('landlord.bookings.store') }}">
                @csrf

                <div class="form-group">
                    <label for="student_id">Student</label>
                    <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                        <option value="">Select Student</option>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hostel_id">Hostel</label>
                    <select name="hostel_id" id="hostel_id" class="form-control @error('hostel_id') is-invalid @enderror" required>
                        <option value="">Select Hostel</option>
                        @foreach($hostels as $hostel)
                        <option value="{{ $hostel->id }}" {{ old('hostel_id') == $hostel->id ? 'selected' : '' }}>{{ $hostel->name }}</option>
                        @endforeach
                    </select>
                    @error('hostel_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                    @error('start_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required>
                    @error('end_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
