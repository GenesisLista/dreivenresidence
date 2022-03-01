@extends('layouts.authentication')
@section('title', 'Login')


@section('content')
<div class="card">
    <div class="text-center mb-2">
        <a class="header-brand" href=""><i class="fe fe-command brand-logo"></i></a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-title">Login to your account</div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <span class="custom-control-label">Remember me</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Sign in') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
    <div class="text-center text-muted">
        Don't have account yet? <a href="{{ route('register') }}">Sign up</a>
    </div>
</div>
@stop