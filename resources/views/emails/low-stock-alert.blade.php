<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: #dc2626;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .alert-box {
            background: #fef2f2;
            border-left: 4px solid #dc2626;
            padding: 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .product-info {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .product-info h2 {
            margin-top: 0;
            color: #1f2937;
        }
        .stock-level {
            font-size: 36px;
            font-weight: bold;
            color: #dc2626;
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            background: #f9fafb;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚠️ Low Stock Alert</h1>
        </div>

        <div class="content">
            <div class="alert-box">
                <strong>Action Required:</strong> Stock levels are running critically low for one of your products.
            </div>

            <div class="product-info">
                <h2>{{ $product->name }}</h2>
                <p><strong>Product ID:</strong> #{{ $product->id }}</p>
                <p><strong>Current Price:</strong> ${{ number_format($product->price, 2) }}</p>

                <div class="stock-level">
                    {{ $product->stock_quantity }} units remaining
                </div>

                <p style="text-align: center; color: #dc2626;">
                    <strong>This product needs restocking urgently!</strong>
                </p>
            </div>

            <div style="text-align: center;color:#fff;">
                <a href="{{ url('dashboard') }}" class="button" style="color:#fff;">
                    Manage Product Stock
                </a>
            </div>

            <p style="margin-top: 30px; color: #6b7280;">
                This is an automated alert sent when stock levels fall below the threshold.
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
