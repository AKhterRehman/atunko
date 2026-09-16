@php
$statusLabels = [
    'draft' => 'Draft',
    'submitted' => 'Submitted',
    'under_review' => 'Under Review',
    'info_requested' => 'Info Requested',
    'approved' => 'Approved',
    'rejected' => 'Rejected',
];
$sectorLabels = [
    'sports_education' => 'Sports & Education',
    'renewable_energy' => 'Renewable Energy',
    'real_estate' => 'Real Estate',
    'agriculture' => 'Agriculture',
    'fintech' => 'Fintech',
    'multiple' => 'Multiple sectors',
];
@endphp

<x-layouts.admin :title="'Reports'">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <x-site.card title="Application Status Breakdown" class="lg:col-span-1">
            <div class="mt-4 space-y-3 text-sm">
                @forelse ($statusBreakdown as $status => $count)
                    <div class="flex justify-between"><span class="text-navy-900/60">{{ $statusLabels[$status] ?? $status }}</span><span class="font-semibold">{{ $count }}</span></div>
                @empty
                    <p class="text-navy-900/50">No applications yet.</p>
                @endforelse
            </div>
        </x-site.card>

        <x-site.card title="Sector Interest (Leads)" class="lg:col-span-1">
            <div class="mt-4 space-y-3 text-sm">
                @forelse ($sectorInterest as $sector => $count)
                    <div class="flex justify-between"><span class="text-navy-900/60">{{ $sectorLabels[$sector] ?? $sector }}</span><span class="font-semibold">{{ $count }}</span></div>
                @empty
                    <p class="text-navy-900/50">No leads yet.</p>
                @endforelse
            </div>
            <p class="mt-4 text-xs text-navy-900/40">{{ $totalLeads }} total public registration leads.</p>
        </x-site.card>

        <x-site.card title="Approval Rate" class="lg:col-span-1">
            <p class="mt-4 font-serif text-4xl font-semibold text-navy-900">
                {{ $approvalRate !== null ? $approvalRate.'%' : '—' }}
            </p>
            <p class="mt-2 text-sm text-navy-900/50">Of decided applications (approved vs. rejected).</p>
        </x-site.card>
    </div>

    <x-site.card class="mt-6" title="Exports">
        <p class="mt-2 text-sm text-navy-900/60">Download investor pipeline data for offline reporting.</p>
        <a href="{{ route('admin.reports.export.applications') }}" class="mt-4 inline-flex items-center gap-2 rounded-sm border border-navy-900/15 px-4 py-2 text-sm font-semibold text-navy-900 hover:border-gold-500">
            Export applications (CSV)
        </a>
    </x-site.card>
</x-layouts.admin>
