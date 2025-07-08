
@section('title', 'Sign Up | ResellZone')

@section('main-container')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <!-- Registration Page -->
    <div
        style="display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(to right, #f8f9fa, #e9ecef); margin: 0; overflow: hidden;">
        <div
            style="display: flex; background-color: white; width: 900px; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);">

            <div style="flex: 1; padding: 40px; display: flex; flex-direction: column; justify-content: center;">
                <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 5px; color: #000;">Create an Account</h2>
                <p style="margin-bottom: 20px; font-size: 14px; color: #666;">Join <span
                        style="font-weight: bold; color: #c10037;">ReSellZone</span> and explore great opportunities!</p>

                <form id="signupForm" action="{{ URL::to('signupUser') }}" method="POST" enctype="multipart/form-data"
                    style="margin: 0; height: 480px;">
                    @csrf

                    <div style="margin-bottom: 10px;">
                        <label for="name" style="display: block; font-size: 14px; color: #444; margin-bottom: 5px;">Full
                            Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required
                            style="width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px; outline: none; color: #333; background-color: #fafafa; box-sizing: border-box; transition: border-color 0.3s, box-shadow 0.3s;">
                    </div>

                    <!-- Email -->
                    <div style="margin-bottom: 20px;">
                        <label for="email"
                            style="display: block; font-size: 14px; color: #444; margin-bottom: 5px;">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required
                            style="width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px; outline: none; color: #333; background-color: #fafafa; box-sizing: border-box; transition: border-color 0.3s, box-shadow 0.3s;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="password"
                            style="display: block; font-size: 14px; color: #444; margin-bottom: 5px;">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required
                            style="width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px; outline: none; color: #333; background-color: #fafafa; box-sizing: border-box; transition: border-color 0.3s, box-shadow 0.3s;">
                        <div id="passwordLines" style="display: flex; gap: 5px; margin-top: 8px;">
                            <div class="line" style="height: 4px; flex: 1; background-color: #ccc; transition: background-color 0.3s;"></div>
                            <div class="line" style="height: 4px; flex: 1; background-color: #ccc; transition: background-color 0.3s;"></div>
                            <div class="line" style="height: 4px; flex: 1; background-color: #ccc; transition: background-color 0.3s;"></div>
                        </div>
                    </div>

                    <ul id="passwordRequirements"
                        style="font-size: 14px; color: #666; text-align: left; list-style: none; padding: 0; margin: 0 0 20px;">
                        <li id="lengthReq">🔲 At least 8 characters</li>
                        <li id="upperReq">🔲 At least one uppercase letter</li>
                        <li id="specialReq">🔲 At least one special character</li>
                    </ul>
                    <div style="margin-bottom: 20px;">
                        <label for="user_type" style="display: block; font-size: 14px; color: #444; margin-bottom: 5px;">Select Account Type</label>
                        <select id="user_type" name="type" required
                            style="width: 50%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px; outline: none; color: #333; background-color: #fafafa; box-sizing: border-box;">
                            <option value="customer">Customer</option>
                            <option value="seller">Seller</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    
                    <button type="submit" id="signupButton"
                        style="width: 40%; margin-left: 15%; padding: 12px; font-size: 16px; font-weight: bold; color: white; background-color: #cccccc; border: none; border-radius: 24px; cursor: not-allowed; transition: background-color 0.3s, box-shadow 0.3s; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);"
                        disabled>
                        Create Account
                    </button>
                   
                </form>
            </div>

            <div
                style="flex: 1; background: linear-gradient(to right, #8f1737, #8f1737); display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; padding: 40px; text-align: center;">
                <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #f3d075;">Already have an
                    account?</h2>
                <p style="margin-bottom: 20px; font-size: 14px; color: #f3d075;">Sign in and continue exploring amazing
                    opportunities.</p>
                <a href="{{ route('login') }}"
                    style="padding: 10px 20px; font-size: 16px; font-weight: bold; color: white; background-color: #04755c; border-radius: 24px; text-decoration: none; transition: background-color 0.3s, box-shadow 0.3s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    Sign In
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const signupButton = document.getElementById("signupButton");
            const lengthReq = document.getElementById("lengthReq");
            const upperReq = document.getElementById("upperReq");
            const specialReq = document.getElementById("specialReq");
            const passwordLines = document.querySelectorAll("#passwordLines .line");

            const validatePassword = () => {
                const password = passwordInput.value;
                const hasUpperCase = /[A-Z]/.test(password);
                const hasSpecialChar = /[!@#$%^&*]/.test(password);
                const isValidLength = password.length >= 8;

                lengthReq.textContent = isValidLength ? "At least 8 characters" : "🔲 At least 8 characters";
                upperReq.textContent = hasUpperCase ? " At least one uppercase letter" : "🔲 At least one uppercase letter";
                specialReq.textContent = hasSpecialChar ? " At least one special character" : "🔲 At least one special character";

                const allValid = isValidLength && hasUpperCase && hasSpecialChar;

                passwordLines[0].style.backgroundColor = isValidLength ? "green" : "#ccc";
                passwordLines[1].style.backgroundColor = hasUpperCase ? "green" : "#ccc";
                passwordLines[2].style.backgroundColor = hasSpecialChar ? "green" : "#ccc";

                signupButton.disabled = !allValid;
                signupButton.style.backgroundColor = allValid ? "#04755c" : "#cccccc";
                signupButton.style.cursor = allValid ? "pointer" : "not-allowed";
            };

            passwordInput.addEventListener("input", validatePassword);

            document.getElementById("signupForm").addEventListener("submit", function (event) {
                if (signupButton.disabled) {
                    event.preventDefault();
                    alert("Please fulfill all password requirements before signing up.");
                }
            });
        });
    </script>
    
