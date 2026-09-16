@props(['dark' => false])

<a href="{{ route('home') }}" class="flex items-center gap-3 group">
    <span class="flex h-11 w-11 shrink-0 rotate-45 items-center justify-center border border-gold-500/70 bg-navy-900">
        <span class="-rotate-45 font-serif text-sm font-semibold tracking-wide text-gold-400">AT</span>
    </span>
    <span class="font-serif text-lg font-semibold tracking-wide {{ $dark ? 'text-white' : 'text-navy-900' }}">ATUNKO</span>
</a>
