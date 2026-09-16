@php
$statusLabels = [
    'draft' => 'Draft',
    'submitted' => 'Submitted',
    'under_review' => 'Under Review',
    'info_requested' => 'Information Requested',
    'approved' => 'Approved',
    'rejected' => 'Not Approved',
];
@endphp

<x-layouts.investor :title="'Dashboard'">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Application Status</p>
            <p class="mt-2 font-serif text-2xl font-semibold text-navy-900">{{ $statusLabels[$application->status ?? 'draft'] }}</p>
        </x-site.card>
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Profile</p>
            <p class="mt-2 font-serif text-2xl font-semibold text-navy-900">{{ $profile?->profile_completed_at ? 'Complete' : 'Incomplete' }}</p>
        </x-site.card>
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Preferences</p>
            <p class="mt-2 font-serif text-2xl font-semibold text-navy-900">{{ $preference?->risk_acknowledged ? 'Complete' : 'Incomplete' }}</p>
        </x-site.card>
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Documents</p>
            <p class="mt-2 font-serif text-2xl font-semibold text-navy-900">{{ $documentCount }}</p>
        </x-site.card>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <x-site.card title="Complete your onboarding" class="lg:col-span-2">
            <p class="mt-2 text-sm text-navy-900/60">Follow these steps to submit your investor application.</p>
            <div class="mt-6 space-y-4">
                <a href="{{ route('investor.profile.edit') }}" class="flex items-center justify-between rounded-sm border border-navy-900/10 px-4 py-3 hover:border-gold-500">
                    <span class="text-sm font-medium text-navy-900">1. Complete investor profile</span>
                    <span class="text-xs font-semibold {{ $profile?->profile_completed_at ? 'text-green-600' : 'text-gold-600' }}">
                        {{ $profile?->profile_completed_at ? 'Done' : 'Start' }}
                    </span>
                </a>
                <a href="{{ route('investor.preferences.edit') }}" class="flex items-center justify-between rounded-sm border border-navy-900/10 px-4 py-3 hover:border-gold-500">
                    <span class="text-sm font-medium text-navy-900">2. Set investment preferences</span>
                    <span class="text-xs font-semibold {{ $preference?->risk_acknowledged ? 'text-green-600' : 'text-gold-600' }}">
                        {{ $preference?->risk_acknowledged ? 'Done' : 'Start' }}
                    </span>
                </a>
                <a href="{{ route('investor.documents.index') }}" class="flex items-center justify-between rounded-sm border border-navy-900/10 px-4 py-3 hover:border-gold-500">
                    <span class="text-sm font-medium text-navy-900">3. Upload supporting documents</span>
                    <span class="text-xs font-semibold {{ $documentCount > 0 ? 'text-green-600' : 'text-gold-600' }}">
                        {{ $documentCount > 0 ? $documentCount.' uploaded' : 'Start' }}
                    </span>
                </a>
                <a href="{{ route('investor.application.edit') }}" class="flex items-center justify-between rounded-sm border border-navy-900/10 px-4 py-3 hover:border-gold-500">
                    <span class="text-sm font-medium text-navy-900">4. Review &amp; submit application</span>
                    <span class="text-xs font-semibold {{ ($application->status ?? 'draft') !== 'draft' ? 'text-green-600' : 'text-gold-600' }}">
                        {{ ($application->status ?? 'draft') !== 'draft' ? 'Submitted' : 'Start' }}
                    </span>
                </a>
            </div>
        </x-site.card>

        <x-site.card title="Need help?">
            <p class="mt-2 text-sm text-navy-900/60">Our team is available to guide you through onboarding.</p>
            <a href="{{ route('contact') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-gold-600">
                Contact ATUNKO <span aria-hidden="true">&rarr;</span>
            </a>
        </x-site.card>
    </div>
</x-layouts.investor>
