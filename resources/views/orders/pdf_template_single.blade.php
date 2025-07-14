<!DOCTYPE html>
<html>
<head>
    <title>Order #{{ $order->id_order }} Details</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h1 { text-align: center; color: #333; margin-bottom: 20px; }
        .order-details { margin-bottom: 20px; border: 1px solid #eee; padding: 15px; border-radius: 5px; }
        .order-details p { margin-bottom: 8px; }
        .order-details strong { display: inline-block; width: 120px; color: #555; }
        .total { text-align: right; font-size: 1.2em; font-weight: bold; margin-top: 20px; }
        .footer { text-align: center; font-size: 0.8em; color: #777; margin-top: 30px; }
    </style>
</head>
<body>
    <h1>Order Details</h1>
    <div class="order-details">
        <p><strong>Order ID:</strong> {{ $order->id_order }}</p>
        <p><strong>Client Name:</strong> {{ $order->client->client_name ?? 'N/A' }}</p>
        <p><strong>Item Name:</strong> {{ $order->item_name }}</p>
        <p><strong>Price:</strong> Rp {{ number_format($order->item_price, 2, ',', '.') }}</p>
        <p><strong>Order Date:</strong> {{ $order->order_date->format('d M Y H:i') }}</p>
    </div>
    <div class="total">
        Total: Rp {{ number_format($order->item_price, 2, ',', '.') }}
    </div>
    <div class="footer">
        ERP System - Order Details
    </div>
</body>
</html>
