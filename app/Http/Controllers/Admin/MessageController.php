<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(Request $request): View
    {
        $messages = ContactMessage::query()
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->string('status')))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.messages.index', [
            'messages' => $messages,
            'statusFilter' => $request->string('status'),
        ]);
    }

    public function update(Request $request, ContactMessage $message): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,replied'],
        ]);

        $message->update($validated);

        AuditLog::record('contact_message.'.$validated['status'], $message);

        return back()->with('status', 'Message updated.');
    }
}
