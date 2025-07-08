<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration | ResellZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .registration-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #800000;
            border: none;
        }

        .btn-primary:hover {
            background-color: #660000;
        }
    </style>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="registration-container">
            <h3 class="text-center mb-4 text-dark">Seller Registration</h3>
            <form action="{{ route('seller.register') }}" method="POST">
                @csrf

                <!-- Full Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter your full name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Store Name -->
                <div class="mb-3">
                    <label for="store_name" class="form-label">Store Name</label>
                    <input type="text" name="store_name"
                        class="form-control @error('store_name') is-invalid @enderror"
                        placeholder="Enter your store name" value="{{ old('store_name') }}" required>
                    @error('store_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="store_name" class="form-label">Email</label>

                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your email" value="{{ session('email') }}" required>



                <!-- Contact Number -->
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="tel" name="contact" class="form-control @error('contact') is-invalid @enderror"
                        placeholder="Enter your phone number" value="{{ old('contact') }}" required>
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                        placeholder="Enter your complete address" required>{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Register as Seller</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
