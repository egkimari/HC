@extends('frontend.layout')

@section('title', 'Login - HostelConnect')

@section('content')
<style>
    body {
        background-image: url('{{ asset("Images/background.jpg") }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    .card-header {
        background: #f8f9fa;
        border-bottom: none;
        font-weight: bold;
        font-size: 1.5rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus aria-label="{{ __('E-Mail Address') }}" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" aria-label="{{ __('Password') }}" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>
                        <div class="form-group form-check">
                            <x-primary-button type="submit" class="btn-block">{{ __('Login') }}</x-primary-button>
                            <x-input-error :messages="$errors->get('remember')" />
                            <div class="form-check mt-2">
                                <input id="remember" type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link d-block text-center mt-2" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
