@extends('layouts.app')

@section('navbar')
    @include('component.navbar')
@endsection

@section('content')

<style>
    body {
        background: url('https://source.unsplash.com/random/1920x1080/?nature,abstract') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }
    .card {
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        background: rgba(255, 255, 255, 0.9);
    }
    .card-header {
        background: #007bff;
        color: white;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        padding: 15px;
    }
    .form-control {
        border-radius: 10px;
        padding: 10px;
    }
    .btn-primary {
        background: linear-gradient(to right, #4facfe, #00f2fe);
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
        font-size: 1rem;
        font-weight: bold;
        color: white;
    }
    .btn-primary:hover {
        background: linear-gradient(to right, #00f2fe, #4facfe);
        transition: 0.4s;
    }
    .btn-link {
        color: #007bff;
        font-weight: bold;
        text-decoration: none;
    }
    .btn-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    .form-check-label {
        font-size: 0.9rem;
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
   @include('component.footer')
@endsection
