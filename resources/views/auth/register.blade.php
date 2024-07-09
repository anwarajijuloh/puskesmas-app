@extends('auth.app')
@section('title', 'Register Patien')
@section('header', 'New here?')
@section('subtitle', 'Signing up is easy. It only takes a few steps.')
@section('content')
    <form class="pt-3" action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
                placeholder="Name" name="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email"
                placeholder="Email" name="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                id="password" placeholder="Password" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3 d-grid gap-2">
            <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" type="submit">SIGN UP</button>
        </div>
        <div class="text-center mt-4 fw-light"> Already have an account? <a href="{{ route('login') }}"
                class="text-primary">Login</a>
        </div>
    </form>
@endsection
