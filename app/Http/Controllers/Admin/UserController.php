<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(25),
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'role' => ['required', 'in:investor,reviewer,compliance,admin'],
            'account_status' => ['required', 'in:active,suspended,closed'],
        ]);

        abort_if($user->id === $request->user()->id && $validated['role'] !== 'admin', 422, 'You cannot remove your own admin role.');

        $user->update($validated);

        AuditLog::record('user.role_updated', $user, $validated);

        return back()->with('status', 'User updated.');
    }
}
