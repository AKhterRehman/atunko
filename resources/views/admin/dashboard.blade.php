<x-layouts.admin :title="'Dashboard'">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Total Investors</p>
            <p class="mt-2 font-serif text-3xl font-semibold text-navy-900">{{ $totalInvestors }}</p>
        </x-site.card>
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Awaiting Review</p>
            <p class="mt-2 font-serif text-3xl font-semibold text-navy-900">{{ $submittedCount + $underReviewCount }}</p>
        </x-site.card>
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Pending Documents</p>
            <p class="mt-2 font-serif text-3xl font-semibold text-navy-900">{{ $pendingDocuments }}</p>
        </x-site.card>
        <x-site.card>
            <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/40">Approved</p>
            <p class="mt-2 font-serif text-3xl font-semibold text-green-600">{{ $approvedCount }}</p>
        </x-site.card>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
        <x-site.card title="Application Pipeline" class="lg:col-span-1">
            <div class="mt-4 space-y-3 text-sm">
                <div class="flex justify-between"><span class="text-navy-900/60">Submitted</span><span class="font-semibold">{{ $submittedCount }}</span></div>
                <div class="flex justify-between"><span class="text-navy-900/60">Under Review</span><span class="font-semibold">{{ $underReviewCount }}</span></div>
                <div class="flex justify-between"><span class="text-navy-900/60">Info Requested</span><span class="font-semibold">{{ $infoRequestedCount }}</span></div>
                <div class="flex justify-between"><span class="text-navy-900/60">Approved</span><span class="font-semibold text-green-600">{{ $approvedCount }}</span></div>
                <div class="flex justify-between"><span class="text-navy-900/60">Rejected</span><span class="font-semibold text-red-600">{{ $rejectedCount }}</span></div>
            </div>
            <a href="{{ route('admin.investors.index') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-medium text-gold-600">
                View investor directory <span aria-hidden="true">&rarr;</span>
            </a>
        </x-site.card>

        <x-site.card title="Recent Activity" class="lg:col-span-2">
            <div class="mt-4 divide-y divide-navy-900/10">
                @forelse ($recentActivity as $log)
                    <div class="flex items-center justify-between gap-4 py-3 text-sm">
                        <div>
                            <span class="font-medium text-navy-900">{{ $log->actor?->name ?? 'System' }}</span>
                            <span class="text-navy-900/60">{{ str($log->action)->replace('.', ' ')->replace('_', ' ') }}</span>
                        </div>
                        <span class="shrink-0 text-xs text-navy-900/40">{{ $log->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <p class="py-3 text-sm text-navy-900/50">No activity yet.</p>
                @endforelse
            </div>
            <a href="{{ route('admin.audit-log.index') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-medium text-gold-600">
                View full audit log <span aria-hidden="true">&rarr;</span>
            </a>
        </x-site.card>
    </div>
</x-layouts.admin>
