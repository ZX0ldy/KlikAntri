@extends('templates.mainLogin')

@section('content')

    <!-- Right Form Section (sekarang di sebelah kiri) -->
    <div class="right-section">
        <div class="login-form">
            <p><img src="../.../../../../../assets/logos/logo1380.png" alt="KlikAntri Logo" height="50" class="mb-3">
            </p>
            <h1>Sign Up</h1>
            <p>Please enter your details</p>
            <form action="{{ route('registerproses') }}" method="POST">
            @csrf
            <input type="hidden" name="role_id" id="role_id_hidden" value="1">
            <div class="mb-3">
                <input type="text" class="login-input" name="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="login-input" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="number" class="login-input" name="phone" placeholder="Phone">
            </div>
            <div class="mb-3">
                <input type="password" class="login-input" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
            <input type="password" class="login-input" name="password_confirmation" placeholder="Confirm Password" required>
             </div>


            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <div class="sign-link fs-12 py-3">
                <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
            </div>
        </form>

            <div class="justify-content-center sign-link fs-12">
                <p>By signing in, you agree to our <a href="#" class="text-decoration-none">Terms of
                        Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a></p>
            </div>
        </div>
    </div>
    <div class="left-section">
        <img src="../../../../assets/bg/loginreg.png" alt="Login Illustration">
    </div>
@endsection
