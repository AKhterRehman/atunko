<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\InvestorDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentReviewController extends Controller
{
    public function download(Request $request, InvestorDocument $document): StreamedResponse
    {
        AuditLog::record('document.reviewer_downloaded', $document);

        return Storage::disk('local')->download($document->disk_path, $document->original_name);
    }

    public function update(Request $request, InvestorDocument $document): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:verified,rejected'],
            'rejection_reason' => ['required_if:status,rejected', 'nullable', 'string', 'max:500'],
        ]);

        $document->update([
            'status' => $validated['status'],
            'rejection_reason' => $validated['status'] === 'rejected' ? $validated['rejection_reason'] : null,
            'reviewed_at' => now(),
            'reviewed_by' => $request->user()->id,
        ]);

        AuditLog::record('document.'.$validated['status'], $document);

        return back()->with('status', 'Document review saved.');
    }
}
