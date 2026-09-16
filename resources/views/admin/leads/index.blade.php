@php
$statusLabels = ['new' => 'New', 'contacted' => 'Contacted', 'qualified' => 'Qualified', 'rejected' => 'Rejected'];
$profileLabels = ['individual' => 'Individual', 'family_office' => 'Family office', 'institution' => 'Institution', 'strategic_partner' => 'Strategic partner'];
$interestLabels = ['100k_500k' => '£100k–£500k', '500k_1m' => '£500k–£1m', '1m_5m' => '£1m–£5m', '5m_plus' => '£5m+'];
$sectorLabels = [
    'sports_education' => 'Sports & Education', 'renewable_energy' => 'Renewable Energy', 'real_estate' => 'Real Estate',
    'agriculture' => 'Agriculture', 'fintech' => 'Fintech', 'multiple' => 'Multiple sectors',
];
$statusColors = ['new' => 'text-gold-600', 'contacted' => 'text-navy-900', 'qualified' => 'text-green-600', 'rejected' => 'text-red-600'];
@endphp

<x-layouts.admin :title="'Investor Leads'">
    <x-site.card>
        <form method="GET" class="flex flex-wrap items-end gap-4">
            <div class="flex-1">
                <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Search</label>
                <input type="text" name="search" value="{{ $search }}" placeholder="Name, email or organisation"
                       class="mt-2 block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm text-navy-900 focus:border-gold-500 focus:ring-gold-500">
            </div>
            <div>
                <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Status</label>
                <select name="status" class="mt-2 block w-48 rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm text-navy-900 focus:border-gold-500 focus:ring-gold-500">
                    <option value="">All</option>
                    @foreach ($statusLabels as $value => $label)
                        <option value="{{ $value }}" @selected($statusFilter == $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="rounded-sm bg-gold-500 px-6 py-2.5 text-sm font-semibold text-navy-950 hover:bg-gold-400">Filter</button>
        </form>
    </x-site.card>

    <x-site.card class="mt-6">
        <div class="divide-y divide-navy-900/10">
            @forelse ($leads as $lead)
                <div x-data="{ open: false }" class="py-4">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium text-navy-900">{{ $lead->first_name }} {{ $lead->last_name }}</p>
                            <p class="text-xs text-navy-900/50">
                                {{ $lead->business_email }}
                                @if ($lead->organisation) &bull; {{ $lead->organisation }} @endif
                                &bull; {{ $profileLabels[$lead->investor_profile] }}
                                &bull; {{ $interestLabels[$lead->indicative_interest] }}
                                &bull; {{ $sectorLabels[$lead->sector_interest] }}
                            </p>
                            <p class="mt-1 text-xs text-navy-900/40">Submitted {{ $lead->created_at->format('d M Y, H:i') }}</p>
                            @if ($lead->reviewer_notes)
                                <p class="mt-1 text-xs text-navy-900/60">Note: {{ $lead->reviewer_notes }}</p>
                            @endif
                        </div>
                        <div class="flex shrink-0 items-center gap-3">
                            <span class="text-xs font-semibold {{ $statusColors[$lead->status] }}">{{ $statusLabels[$lead->status] }}</span>
                            <button type="button" @click="open = !open" class="rounded-sm border border-navy-900/15 px-3 py-1.5 text-xs font-semibold text-navy-900 hover:border-gold-500">
                                Update
                            </button>
                        </div>
                    </div>

                    <form x-show="open" x-cloak method="POST" action="{{ route('admin.leads.update', $lead) }}" class="mt-4 flex flex-wrap items-end gap-3 border-t border-navy-900/10 pt-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Status</label>
                            <select name="status" class="mt-2 block w-40 rounded-sm border border-navy-900/15 bg-white px-2 py-1.5 text-sm">
                                @foreach ($statusLabels as $value => $label)
                                    <option value="{{ $value }}" @selected($lead->status === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-1">
                            <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Notes</label>
                            <input type="text" name="reviewer_notes" value="{{ $lead->reviewer_notes }}" placeholder="Internal note"
                                   class="mt-2 block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-1.5 text-sm">
                        </div>
                        <button type="submit" class="rounded-sm bg-gold-500 px-4 py-1.5 text-xs font-semibold text-navy-950 hover:bg-gold-400">Save</button>
                    </form>
                </div>
            @empty
                <p class="py-6 text-center text-sm text-navy-900/50">No investor leads found.</p>
            @endforelse
        </div>
        <div class="mt-6">{{ $leads->links() }}</div>
    </x-site.card>
</x-layouts.admin>
