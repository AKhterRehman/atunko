<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\InvestmentPreference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PreferenceController extends Controller
{
    public function edit(Request $request): View
    {
        return view('investor.preferences', [
            'preference' => $request->user()->investmentPreference,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'indicative_interest' => ['required', 'in:100k_500k,500k_1m,1m_5m,5m_plus'],
            'sectors_of_interest' => ['required', 'array', 'min:1'],
            'sectors_of_interest.*' => ['in:sports_education,renewable_energy,real_estate,agriculture,fintech'],
            'projects_of_interest' => ['nullable', 'string', 'max:2000'],
            'risk_acknowledged' => ['accepted'],
        ]);

        $preference = InvestmentPreference::updateOrCreate(
            ['user_id' => $request->user()->id],
            [
                ...$validated,
                'risk_acknowledged' => true,
            ]
        );

        AuditLog::record('preferences.updated', $preference);

        return redirect()->route('investor.preferences.edit')->with('status', 'Your investment preferences have been saved.');
    }
}
