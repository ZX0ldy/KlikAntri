@extends('templates.mainLogin')

@section('content')

    <!-- Right Form Section (sekarang di sebelah kiri) -->
    <div class="right-section">
        <div class="login-form">
            <p><img src="../.../../../../../assets/logos/logo1380.png" alt="KlikAntri Logo" height="50" class="mb-3">
            </p>
            <h1>Sign Up</h1>
            <p>Please enter your details</p>
            <form>
                <div class="mb-3">
                    <input type="text" class="login-input" id="Name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <input type="email" class="login-input" id="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="number" class="login-input" id="phone" placeholder="Phone">
                </div>
                <div class="mb-3">
                    <input type="password" class="login-input" id="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input type="password" class="login-input" id="password2" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                <div class="sign-link fs-12 py-3">
                    <p>Already have account? <a href="login.html">Sign In</a></p>
                </div>
            </form>
            <div class="justify-content-center sign-link fs-12">
                <p>By signing in, you agree to our <a href="#" class="text-decoration-none">Terms of
                        Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a></p>
            </div>
        </div>
    </div>
    <div class="left-section">
        <img src="../../../../assets/bg/login.png" alt="Login Illustration">
    </div>
@endsection
    