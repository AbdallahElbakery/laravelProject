
@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')

<section class="register-form mb-4">
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Register Now</h3>
        <div class="inputBox">
            <span class="fas fa-user"></span>
            <input type="text" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" />
        </div>
        @error('name')
            <div id="nameError" class="error">{{ $message }}</div>

        @enderror

        <div class="inputBox">
            <span class="fas fa-envelope"></span>
            <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" />
        </div>
        @error('email')
            <div id="emailError" class="error">{{ $message }}</div>
        @enderror

        <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input type="password" name="password" id="password" placeholder="Enter your password" value="{{ old('password') }}" autocomplete="new-password" />
        </div>
        @error('password')
            <div id="passwordError" class="error">{{ $message }}</div>
        @enderror

        <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm your password" value="{{ old('password_confirmation') }}" autocomplete="new-password" />
        </div>
        @error('password_confirmation')
            <div id="confirmPasswordError" class="error">{{ $message }}</div>
        @enderror
 <div class="mb-3">
    <input type="file" class="form-control" name="image" id="image">
</div>
        @error('image')
            <div id="imageError" class="error">{{ $message }}</div>
        @enderror
 <div class="mb-3">
    <select name="role" id="role" class="form-control">
        <option value="" selected disabled> select your type</option>
        <option value="user">user</option>
        <option value="admin">admin</option>
    </select>
</div>
        @error('image')
            <div id="imageError" class="error">{{ $message }}</div>
        @enderror

        <input type="submit" value="Sign Up" class="btnn" />
        <a href="{{ route('login') }}" class="btnn">Already have an account</a>
    </form>
</section>
@endsection
