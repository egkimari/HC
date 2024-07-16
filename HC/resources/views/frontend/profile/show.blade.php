@extends('frontend.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('My Profile') }}</h1>
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
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Email') }}</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Role') }}</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->is_admin ? 'Admin' : (auth()->user()->is_landlord ? 'Landlord' : 'Student') }}" readonly>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('Edit Profile') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

