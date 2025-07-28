@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- 👈 col-md-8 → col-md-6 for smaller form -->
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-primary-to-secondary text-white py-3">
                    <h3 class="text-center font-weight-light my-0">{{ __('Create Your Account') }}</h3>
                </div>

                <div class="card-body px-4 py-3"> <!-- 👈 padding कमी केलं -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label text-muted small mb-1">{{ __('Full Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                       placeholder="Enter your full name">
                            </div>
                            @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted small mb-1">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Enter your email">
                            </div>
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label text-muted small mb-1">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password"
                                       placeholder="Create a password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label text-muted small mb-1">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password"
                                       placeholder="Confirm your password">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-gradient rounded-pill py-2">
                                {{ __('Register Now') }} <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>

                        <div class="text-center mt-3 small text-muted">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none">{{ __('Login here') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styling -->
<style>
    .bg-gradient-primary-to-secondary {
        background: linear-gradient(135deg, #3f51b5, #9c27b0);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #3f51b5, #9c27b0);
        color: #fff;
        border: none;
        transition: background 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #3949ab, #7b1fa2);
        color: #fff;
    }

    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }

    .form-control {
        border-left: 0;
        padding: 10px 12px;
        height: auto;
    }

    .input-group-text {
        background-color: white;
        border-right: 0;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #ced4da;
    }
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endsection
