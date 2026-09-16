<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvestorController extends Controller
{
    public function index(Request $request): View
    {
        $investors = User::where('role', 'investor')
            ->with(['investorProfile', 'applications' => fn ($q) => $q->latest()->limit(1)])
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search');
                $query->where(fn ($q) => $q->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%"));
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->whereHas('applications', fn ($q) => $q->where('status', $request->string('status')));
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.investors.index', [
            'investors' => $investors,
            'search' => $request->string('search'),
            'statusFilter' => $request->string('status'),
        ]);
    }

    public function show(User $investor): View
    {
        abort_unless($investor->role === 'investor', 404);

        $investor->load([
            'investorProfile',
            'investmentPreference',
            'documents.reviewedBy',
            'applications.assignedReviewer',
            'applications.kycChecks.checkedBy',
            'consents',
        ]);

        return view('admin.investors.show', [
            'investor' => $investor,
            'application' => $investor->applications->last(),
            'auditTrail' => \App\Models\AuditLog::where(function ($query) use ($investor) {
                $query->where('subject_type', User::class)->where('subject_id', $investor->id);
            })->orWhere(function ($query) use ($investor) {
                $query->where('subject_type', \App\Models\InvestorApplication::class)
                    ->whereIn('subject_id', $investor->applications->pluck('id'));
            })->latest()->limit(20)->get(),
        ]);
    }
}
