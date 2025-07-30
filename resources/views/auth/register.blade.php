@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:6%">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border-animate shadow-sm rounded-lg">
                <div class="card-header bg-gradient-blue text-white py-3">
                    <h4 class="text-center my-0">{{ __('Create Account') }}</h4>
                </div>

                <div class="card-body px-3 py-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label text-muted small mb-1">{{ __('Full Name') }}</label>
                            <div class="input-group input-group-sm"> <!-- 👈 Smaller input group -->
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}"     autocomplete="name" autofocus
                                       placeholder="Your full name">
                            </div>
                            @error('name')
                            <span class="invalid-feedback d-block small" role="alert"> <!-- 👈 Smaller error text -->
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted small mb-1">{{ __('Email') }}</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"   autocomplete="email"
                                       placeholder="Your email">
                            </div>
                            @error('email')
                            <span class="invalid-feedback d-block small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label text-muted small mb-1">{{ __('Password') }}</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                                       name="password"   autocomplete="new-password"
                                       placeholder="Create password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback d-block small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label text-muted small mb-1">{{ __('Confirm Password') }}</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input id="password-confirm" type="password" class="form-control form-control-sm"
                                       name="password_confirmation"      autocomplete="new-password"
                                       placeholder="Confirm password">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-gradient rounded-pill py-2">
                                {{ __('Register') }} <i class="bi bi-arrow-right ms-1"></i> <!-- 👈 Smaller text -->
                            </button>
                        </div>

                        <div class="text-center mt-2 small text-muted">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none">{{ __('Login') }}</a> <!-- 👈 Smaller text -->
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Custom Styling -->
<style>
    .bg-gradient-blue {
        background: linear-gradient(135deg, #00d2ff 0%, #1d2632 100%);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #00d2ff 0%, #1d2632 100%);
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #00c4f0 0%, #151b24 100%);
        transform: translateY(-1px);
    }

    .card {
        border: none;
        border-radius: 10px; /* 👈 Slightly smaller radius */
        overflow: hidden;
    }

    .form-control, .form-control-sm {
        border-left: 0;
        padding: 8px 10px; /* 👈 Reduced padding */
        height: auto;
        font-size: 0.875rem; /* 👈 Smaller font */
    }

    .input-group-text {
        background-color: white;
        border-right: 0;
        padding: 0.375rem 0.75rem; /* 👈 Adjusted padding */
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #ced4da;
    }
    .card {
    border: 2px solid transparent;
    border-radius: 10px;
    background-image: linear-gradient(#fff, #fff), linear-gradient(135deg, #00d2ff, #1d2632);
    background-origin: border-box;
    background-clip: content-box, border-box;
}

    
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endsection