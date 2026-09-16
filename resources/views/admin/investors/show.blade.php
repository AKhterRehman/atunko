@php
$statusLabels = [
    'draft' => 'Draft',
    'submitted' => 'Submitted',
    'under_review' => 'Under Review',
    'info_requested' => 'Info Requested',
    'approved' => 'Approved',
    'rejected' => 'Rejected',
];
$documentTypeLabels = [
    'identity_proof' => 'Identity Proof',
    'address_proof' => 'Address Proof',
    'source_of_funds' => 'Source of Funds',
    'company_registration' => 'Company Registration',
    'other' => 'Other',
];
$kycTypeLabels = [
    'identity_verification' => 'Identity Verification',
    'sanctions_pep_screening' => 'Sanctions & PEP Screening',
    'address_verification' => 'Address Verification',
    'beneficial_owner_check' => 'Beneficial Owner Check',
];
$reviewers = \App\Models\User::whereIn('role', ['reviewer', 'compliance', 'admin'])->get();
$profile = $investor->investorProfile;
$preference = $investor->investmentPreference;
@endphp

<x-layouts.admin :title="$investor->name">
    <a href="{{ route('admin.investors.index') }}" class="text-sm text-navy-900/50 hover:text-gold-600">&larr; Back to directory</a>

    <div class="mt-4 grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Investor details --}}
        <x-site.card title="Investor Details" class="lg:col-span-1">
            <dl class="mt-4 space-y-3 text-sm">
                <div><dt class="text-navy-900/40">Name</dt><dd class="font-medium">{{ $investor->name }}</dd></div>
                <div><dt class="text-navy-900/40">Email</dt><dd>{{ $investor->email }}</dd></div>
                <div><dt class="text-navy-900/40">Type</dt><dd>{{ $profile?->investor_type ? ucfirst(str_replace('_', ' ', $profile->investor_type)) : '—' }}</dd></div>
                <div><dt class="text-navy-900/40">Organisation</dt><dd>{{ $profile?->organisation_name ?? '—' }}</dd></div>
                <div><dt class="text-navy-900/40">Nationality</dt><dd>{{ $profile?->nationality ?? '—' }}</dd></div>
                <div><dt class="text-navy-900/40">Address</dt><dd>{{ $profile ? implode(', ', array_filter([$profile->address_line_1, $profile->city, $profile->postal_code, $profile->country])) : '—' }}</dd></div>
                <div><dt class="text-navy-900/40">Source of Funds</dt><dd>{{ $profile?->source_of_funds ?? '—' }}</dd></div>
            </dl>

            <hr class="my-4 border-navy-900/10">

            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Investment Preferences</p>
            <dl class="mt-3 space-y-3 text-sm">
                <div><dt class="text-navy-900/40">Indicative Interest</dt><dd>{{ $preference?->indicative_interest ?? '—' }}</dd></div>
                <div><dt class="text-navy-900/40">Sectors</dt><dd>{{ $preference?->sectors_of_interest ? implode(', ', $preference->sectors_of_interest) : '—' }}</dd></div>
            </dl>
        </x-site.card>

        <div class="space-y-6 lg:col-span-2">
            {{-- Application review --}}
            <x-site.card title="Application Review">
                @if (! $application)
                    <p class="mt-4 text-sm text-navy-900/50">No application started yet.</p>
                @else
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-semibold text-navy-900">{{ $statusLabels[$application->status] }}</span>
                        <span class="text-xs text-navy-900/40">Submitted {{ $application->submitted_at?->format('d M Y, H:i') ?? '—' }}</span>
                    </div>

                    <form method="POST" action="{{ route('admin.applications.assign', $application) }}" class="mt-4 flex items-end gap-3">
                        @csrf
                        <div class="flex-1">
                            <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Assigned Reviewer</label>
                            <select name="assigned_reviewer_id" class="mt-2 block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-2 text-sm">
                                <option value="">Unassigned</option>
                                @foreach ($reviewers as $reviewer)
                                    <option value="{{ $reviewer->id }}" @selected($application->assigned_reviewer_id == $reviewer->id)>{{ $reviewer->name }} ({{ $reviewer->role }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="rounded-sm border border-navy-900/15 px-4 py-2 text-sm font-semibold text-navy-900 hover:border-gold-500">Assign</button>
                    </form>

                    <form method="POST" action="{{ route('admin.applications.decide', $application) }}" class="mt-4 space-y-3 border-t border-navy-900/10 pt-4">
                        @csrf
                        <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Reviewer Notes</label>
                        <textarea name="reviewer_notes" rows="3" class="block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm">{{ $application->reviewer_notes }}</textarea>

                        <div class="flex flex-wrap gap-2">
                            <button type="submit" name="decision" value="under_review" class="rounded-sm border border-navy-900/15 px-4 py-2 text-sm font-medium text-navy-900 hover:border-gold-500">Mark Under Review</button>
                            <button type="submit" name="decision" value="info_requested" class="rounded-sm border border-navy-900/15 px-4 py-2 text-sm font-medium text-navy-900 hover:border-gold-500">Request Info</button>
                            <button type="submit" name="decision" value="approved" class="rounded-sm bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-500">Approve</button>
                            <button type="submit" name="decision" value="rejected" class="rounded-sm bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500">Reject</button>
                        </div>
                    </form>
                @endif
            </x-site.card>

            {{-- KYC/AML review --}}
            <x-site.card title="KYC / AML Review">
                @if (! $application || $application->kycChecks->isEmpty())
                    <p class="mt-4 text-sm text-navy-900/50">No KYC checks initiated yet.</p>
                @else
                    <div class="mt-4 divide-y divide-navy-900/10">
                        @foreach ($application->kycChecks as $check)
                            <div class="flex items-center justify-between gap-4 py-3">
                                <div>
                                    <p class="text-sm font-medium text-navy-900">{{ $kycTypeLabels[$check->check_type] }}</p>
                                    <p class="text-xs text-navy-900/50">
                                        {{ ucfirst($check->status) }}
                                        @if ($check->checkedBy) &bull; by {{ $check->checkedBy->name }} @endif
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('admin.kyc-checks.update', $check) }}" class="flex items-center gap-2">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" name="status" value="passed" class="rounded-sm border border-green-600 px-3 py-1.5 text-xs font-semibold text-green-700 hover:bg-green-50">Pass</button>
                                    <button type="submit" name="status" value="failed" class="rounded-sm border border-red-600 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-50">Fail</button>
                                    <button type="submit" name="status" value="exception" class="rounded-sm border border-navy-900/20 px-3 py-1.5 text-xs font-semibold text-navy-900 hover:bg-navy-900/5">Exception</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </x-site.card>

            {{-- Document review --}}
            <x-site.card title="Document Review">
                @if ($investor->documents->isEmpty())
                    <p class="mt-4 text-sm text-navy-900/50">No documents uploaded yet.</p>
                @else
                    <div class="mt-4 divide-y divide-navy-900/10">
                        @foreach ($investor->documents as $document)
                            <div class="flex items-center justify-between gap-4 py-3">
                                <div>
                                    <p class="text-sm font-medium text-navy-900">{{ $document->original_name }}</p>
                                    <p class="text-xs text-navy-900/50">
                                        {{ $documentTypeLabels[$document->document_type] }} &bull;
                                        <span class="font-semibold">{{ ucfirst($document->status) }}</span>
                                        @if ($document->reviewedBy) &bull; by {{ $document->reviewedBy->name }} @endif
                                    </p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.documents.download', $document) }}" class="rounded-sm border border-navy-900/15 px-3 py-1.5 text-xs font-semibold text-navy-900 hover:border-gold-500">Download</a>
                                    <form method="POST" action="{{ route('admin.documents.update', $document) }}" class="flex items-center gap-2"
                                          onsubmit="if (this.status.value === 'rejected') { const reason = prompt('Rejection reason:'); if (!reason) return false; this.rejection_reason.value = reason; }">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status">
                                        <input type="hidden" name="rejection_reason">
                                        <button type="submit" onclick="this.form.status.value='verified'" class="rounded-sm border border-green-600 px-3 py-1.5 text-xs font-semibold text-green-700 hover:bg-green-50">Verify</button>
                                        <button type="submit" onclick="this.form.status.value='rejected'" class="rounded-sm border border-red-600 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-50">Reject</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </x-site.card>
        </div>
    </div>
</x-layouts.admin>
