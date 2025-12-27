<?php

namespace App\Listeners;

use App\Models\Product;
use App\Events\StockRunningLow;
use App\Jobs\SendLowStockEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLowStockNotification
{

    /**
     * Handle the event.
     */
    public function handle(StockRunningLow $event): void
    {
        try {
            $product = $event->product;

            if (!$product) {
                Log::error("Product not found for low stock");
                return;
            }
            
            Log::info("Stock running low for product: {$product->name}");

            #dispatch a job to send email
            SendLowStockEmail::dispatch($product);


        } catch (\Exception $e) {

            #log any unexpected errors
            Log::error("Error processing low stock for product: " . $e->getMessage());
        }
    }
}
