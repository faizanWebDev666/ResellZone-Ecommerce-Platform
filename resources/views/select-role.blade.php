<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Your Role | ResellZone</title>
    
    <!-- Bootstrap CSS (Ensure it's included in your layout or add it here) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .role-card {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-check-input {
            margin-right: 10px;
        }
        .btn-custom {
            background-color: #800000;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #660000;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="role-card">
            <h2 class="text-center">Select Your Role</h2>
            <p class="text-center text-muted">Please choose your role to continue</p>
            
            <form action="{{ route('saveRole') }}" method="POST">
                @csrf
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="customer" value="customer" required>
                    <label class="form-check-label" for="customer">
                        <strong>Customer</strong> - Buy and explore products
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="seller" value="seller" required>
                    <label class="form-check-label" for="seller">
                        <strong>Seller</strong> - Sell products and manage your store
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin" required>
                    <label class="form-check-label" for="admin">
                        <strong>Admin</strong> - Manage the platform and users
                    </label>
                </div>

                <button type="submit" class="btn btn-custom w-100 mt-3">Continue</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (Ensure it's included in your layout or add it here) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
