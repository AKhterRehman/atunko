<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Consent;
use App\Notifications\ApplicationSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    const CONSENT_VERSION = '1.0';

    public function edit(Request $request): View
    {
        $user = $request->user();
        $application = $user->applications()->latest()->first();

        $profileComplete = (bool) $user->investorProfile?->profile_completed_at;
        $preferencesComplete = (bool) $user->investmentPreference?->risk_acknowledged;

        return view('investor.application', [
            'application' => $application,
            'profileComplete' => $profileComplete,
            'preferencesComplete' => $preferencesComplete,
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (! $user->investorProfile?->profile_completed_at || ! $user->investmentPreference?->risk_acknowledged) {
            return redirect()->route('investor.application.edit')
                ->with('status', 'Please complete your investor profile and investment preferences before submitting.');
        }

        $validated = $request->validate([
            'terms_consent' => ['accepted'],
            'privacy_consent' => ['accepted'],
        ]);

        $application = $user->applications()->latest()->first();
        $application->update([
            'terms_consent' => true,
            'privacy_consent' => true,
            'consent_version' => self::CONSENT_VERSION,
            'status' => 'submitted',
            'current_step' => 3,
            'submitted_at' => now(),
        ]);

        foreach (['terms_of_use', 'privacy_policy'] as $type) {
            Consent::create([
                'user_id' => $user->id,
                'type' => $type,
                'version' => self::CONSENT_VERSION,
                'accepted_at' => now(),
                'ip_address' => $request->ip(),
            ]);
        }

        foreach (['identity_verification', 'sanctions_pep_screening', 'address_verification', 'beneficial_owner_check'] as $checkType) {
            $application->kycChecks()->create(['check_type' => $checkType]);
        }

        AuditLog::record('application.submitted', $application);

        $user->notify(new ApplicationSubmitted());

        return redirect()->route('investor.status')->with('status', 'Your application has been submitted for review.');
    }

    public function status(Request $request): View
    {
        return view('investor.status', [
            'application' => $request->user()->applications()->latest()->first(),
        ]);
    }
}
