<!DOCTYPE html>
<html>
<head>
    <title>All Orders Report</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h1 { text-align: center; color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; color: #555; }
        .footer { text-align: center; font-size: 0.8em; color: #777; margin-top: 30px; }
    </style>
</head>
<body>
    <h1>All Orders Report</h1>
    <p>Generated on: {{ now()->format('d M Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Client Name</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->client->client_name ?? 'N/A' }}</td>
                    <td>{{ $order->item_name }}</td>
                    <td>Rp {{ number_format($order->item_price, 2, ',', '.') }}</td>
                    <td>{{ $order->order_date->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
            @if ($orders->isEmpty())
                <tr>
                    <td colspan="5" style="text-align: center;">No orders available.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="footer">
        ERP System - Order Report
    </div>
</body>
</html>
