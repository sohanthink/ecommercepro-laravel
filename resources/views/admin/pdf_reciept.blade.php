<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Receipt</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ $order->price }}</td>
                </tr>
            </tbody>
    </table>
    <table>
            <thead>
                <tr>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td><img src="/product_image/$order->image" alt="Product Image"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
