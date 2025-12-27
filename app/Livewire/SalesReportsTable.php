<?php

namespace App\Livewire;

use App\Models\DailySalesReport;
use Livewire\Component;
use Livewire\Attributes\On;

class SalesReportsTable extends Component
{
    #[On('report-sent')]
    public function refreshReports()
    {
    }

    public function render()
    {
        $reports = DailySalesReport::with('sentByUser')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.sales-reports-table', [
            'reports' => $reports
        ]);
    }
}
