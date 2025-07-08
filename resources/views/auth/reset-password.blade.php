@extends('frontend.layouts.main')

@section('main-container')
    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <br><br>
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins';margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            Reset Password
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Reset Password Form -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow border-0 rounded-3 p-4" style="width: 100%; max-width: 400px;">
            <div class="text-center">
                <h3 class="mb-3">Reset Password</h3>
            </div>

            <form id="resetForm" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email"
                        class="form-control bg-white border rounded-2 shadow-sm" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password"
                            class="form-control bg-white border rounded-2 shadow-sm" placeholder="New Password" required>
                        <span class="input-group-text bg-white border rounded-2 shadow-sm toggle-password"
                            onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div id="passwordLines" class="d-flex gap-2 mt-2">
                        <div class="line flex-grow-1 bg-secondary rounded"
                            style="height: 4px; transition: background-color 0.3s;"></div>
                        <div class="line flex-grow-1 bg-secondary rounded"
                            style="height: 4px; transition: background-color 0.3s;"></div>
                        <div class="line flex-grow-1 bg-secondary rounded"
                            style="height: 4px; transition: background-color 0.3s;"></div>
                    </div>
                    <ul id="passwordRequirements" class="list-unstyled text-muted small mt-2">
                        <li id="lengthReq">🔲 At least 8 characters</li>
                        <li id="upperReq">🔲 At least one uppercase letter</li>
                        <li id="specialReq">🔲 At least one special character</li>
                    </ul>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control bg-white border rounded-2 shadow-sm" placeholder="Confirm Password"
                            required>
                        <span class="input-group-text bg-white border rounded-2 shadow-sm toggle-password"
                            onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="d-grid">
                    <button id="resetButton" type="submit" class="btn btn-danger rounded-2 shadow-sm" disabled>Reset
                        Password</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="{{ url('/') }}" class="text-decoration-none text-muted">
                    <i class="fas fa-arrow-left me-1"></i> Back to Home
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            let input = document.getElementById(id);
            let icon = input.nextElementSibling.querySelector('i');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const resetButton = document.getElementById("resetButton");
            const lengthReq = document.getElementById("lengthReq");
            const upperReq = document.getElementById("upperReq");
            const specialReq = document.getElementById("specialReq");
            const passwordLines = document.querySelectorAll("#passwordLines .line");

            const validatePassword = () => {
                const password = passwordInput.value;
                const hasUpperCase = /[A-Z]/.test(password);
                const hasSpecialChar = /[!@#$%^&*]/.test(password);
                const isValidLength = password.length >= 8;

                lengthReq.textContent = isValidLength ? "✔ At least 8 characters" : "🔲 At least 8 characters";
                upperReq.textContent = hasUpperCase ? "✔ At least one uppercase letter" :
                    "🔲 At least one uppercase letter";
                specialReq.textContent = hasSpecialChar ? "✔ At least one special character" :
                    "🔲 At least one special character";

                passwordLines[0].style.backgroundColor = isValidLength ? "green" : "#ccc";
                passwordLines[1].style.backgroundColor = hasUpperCase ? "green" : "#ccc";
                passwordLines[2].style.backgroundColor = hasSpecialChar ? "green" : "#ccc";

                const allValid = isValidLength && hasUpperCase && hasSpecialChar;
                resetButton.disabled = !allValid;
            };

            passwordInput.addEventListener("input", validatePassword);

            document.getElementById("resetForm").addEventListener("submit", function(event) {
                if (resetButton.disabled) {
                    event.preventDefault();
                    alert("Please fulfill all password requirements before resetting.");
                }
            });
        });
    </script>

@endsection
