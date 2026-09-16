@php
$typeLabels = [
    'identity_proof' => 'Identity Proof',
    'address_proof' => 'Address Proof',
    'source_of_funds' => 'Source of Funds',
    'company_registration' => 'Company Registration',
    'other' => 'Other',
];
$statusColors = [
    'pending' => 'text-gold-600',
    'verified' => 'text-green-600',
    'rejected' => 'text-red-600',
];
@endphp

<x-layouts.investor :title="'Documents'">
    <div class="mx-auto max-w-3xl space-y-8">
        <x-site.card title="Upload Document">
            <p class="mt-2 text-sm text-navy-900/60">
                Accepted formats: PDF, JPG, PNG. Maximum size 10MB. Files are stored privately and reviewed by our compliance team.
            </p>
            <form method="POST" action="{{ route('investor.documents.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf
                <x-form.select label="Document Type" name="document_type" required :options="$typeLabels" />
                <div>
                    <label for="file" class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">File</label>
                    <input type="file" name="file" id="file" required
                           class="mt-2 block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm text-navy-900 focus:border-gold-500 focus:ring-gold-500">
                    @error('file') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="rounded-sm bg-gold-500 px-6 py-3 text-sm font-semibold text-navy-950 transition hover:bg-gold-400">
                    Upload document
                </button>
            </form>
        </x-site.card>

        <x-site.card title="Your Documents">
            @if ($documents->isEmpty())
                <p class="mt-4 text-sm text-navy-900/60">No documents uploaded yet.</p>
            @else
                <div class="mt-4 divide-y divide-navy-900/10">
                    @foreach ($documents as $document)
                        <div class="flex items-center justify-between gap-4 py-4">
                            <div>
                                <p class="text-sm font-medium text-navy-900">{{ $document->original_name }}</p>
                                <p class="text-xs text-navy-900/50">
                                    {{ $typeLabels[$document->document_type] }} &bull;
                                    {{ number_format($document->size_bytes / 1024, 0) }} KB &bull;
                                    <span class="font-semibold {{ $statusColors[$document->status] }}">{{ ucfirst($document->status) }}</span>
                                </p>
                            </div>
                            <div class="flex shrink-0 items-center gap-4">
                                <a href="{{ route('investor.documents.download', $document) }}" class="text-xs font-semibold text-gold-600">Download</a>
                                <form method="POST" action="{{ route('investor.documents.destroy', $document) }}" onsubmit="return confirm('Remove this document?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold text-red-600">Remove</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </x-site.card>
    </div>
</x-layouts.investor>
