<?php

namespace App\Livewire;

use App\Mail\DailySalesReportMail;
use App\Models\DailySalesReport;
use App\Services\SalesReportService;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SendSalesReportModal extends Component
{
    public $showModal = false;
    public $email = '';
    public $reportDate;

    protected $rules = [
        'email' => 'required|email',
        'reportDate' => 'required|date',
    ];

    public function mount()
    {
        $this->reportDate = today()->format('Y-m-d');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['email', 'reportDate']);
    }

    public function sendReport(SalesReportService $salesReportService)
    {
        $this->validate();

        $reportData = $salesReportService->generateDailyReport(
            \Carbon\Carbon::parse($this->reportDate)
        );

        Mail::to($this->email)->send(
            new DailySalesReportMail(
                $reportData,
                \Carbon\Carbon::parse($this->reportDate)->format('F j, Y')
            )
        );

        DailySalesReport::create([
            'report_date' => $this->reportDate,
            'sent_to_email' => $this->email,
            'sent_by' => 'user',
            'sent_by_user_id' => auth()->id(),
            'report_data' => $reportData,
        ]);

        $this->dispatch('report-sent','Sales report sent successfully!');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.send-sales-report-modal');
    }
}
