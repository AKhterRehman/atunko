<x-layouts.investor :title="'Notifications'">
    <x-site.card title="Notifications" class="mx-auto max-w-3xl">
        @if ($notifications->isEmpty())
            <p class="mt-4 text-sm text-navy-900/60">You have no notifications yet.</p>
        @else
            <div class="mt-4 divide-y divide-navy-900/10">
                @foreach ($notifications as $notification)
                    <a href="{{ $notification->data['url'] ?? '#' }}" class="block py-4 hover:bg-navy-900/[0.02]">
                        <p class="text-sm font-medium text-navy-900">{{ $notification->data['title'] ?? 'Notification' }}</p>
                        <p class="mt-1 text-sm text-navy-900/60">{{ $notification->data['body'] ?? '' }}</p>
                        <p class="mt-1 text-xs text-navy-900/40">{{ $notification->created_at->diffForHumans() }}</p>
                    </a>
                @endforeach
            </div>
            <div class="mt-6">{{ $notifications->links() }}</div>
        @endif
    </x-site.card>
</x-layouts.investor>
