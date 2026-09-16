<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $application = $user->applications()->latest()->first();

        return view('investor.dashboard', [
            'application' => $application,
            'profile' => $user->investorProfile,
            'preference' => $user->investmentPreference,
            'documentCount' => $user->documents()->count(),
            'unreadNotifications' => $user->unreadNotifications()->count(),
        ]);
    }
}
