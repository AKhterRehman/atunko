@php
$statusLabels = ['new' => 'New', 'read' => 'Read', 'replied' => 'Replied'];
$statusColors = ['new' => 'text-gold-600', 'read' => 'text-navy-900', 'replied' => 'text-green-600'];
@endphp

<x-layouts.admin :title="'Contact Messages'">
    <x-site.card>
        <form method="GET" class="flex flex-wrap items-end gap-4">
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
            @forelse ($messages as $message)
                <div x-data="{ open: false }" class="py-4">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium text-navy-900">{{ $message->name }} &lt;{{ $message->email }}&gt;</p>
                            @if ($message->subject)
                                <p class="mt-1 text-sm font-medium text-navy-900/80">{{ $message->subject }}</p>
                            @endif
                            <p class="mt-2 text-sm text-navy-900/70">{{ $message->message }}</p>
                            <p class="mt-2 text-xs text-navy-900/40">Submitted {{ $message->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="flex shrink-0 items-center gap-3">
                            <span class="text-xs font-semibold {{ $statusColors[$message->status] }}">{{ $statusLabels[$message->status] }}</span>
                            <button type="button" @click="open = !open" class="rounded-sm border border-navy-900/15 px-3 py-1.5 text-xs font-semibold text-navy-900 hover:border-gold-500">
                                Update
                            </button>
                        </div>
                    </div>

                    <form x-show="open" x-cloak method="POST" action="{{ route('admin.messages.update', $message) }}" class="mt-4 flex items-end gap-3 border-t border-navy-900/10 pt-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Status</label>
                            <select name="status" class="mt-2 block w-40 rounded-sm border border-navy-900/15 bg-white px-2 py-1.5 text-sm">
                                @foreach ($statusLabels as $value => $label)
                                    <option value="{{ $value }}" @selected($message->status === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="rounded-sm bg-gold-500 px-4 py-1.5 text-xs font-semibold text-navy-950 hover:bg-gold-400">Save</button>
                    </form>
                </div>
            @empty
                <p class="py-6 text-center text-sm text-navy-900/50">No contact messages found.</p>
            @endforelse
        </div>
        <div class="mt-6">{{ $messages->links() }}</div>
    </x-site.card>
</x-layouts.admin>
