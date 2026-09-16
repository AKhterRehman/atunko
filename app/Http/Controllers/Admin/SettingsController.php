<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        return view('admin.settings.index', [
            'settings' => [
                'App name' => config('app.name'),
                'Environment' => config('app.environment', config('app.env')),
                'Mail driver' => config('mail.default'),
                'Filesystem disk (documents)' => 'local (private, non-public)',
                'Consent version' => \App\Http\Controllers\Investor\ApplicationController::CONSENT_VERSION,
                'KYC/AML process' => 'Custom manual review by staff — no third-party verification provider.',
            ],
        ]);
    }
}
