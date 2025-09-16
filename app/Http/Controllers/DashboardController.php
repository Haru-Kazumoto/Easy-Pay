<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function showAdminDashboard()
    {
        return Inertia::render("DashboardAdmin");
    }

    public function showSuperadminDashboard()
    {
        return Inertia::render("DashboardSuperadmin");
    }

    public function showUserDashboard()
    {
        return Inertia::render("DashboardUser");
    }
}
