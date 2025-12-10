@extends('layouts.app')

@section('title', 'Log In - Modern Blog')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <h1 class="auth-title">Welcome Back</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="form-actions">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Keep me logged in</span>
                </label>

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">
                    Forgot Password?
                </a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Log In
            </button>
        </form>

        <div class="auth-footer">
            Don't have an account?
            <a href="{{ route('register') }}">Subscribe Now</a>
        </div>
    </div>
</div>
@endsection
