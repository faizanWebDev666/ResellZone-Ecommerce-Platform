<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title', 'Payment Successful | ResellZone')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .card {
            max-width: 600px; /* Increased card width */
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-body {
            padding: 3rem; /* Increased padding for a bigger card */
        }
        .card-title {
            font-size: 2.5rem; /* Increased title size */
            color: #28a745;
            font-weight: bold;
        }
        .card-text {
            font-size: 1.2rem; /* Increased text size */
            color: #6c757d;
        }
        .btn-primary {
            background-color: #C40032;
            border-color: #C40032;
            transition: background-color 0.3s ease;
            font-size: 1.2rem; /* Larger button text */
            padding: 0.8rem 2rem; /* Increased button size */
        }
        .btn-primary:hover {
            background-color: #C40032;
            border-color: #C40032;
        }
        .icon {
            font-size: 5rem; /* Larger icon size */
            color: #28a745;
            margin-bottom: 1.5rem; /* Increased spacing between icon and text */
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-check-circle icon"></i>
                <h2 class="card-title">Payment Successful!</h2>
                <p class="card-text">Thank you for your payment. Your transaction was completed successfully.</p>
                <a href="{{ URL::to('/') }}" class="btn btn-primary">Go Back to Home</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
