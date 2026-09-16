<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\InvestorLead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $leads = InvestorLead::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search');
                $query->where(fn ($q) => $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('business_email', 'like', "%{$search}%")
                    ->orWhere('organisation', 'like', "%{$search}%"));
            })
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->string('status')))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.leads.index', [
            'leads' => $leads,
            'search' => $request->string('search'),
            'statusFilter' => $request->string('status'),
        ]);
    }

    public function update(Request $request, InvestorLead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,contacted,qualified,rejected'],
            'reviewer_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $lead->update($validated);

        AuditLog::record('lead.'.$validated['status'], $lead);

        return back()->with('status', 'Lead updated.');
    }
}
