@props(['number', 'title', 'description'])

<div class="group border-t border-white/10 py-8 first:border-t-0 lg:border-t-0 lg:border-l lg:py-0 lg:pl-8 lg:first:border-l-0 lg:first:pl-0">
    <span class="font-serif text-sm text-gold-500">{{ $number }}</span>
    <h3 class="mt-2 font-serif text-2xl font-semibold text-white">{{ $title }}</h3>
    <p class="mt-3 text-sm leading-relaxed text-white/60">{{ $description }}</p>
    <a href="{{ route('register-interest') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-gold-400 transition group-hover:gap-3">
        Express interest <span aria-hidden="true">&rarr;</span>
    </a>
</div>
