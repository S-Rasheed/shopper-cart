<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; }
        .metric { background: white; padding: 15px; margin: 10px 0; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .metric-label { font-size: 14px; color: #666; }
        .metric-value { font-size: 24px; font-weight: bold; color: #667eea; }
        .products-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .products-table th { background: #667eea; color: white; padding: 10px; text-align: left; }
        .products-table td { padding: 10px; border-bottom: 1px solid #ddd; }
        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Daily Sales Report</h1>
            <p>{{ $reportDate }}</p>
        </div>

        <div class="content">
            <h2>Summary</h2>

            <div class="metric">
                <div class="metric-label">Total Orders</div>
                <div class="metric-value">{{ $reportData['total_orders'] }}</div>
            </div>

            <div class="metric">
                <div class="metric-label">Total Revenue</div>
                <div class="metric-value">${{ number_format($reportData['total_revenue'], 2) }}</div>
            </div>

            <div class="metric">
                <div class="metric-label">Completed Orders</div>
                <div class="metric-value">{{ $reportData['completed_orders'] }}</div>
            </div>

            <div class="metric">
                <div class="metric-label">Pending Orders</div>
                <div class="metric-value">{{ $reportData['pending_orders'] }}</div>
            </div>

            <h2>Top Selling Products</h2>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportData['top_products'] as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>${{ number_format($product->total_revenue, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>This is an automated report from your Shopper Simple Cart Sales System.</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
