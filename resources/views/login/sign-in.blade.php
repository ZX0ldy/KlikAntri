@extends('templates.mainLogin')

@section('content')
    <!-- Left Image Section -->
    <div class="left-section">
        <img src="../../../../assets/bg/loginreg.png" alt="Login Illustration">
    </div>

    <!-- Right Form Section -->
    <div class="right-section">
        <div class="login-form">
            <p><img src="../.../../../../../assets/logos/logo1380.png" alt="KlikAntri Logo" height="50" class="mb-3">
            </p>
            <h1>Sign In</h1>
            <p>Please enter your details</p>
            <form action="{{ route('loginproses') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" class="login-input" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="login-input" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3 text-end">
                    <a href="#" class="text-decoration-none fs-12">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                <div class="sign-link fs-12 py-3">
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection
