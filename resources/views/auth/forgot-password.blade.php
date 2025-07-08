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
                    Forgot Password
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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Display Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 mx-auto">
                    <div class="login-wrap password-form">
                        <div class="login-header">
                            <h3>Forgot Password</h3>
                            <p>Enter your email, and we will send you a link to reset your password.</p>
                        </div>
    
                        <!-- Display success or error messages -->
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
    
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf <!-- CSRF protection -->
    
                            <div class="form-set group-img">
                                <div class="group-img">
                                    <i class="feather-mail"></i>
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                </div>
                            </div>
    
                            <button class="btn btn-primary w-100 login-btn" type="submit">Submit</button>
                        </form>
    
                        <a href="{{ url('/') }}" class="back-home">
                            <i class="fas fa-arrow-left me-1"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
