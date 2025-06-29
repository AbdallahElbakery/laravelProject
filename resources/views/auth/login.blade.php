
@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
    <div class="login-form my-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3>User Login</h3>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" name="email" placeholder="Enter your email"value="{{ old('email') }}" id="email" autocomplete="email" autofocus/>
            </div>
        @if ($errors->has('email'))
            <div id='emailError' class='error'>{{ $errors->first('email') }}</div>
        @endif

            <div class="inputBox">
                <span class="fas fa-lock"></span>
                <input type="password" name="password" placeholder="Enter your password" id="password" autocomplete="current-password"/>
            </div>
            @if ($errors->has('password'))
                <div id='passwordError' class='error'>{{ $errors->first('password') }}</div>
            @endif

            <input type="submit" value="Sign In" class="btnn"/>

            <a href="{{ route('register') }}" class="btnn">Create an Account</a>
            <a href="{{ route('password.request') }}" class="">Forgot Password?</a>

        </form>
    </div>
@endsection
