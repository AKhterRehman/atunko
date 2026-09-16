<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\InvestorApplication;
use App\Models\User;
use App\Notifications\ApplicationStatusUpdated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationReviewController extends Controller
{
    public function assign(Request $request, InvestorApplication $application): RedirectResponse
    {
        $validated = $request->validate([
            'assigned_reviewer_id' => ['required', 'exists:users,id'],
        ]);

        $application->update([
            'assigned_reviewer_id' => $validated['assigned_reviewer_id'],
            'status' => $application->status === 'submitted' ? 'under_review' : $application->status,
        ]);

        AuditLog::record('application.assigned', $application, ['reviewer_id' => $validated['assigned_reviewer_id']]);

        return back()->with('status', 'Reviewer assigned.');
    }

    public function decide(Request $request, InvestorApplication $application): RedirectResponse
    {
        $validated = $request->validate([
            'decision' => ['required', 'in:under_review,info_requested,approved,rejected'],
            'reviewer_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $application->update([
            'status' => $validated['decision'],
            'reviewer_notes' => $validated['reviewer_notes'] ?? $application->reviewer_notes,
            'decided_at' => in_array($validated['decision'], ['approved', 'rejected']) ? now() : $application->decided_at,
        ]);

        AuditLog::record('application.'.$validated['decision'], $application, ['notes' => $validated['reviewer_notes'] ?? null]);

        $application->user->notify(new ApplicationStatusUpdated($application));

        return back()->with('status', 'Application updated.');
    }
}
