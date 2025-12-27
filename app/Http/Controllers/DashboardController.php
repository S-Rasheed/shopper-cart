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
}
