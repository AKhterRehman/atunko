<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\InvestorDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    private const MAX_SIZE_KB = 10240; // 10 MB

    public function index(Request $request): View
    {
        return view('investor.documents', [
            'documents' => $request->user()->documents()->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'document_type' => ['required', 'in:identity_proof,address_proof,source_of_funds,company_registration,other'],
            'file' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:'.self::MAX_SIZE_KB],
        ]);

        $user = $request->user();
        $file = $request->file('file');
        $path = $file->store("investor-documents/{$user->id}", 'local');

        $document = InvestorDocument::create([
            'user_id' => $user->id,
            'investor_application_id' => $user->applications()->latest()->value('id'),
            'document_type' => $validated['document_type'],
            'original_name' => $file->getClientOriginalName(),
            'disk_path' => $path,
            'mime_type' => $file->getClientMimeType(),
            'size_bytes' => $file->getSize(),
            'status' => 'pending',
        ]);

        AuditLog::record('document.uploaded', $document, ['document_type' => $document->document_type]);

        return redirect()->route('investor.documents.index')->with('status', 'Document uploaded successfully and is pending review.');
    }

    public function download(Request $request, InvestorDocument $document): StreamedResponse
    {
        abort_unless($document->user_id === $request->user()->id, 403);

        AuditLog::record('document.downloaded', $document);

        return Storage::disk('local')->download($document->disk_path, $document->original_name);
    }

    public function destroy(Request $request, InvestorDocument $document): RedirectResponse
    {
        abort_unless($document->user_id === $request->user()->id, 403);

        Storage::disk('local')->delete($document->disk_path);
        AuditLog::record('document.deleted', $document, ['document_type' => $document->document_type]);
        $document->delete();

        return redirect()->route('investor.documents.index')->with('status', 'Document removed.');
    }
}
