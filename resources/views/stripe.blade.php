<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title', 'Secure Payment | ResellZone')

    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-container {
            background: white;
            padding: 40px 30px; /* Increased padding */
            border-radius: 15px; /* More rounded corners */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px; /* Increased width */
            transition: transform 0.3s ease-in-out;
        }
        .payment-container:hover {
            transform: scale(1.05); /* Slight hover effect */
        }
        h2 {
            color: #333;
            font-size: 24px; /* Increased font size */
            margin-bottom: 30px; /* Increased margin */
            font-weight: bold;
        }
        h2 span {
            color: #007bff;
        }
        #card-element {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 16px; /* Increased font size for input */
        }
        .btn-pay {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 20px; /* Increased padding */
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 18px; /* Larger button text */
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-pay:hover {
            background-color: #0056b3;
        }
        .btn-pay i {
            margin-right: 10px; /* Spacing between icon and text */
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Total Amount: <span>200 AED</span></h2>
        <form id="payment-form">
            <div id="card-element"></div>
            <button class="btn-pay" id="submit-button">
                <i class="fas fa-lock"></i> Pay Securely
            </button>
        </form>
    </div>

    <script>
        var stripe = Stripe("{{ config('services.stripe.key') }}");
        var elements = stripe.elements();
        var card = elements.create('card', { style: { base: { fontSize: '16px' } } });
        card.mount('#card-element');

        document.getElementById('payment-form').addEventListener('submit', function (event) {
            event.preventDefault();
            stripe.confirmCardPayment("{{ $clientSecret }}", {
                payment_method: { card: card }
            }).then(function (result) {
                if (result.error) {
                    alert(result.error.message);
                } else {
                    if (result.paymentIntent.status === 'succeeded') {
                        window.location.href = "{{ route('payment.success') }}";
                    }
                }
            });
        });
    </script>
</body>
</html>
