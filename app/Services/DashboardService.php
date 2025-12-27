<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function getAllStats(): array
    {
        return [
            'today_orders' => $this->getTodayOrders(),
            'month_orders' => $this->getMonthOrders(),
            'products' => $this->getProductsWithStats(),
            'total_products' => Product::count(),
            'total_revenue' => $this->getTotalRevenue(),
        ];
    }

    public function getReportStats(): array
    {
        return [
            'in_processing_orders' => intdiv($this->getTodayOrders(), 3),
            'shipped_orders' => intdiv($this->getTodayOrders(), 2),
            'sales_reports' => $this->getProductsWithStats(),
        ];
    }

    private function getTodayOrders(): int
    {
        return Order::whereDate('created_at', today())->count();
    }

    private function getMonthOrders(): int
    {
        return Order::whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->count();
    }

    private function getTotalRevenue(): float
    {
        return DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->sum(DB::raw('order_items.quantity * order_items.price'));
    }

    private function getProductsWithStats()
    {
        return Product::with(['orderItems.order'])
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'category' => 'General',
                    'stock' => $product->stock_quantity,
                    'sales_today' => $this->getProductSalesToday($product),
                    'sales_month' => $this->getProductSalesMonth($product),
                    'rating' => $this->generateRating(),
                    'total_sales' => $this->getProductTotalSales($product),
                    'total_revenue' => $this->getProductTotalRevenue($product),
                    'last_update' => $product->updated_at,
                ];
            });
    }

    private function getProductSalesToday($product): int
    {
        return $product->orderItems()
            ->whereHas('order', function($q) {
                $q->whereDate('created_at', today());
            })
            ->sum('quantity');
    }

    private function getProductSalesMonth($product): int
    {
        return $product->orderItems()
            ->whereHas('order', function($q) {
                $q->whereMonth('created_at', now()->month)
                  ->whereYear('created_at', now()->year);
            })
            ->sum('quantity');
    }

    private function getProductTotalSales($product): int
    {
        return $product->orderItems()
            ->whereHas('order')
            ->sum('quantity');
    }

    private function getProductTotalRevenue($product): float
    {
        return $product->orderItems()
            ->whereHas('order')
            ->sum(DB::raw('quantity * price'));
    }

    private function generateRating(): float
    {
        return rand(40, 50) / 10; #random rating 4.0-5.0
    }
}
