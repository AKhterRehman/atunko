<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\InvestorApplication;
use App\Models\InvestorDocument;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'totalInvestors' => User::where('role', 'investor')->count(),
            'submittedCount' => InvestorApplication::where('status', 'submitted')->count(),
            'underReviewCount' => InvestorApplication::where('status', 'under_review')->count(),
            'infoRequestedCount' => InvestorApplication::where('status', 'info_requested')->count(),
            'approvedCount' => InvestorApplication::where('status', 'approved')->count(),
            'rejectedCount' => InvestorApplication::where('status', 'rejected')->count(),
            'pendingDocuments' => InvestorDocument::where('status', 'pending')->count(),
            'recentActivity' => AuditLog::with('actor')->latest()->limit(10)->get(),
        ]);
    }
}
