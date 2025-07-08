
@extends('frontend.layouts.main')
@section('title', 'Contact Us | ResellZone')
@section('main-container')
   <style>
        body {
            background-color: #f8f9fa;
        }
        .contact-header {
            background: linear-gradient(to right, #C40032, grey);
            color: white;
            padding: 50px;
            text-align: center;
            border-radius: 10px;
            font-weight: bold;
            margin-top: 100px;
        }
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
            background-color: white;
            padding: 25px;
            transition: transform 0.3s;
        }
        .card-custom:hover {
            transform: scale(1.02);
        }
        .btn-custom {
            background-color: #C40032;
            color: white;
            border-radius: 25px;
            padding: 10px 25px;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #a00028;
        }
        .form-control {
            border-radius: 10px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="contact-header">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Fill out the form below to get in touch.</p>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card card-custom">
                    <h5 class="text-center mb-4">Send Us a Message</h5>
                    <form action="{{route('contactform.submit')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter subject" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="msg" rows="4" placeholder="Enter your message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection