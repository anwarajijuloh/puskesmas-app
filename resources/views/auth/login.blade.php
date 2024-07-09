@extends('auth.app')
@section('title', 'Login Patien')
@section('header', "Hello! let's get started")
@section('subtitle', 'Sign in to continue.')
@section('content')
    <form class="pt-3" action="{{ route('auth') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="my-2 d-flex justify-content-end align-items-center">
            <a href="{{ route('resetpass') }}" class="auth-link text-black">Forgot password?</a>
        </div>
        <div class="mt-3 d-grid gap-2">
            <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" type="submit">SIGN IN</button>
        </div>
        <div class="text-center mt-4 fw-light"> Don't have an account? <a href="{{ route('register') }}"
                class="text-primary">Create</a>
        </div>
    </form>
@endsection
