<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\KycCheck;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KycController extends Controller
{
    public function update(Request $request, KycCheck $kycCheck): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:passed,failed,exception'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $kycCheck->update([
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? $kycCheck->notes,
            'checked_by' => $request->user()->id,
            'checked_at' => now(),
        ]);

        AuditLog::record('kyc_check.'.$validated['status'], $kycCheck, ['check_type' => $kycCheck->check_type]);

        return back()->with('status', 'KYC check updated.');
    }
}
