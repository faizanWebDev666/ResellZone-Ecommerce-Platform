<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - ReSellZone</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #4C2C92;
        }
        .content {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }
        .important-text {
            font-weight: bold;
            color: #D87B3E;
        }
        .footer {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>

        <div class="content">
            <p>Dear <strong>{{ $details['customer_name'] }}</strong>,</p>

            <p>Thank you for shopping with <span class="important-text">ReSellZone</span>! Your order has been successfully placed. We're processing it and will notify you once it's on its way.</p>

            <h3>Order Details:</h3>
            <ul>
                <li><strong>Order Number:</strong> {{ $details['order_number'] }}</li>
                <li><strong>Order Date:</strong> {{ $details['order_date'] }}</li>
                <li><strong>Total Amount:</strong> PKR {{ $details['total_amount'] }}</li>
                <li><strong>Payment Method:</strong> {{ $details['payment_method'] }}</li>
                <li><strong>Delivery Address:</strong> {{ $details['delivery_address'] }}</li>
            </ul>

            <h3>Items Ordered:</h3>
            <ul>
                @foreach ($details['items'] as $item)
                    <li>{{ $item['name'] }} - {{ $item['quantity'] }} x PKR {{ $item['price'] }}</li>
                @endforeach
            </ul>

            <p>If you have any questions, feel free to contact our support team.</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} ReSellZone. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
