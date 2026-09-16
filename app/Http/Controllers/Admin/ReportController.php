<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvestorApplication;
use App\Models\InvestorLead;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('admin.reports.index', [
            'statusBreakdown' => InvestorApplication::select('status', DB::raw('count(*) as total'))
                ->groupBy('status')->pluck('total', 'status'),
            'sectorInterest' => InvestorLead::select('sector_interest', DB::raw('count(*) as total'))
                ->groupBy('sector_interest')->pluck('total', 'sector_interest'),
            'approvalRate' => $this->approvalRate(),
            'totalLeads' => InvestorLead::count(),
        ]);
    }

    public function exportApplications(): Response
    {
        $applications = InvestorApplication::with('user')->get();

        $csv = "ID,Investor Name,Email,Status,Submitted At,Decided At\n";
        foreach ($applications as $application) {
            $csv .= implode(',', [
                $application->id,
                '"'.str_replace('"', '', $application->user->name).'"',
                $application->user->email,
                $application->status,
                $application->submitted_at?->format('Y-m-d H:i') ?? '',
                $application->decided_at?->format('Y-m-d H:i') ?? '',
            ])."\n";
        }

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="investor-applications.csv"',
        ]);
    }

    private function approvalRate(): ?float
    {
        $decided = InvestorApplication::whereIn('status', ['approved', 'rejected'])->count();

        if ($decided === 0) {
            return null;
        }

        $approved = InvestorApplication::where('status', 'approved')->count();

        return round(($approved / $decided) * 100, 1);
    }
}
