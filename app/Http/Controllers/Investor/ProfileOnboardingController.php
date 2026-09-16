<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileOnboardingController extends Controller
{
    public function edit(Request $request): View
    {
        return view('investor.profile', [
            'profile' => $request->user()->investorProfile,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'investor_type' => ['required', 'in:individual,company,family_office,institution'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'organisation_name' => ['nullable', 'string', 'max:255'],
            'registration_number' => ['nullable', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:20'],
            'nationality' => ['required', 'string', 'max:100'],
            'date_of_birth' => ['required', 'date', 'before:-18 years'],
            'source_of_funds' => ['required', 'string', 'max:255'],
            'eligibility_confirmed' => ['accepted'],
        ]);

        $profile = $request->user()->investorProfile;
        $profile->fill($validated);
        $profile->eligibility_confirmed = true;
        $profile->profile_completed_at = now();
        $profile->save();

        AuditLog::record('profile.updated', $profile);

        return redirect()->route('investor.profile.edit')->with('status', 'Your investor profile has been saved.');
    }
}
