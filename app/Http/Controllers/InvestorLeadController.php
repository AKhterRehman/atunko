<?php

namespace App\Http\Controllers;

use App\Models\InvestorLead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InvestorLeadController extends Controller
{
    public function create()
    {
        return view('pages.register-interest');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'business_email' => ['required', 'email', 'max:255'],
            'organisation' => ['nullable', 'string', 'max:255'],
            'investor_profile' => ['required', 'in:individual,family_office,institution,strategic_partner'],
            'indicative_interest' => ['required', 'in:100k_500k,500k_1m,1m_5m,5m_plus'],
            'sector_interest' => ['required', 'in:sports_education,renewable_energy,real_estate,agriculture,fintech,multiple'],
            'consent' => ['accepted'],
        ]);

        InvestorLead::create([
            ...$validated,
            'consent' => true,
            'ip_address' => $request->ip(),
        ]);

        return redirect()
            ->route('register-interest')
            ->with('status', 'Thank you. Your enquiry has been received and our team will be in touch to arrange a confidential conversation.');
    }
}
