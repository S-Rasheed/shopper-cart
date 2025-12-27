<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DailySalesReport;
use App\Mail\DailySalesReportMail;
use App\Services\SalesReportService;
use Illuminate\Support\Facades\Mail;

class SendDailySalesReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-sales-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily sales report to admin';

    /**
     * Execute the console command.
     */
    public function handle(SalesReportService $salesReportService)
    {
        $this->info('Generating daily sales report...');

        #generate report for yesterday
        $reportData = $salesReportService->generateDailyReport(today());

        #retrieve admin email
        $adminEmail = config('mail.admin_email', env('ADMIN_EMAIL', 'ksrasheed22@gmail.com'));

        #send email
        Mail::to($adminEmail)->send(
            new DailySalesReportMail($reportData, today()->format('F j, Y'))
        );

        DailySalesReport::create([
            'report_date' => today(),
            'sent_to_email' => $adminEmail,
            'sent_by' => 'system',
            'sent_by_user_id' => null,
            'report_data' => $reportData,
        ]);

        $this->info('Daily sales report sent successfully!');
    }
}
