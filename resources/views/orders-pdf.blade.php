<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
            vertical-align: middle;
            white-space: nowrap; /* Prevents line breaks */
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .wide-column {
            width: 200px; /* Prevents text from wrapping */
        }
    </style>
</head>
<body>

    <h2>Orders Report</h2>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th class="wide-column">Product Name</th>
                <th>Quantity</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Price</th>
                <th>Order Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @php
                    $customer = $customers[$order->customerId] ?? null;
                    $orderItem = $orderItems->where('orderId', $order->id)->first();
                    $product = $orderItem ? ($products[$orderItem->productId] ?? null) : null;
                @endphp
                <tr>
                    <td>{{ $order->id }}</td>
                    <td class="wide-column">{{ $product ? $product->name : 'No Product' }}</td>
                    <td class="text-center">{{ $orderItem ? $orderItem->quantity : '-' }}</td>
                    <td>{{ $customer ? $customer->name : 'Unknown' }}</td>
                    <td>{{ $customer ? $customer->email : '-' }}</td>
                    <td>{{ $customer ? $customer->phone : '-' }}</td>
                    <td>{{ $order->adress }}</td>
                    <td>${{ $orderItem ? number_format($orderItem->price, 2) : '-' }}</td>
                    <td class="text-center">{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
