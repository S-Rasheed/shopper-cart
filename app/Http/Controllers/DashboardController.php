<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function dashboard(DashboardService $dashboardService)
    {
        $stats = $dashboardService->getAllStats();

        return view('dashboard', compact('stats'));
    }

    public function reports(DashboardService $dashboardService)
    {
        $stats = $dashboardService->getReportStats();

        return view('reports', compact('stats'));
    }
}
