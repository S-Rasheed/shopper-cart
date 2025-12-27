<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesReportService
{
    public function generateDailyReport(?Carbon $date = null): array
    {
        $date = $date ?? today();

        return [
            'date' => $date->format('Y-m-d'),
            'total_orders' => $this->getTotalOrders($date),
            'total_revenue' => $this->getTotalRevenue($date),
            'completed_orders' => $this->getCompletedOrders($date),
            'pending_orders' => $this->getPendingOrders(),
            'top_products' => $this->getTopProducts($date),
            'revenue_by_hour' => $this->getRevenueByHour($date),
        ];
    }

    private function getTotalOrders(Carbon $date): int
    {
        return Order::whereDate('created_at', $date)->count();
    }

    private function getTotalRevenue(Carbon $date): float
    {
        return Order::whereDate('created_at', $date)
            ->sum('total');
    }

    private function getCompletedOrders(Carbon $date): int
    {
        return Order::whereDate('created_at', $date)
            ->count();
    }

    private function getPendingOrders(): int
    {
        return 0;
    }

    private function getTopProducts(Carbon $date, int $limit = 5): array
    {
        return DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereDate('orders.created_at', $date)
            ->select(
                'products.name',
                DB::raw('SUM(order_items.quantity) as stock_quantity'),
                DB::raw('SUM(order_items.quantity * order_items.price) as total_revenue')
            )
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_revenue')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    private function getRevenueByHour(Carbon $date): array
    {
        $hourlyRevenue = Order::whereDate('created_at', $date)
            ->select(
                DB::raw('HOUR(created_at) as hour'),
                DB::raw('SUM(total) as revenue')
            )
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->pluck('revenue', 'hour')
            ->toArray();

        $result = [];
        for ($i = 0; $i < 24; $i++) {
            $result[$i] = $hourlyRevenue[$i] ?? 0;
        }

        return $result;
    }
}
