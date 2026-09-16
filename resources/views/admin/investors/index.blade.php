@php
$statusLabels = [
    'draft' => 'Draft',
    'submitted' => 'Submitted',
    'under_review' => 'Under Review',
    'info_requested' => 'Info Requested',
    'approved' => 'Approved',
    'rejected' => 'Rejected',
];
@endphp

<x-layouts.admin :title="'Investor Directory'">
    <x-site.card>
        <form method="GET" class="flex flex-wrap items-end gap-4">
            <div class="flex-1">
                <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Search</label>
                <input type="text" name="search" value="{{ $search }}" placeholder="Name or email"
                       class="mt-2 block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm text-navy-900 focus:border-gold-500 focus:ring-gold-500">
            </div>
            <div>
                <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Application Status</label>
                <select name="status" class="mt-2 block w-56 rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm text-navy-900 focus:border-gold-500 focus:ring-gold-500">
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
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-navy-900/10 text-xs uppercase tracking-widest text-navy-900/40">
                    <th class="py-3">Name</th>
                    <th class="py-3">Email</th>
                    <th class="py-3">Type</th>
                    <th class="py-3">Application Status</th>
                    <th class="py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-navy-900/5">
                @forelse ($investors as $investor)
                    @php $application = $investor->applications->last(); @endphp
                    <tr>
                        <td class="py-3 font-medium text-navy-900">{{ $investor->name }}</td>
                        <td class="py-3 text-navy-900/60">{{ $investor->email }}</td>
                        <td class="py-3 text-navy-900/60">{{ $investor->investorProfile?->investor_type ? ucfirst(str_replace('_', ' ', $investor->investorProfile->investor_type)) : '—' }}</td>
                        <td class="py-3">
                            <span class="text-xs font-semibold text-navy-900/70">{{ $statusLabels[$application?->status ?? 'draft'] }}</span>
                        </td>
                        <td class="py-3 text-right">
                            <a href="{{ route('admin.investors.show', $investor) }}" class="text-xs font-semibold text-gold-600">View &rarr;</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-6 text-center text-navy-900/50">No investors found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-6">{{ $investors->links() }}</div>
    </x-site.card>
</x-layouts.admin>
