@extends('frontend.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Hostel Details') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('Hostel Name') }}</label>
                                <input type="text" class="form-control" value="{{ $hostel->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Location') }}</label>
                                <input type="text" class="form-control" value="{{ $hostel->location }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Rent') }}</label>
                                <input type="text" class="form-control" value="{{ $hostel->rent }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Ratings') }}</label>
                                <input type="text" class="form-control" value="{{ $hostel->ratings }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Description') }}</label>
                                <textarea class="form-control" rows="5" readonly>{{ $hostel->description }}</textarea>
                            </div>

                            @if($hostel->images->count())
                                <div class="form-group">
                                    <label>{{ __('Images') }}</label>
                                    <div class="row">
                                        @foreach($hostel->images as $image)
                                            <div class="col-md-3">
                                                <img src="{{ Storage::url($image->path) }}" class="img-fluid" alt="Hostel Image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('hostels.index') }}" class="btn btn-secondary">{{ __('Back to List') }}</a>
                            <a href="{{ route('hostels.edit', $hostel->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            <form action="{{ route('hostels.destroy', $hostel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
