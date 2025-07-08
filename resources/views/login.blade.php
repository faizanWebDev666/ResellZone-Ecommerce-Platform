@section('title', 'User Login | ResellZone')

@section('main-container')
    @if ($errors->any())
        <div class="alert alert-danger" style="margin: 20px auto; width: 60%;">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="min-height: 100vh; display: flex; justify-content: center; align-items: center; background: #f4f7f8;">
        <div
            style="display: flex; flex-wrap: wrap; width: 900px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); background: #fff;">
            <div style="flex: 1; padding: 50px; display: flex; flex-direction: column; justify-content: center;">
                <div style="width: 100%; max-width: 360px; margin: 0 auto;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('frontend/img/logo_home.png') }}" alt="Site Logo"
                                style="height: 50px; width: 80px; display: inline-block;">
                        </a>
                    </div>
                    <form action="{{ route('loginUser.submit') }}" method="POST" style="margin-top: 20px;">
                        @csrf
                        <label for="email" style="font-size: 14px; color: #333;">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required
                            style="width: 100%; padding: 12px; margin: 10px 0 20px; border: 1px solid #ccc; border-radius: 28px; font-size: 14px;">
                        <label for="password" style="font-size: 14px; color: #333;">Password</label>
                        <div style="position: relative;">
                            <input type="password" id="password" name="password" placeholder="Enter your password" required
                                style="width: 100%; padding: 12px; padding-right: 40px; border: 1px solid #ccc; border-radius: 28px; font-size: 14px;">
                            <span onclick="togglePassword()"
                                style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 16px;">👁️</span>
                        </div>
                        <div style="text-align: right; margin: 10px 0;">
                            <a href="{{ url('/forgot-password') }}" style="font-size: 14px; color: #04755c;">Forgot
                                Password?</a>
                        </div>
                        <button type="submit"
                            style="width: 100%; padding: 12px; background-color: #04755c; color: #fff; font-size: 16px; font-weight: bold; border: none; border-radius: 28px; cursor: pointer; transition: 0.3s;">
                            Sign In
                        </button>
                        <div style="text-align: center; margin: 25px 0; position: relative;">
                            <hr style="border: none; border-top: 1px solid #ccc;">
                            <span
                                style="position: absolute; top: -11px; left: 50%; transform: translateX(-50%); background: #fff; padding: 0 10px; font-size: 14px; color: #999;">OR</span>
                        </div>
                        <p style="font-size: 14px; color: #666; text-align: center;">Login using social networks</p>
                        <div style="display: flex; justify-content: center; gap: 15px; margin-top: 10px;">
                            <a href="{{ url('googleLogin') }}"
                                style="width: 40px; height: 40px; border-radius: 50%; background-image: url('{{ asset('frontend/img/social.png') }}'); background-size: cover;"></a>
                            <a href="{{ url('auth/facebook') }}"
                                style="width: 40px; height: 40px; border-radius: 50%; background-image: url('{{ asset('frontend/img/facebook.png') }}'); background-size: cover;"></a>
                        </div>
                    </form>
                </div>
            </div>

            <div
                style="flex: 1; background: linear-gradient(to bottom right, #8f1737, #8f1737); color: #fff; padding: 50px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <div style="text-align: center; max-width: 360px;">
                    <h2 style="font-size: 28px; font-weight: bold; color: #f3d075;">New Here?</h2>
                    <p style="font-size: 16px; color: #f3d075; margin: 15px 0 25px;">Sign up and discover a great amount of
                        new opportunities!</p>
                    <a href="{{ route('signup') }}"
                        style="padding: 12px 24px; font-size: 16px; font-weight: bold; color: white; background-color: #04755c; border-radius: 28px; text-decoration: none; transition: 0.3s;">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>
