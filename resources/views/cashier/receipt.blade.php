<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        .receipt-container {
            width: 350px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .receipt-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .receipt-header h2 {
            margin: 0;
            font-size: 18px;
            color: #777;
        }

        .receipt-header p {
            margin: 5px 0;
            font-size: 12px;
            color: #999;
        }

        .receipt-details {
            margin-bottom: 20px;
        }

        .receipt-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }

        .receipt-footer {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        .receipt-footer p {
            margin: 0;
            font-size: 14px;
            color: #777;
        }

        .info {
            font-size: 12px;
            color: #999;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            text-decoration: none;
            color: #007BFF;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px
        }

        .receipt-table th,
        .receipt-table td {
            border: none;
            padding: 8px;
            text-align: left;
        }

        .receipt-details p strong {
            display: inline-block;
            width: 120px;
        }

        .grid {
            display: grid;
            grid-template-columns: auto auto;
        }

        .print-container {
            text-align: center;
            margin-top: 20px;
        }

        .fab {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .fab:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h1>ShopNinja</h1>
            <h2>Receipt</h2>
            <p class="info">Roxas City, Capiz</p>
        </div>
        <div class="receipt-details">
            <div class="grid">
                <p><strong>Payment:</strong></p>
                <p>{{ $receiptData->payment }}</p>
            </div>
            <table class="receipt-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesRecords as $item)
                    @if ($item->transaction_id == $receiptData->transaction_id)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->unit_price }}</td>
                        <td>{{ $item->qty }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <div class="grid">
                <p><strong>Discount:</strong></p>
                <p>{{ $receiptData->discount_name ?? 'None' }}</p>
                <p><strong>Total:</strong></p>
                <p>{{ $receiptData->total }}</p>
                <p><strong>Cash Received:</strong></p>
                <p>{{ $receiptData->cash }}</p>
                <p><strong>Change:</strong></p>
                <p>{{ $receiptData->change }}</p>
            </div>
        </div>
        <div class="receipt-footer">
            <p>{{ $receiptData->created_at }}</p>
            <p>Thank you for your purchase!</p>
            <p class="info">Please keep this receipt for your records.</p>
        </div>
    </div>
    <div class="print-container">
        <button class="fab" onclick="window.print()">Print</button>
    </div>
    <a href="/cashier" class="back-link">Go back</a>
</body>

</html>
