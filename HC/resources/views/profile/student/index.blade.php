@extends('frontend.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Student Profiles') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($students as $student)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $student->name }}</h5>
                                <p class="card-text">{{ $student->email }}</p>
                                <a href="{{ route('student.profile.show', $student->id) }}" class="btn btn-primary">{{ __('View Profile') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
