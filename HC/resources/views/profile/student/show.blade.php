@extends('frontend.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Student Profile') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Email') }}</label>
                                <input type="email" class="form-control" value="{{ $student->email }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>{{ __('Role') }}</label>
                                <input type="text" class="form-control" value="Student" readonly>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('student.profile.index') }}" class="btn btn-primary">{{ __('Back to Profiles') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
