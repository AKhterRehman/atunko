<x-layouts.admin :title="'Audit Log'">
    <x-site.card>
        <form method="GET" class="flex items-end gap-4">
            <div class="flex-1">
                <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Filter by Action</label>
                <input type="text" name="action" value="{{ $actionFilter }}" placeholder="e.g. application.approved"
                       class="mt-2 block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm focus:border-gold-500 focus:ring-gold-500">
            </div>
            <button type="submit" class="rounded-sm bg-gold-500 px-6 py-2.5 text-sm font-semibold text-navy-950 hover:bg-gold-400">Filter</button>
        </form>
    </x-site.card>

    <x-site.card class="mt-6">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-navy-900/10 text-xs uppercase tracking-widest text-navy-900/40">
                    <th class="py-3">When</th>
                    <th class="py-3">Actor</th>
                    <th class="py-3">Action</th>
                    <th class="py-3">Subject</th>
                    <th class="py-3">IP</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-navy-900/5">
                @forelse ($logs as $log)
                    <tr>
                        <td class="py-3 text-navy-900/60">{{ $log->created_at->format('d M Y, H:i') }}</td>
                        <td class="py-3 font-medium text-navy-900">{{ $log->actor?->name ?? 'System' }}</td>
                        <td class="py-3 text-navy-900/70">{{ $log->action }}</td>
                        <td class="py-3 text-navy-900/50">{{ class_basename($log->subject_type) }} #{{ $log->subject_id }}</td>
                        <td class="py-3 text-navy-900/40">{{ $log->ip_address ?? '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-6 text-center text-navy-900/50">No audit entries found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-6">{{ $logs->links() }}</div>
    </x-site.card>
</x-layouts.admin>
