@extends('auth.app')
@section('title', 'Reset Password Patien')
@section('header', "Forgot Password")
@section('subtitle', 'Enter your email for password reset')
@section('content')
    <form class="pt-3">
        <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
        </div>
        <div class="mt-3 d-grid gap-2">
            <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" type="submit">RESET</button>
        </div>
    </form>
@endsection
