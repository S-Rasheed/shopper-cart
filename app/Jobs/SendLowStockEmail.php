<?php

namespace App\Jobs;

use App\Models\Product;
use App\Mail\LowStockMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendLowStockEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {

            #retrieve admin email
            $email = config('mail.admin_email', env('ADMIN_EMAIL', 'ksrasheed22@gmail.com'));

            Mail::to($email)->send(new LowStockMail($this->product));

        } catch (\Exception $e) {

            Log::error('An error occurred while attempting to send Low Stock Alert Email', [
                'exception' => $e->getMessage(),
            ]);
        }
    }
}
