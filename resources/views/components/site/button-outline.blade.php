@props(['href', 'dark' => false])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 text-sm font-semibold transition ' . ($dark ? 'text-white hover:text-gold-400' : 'text-navy-900 hover:text-gold-600')]) }}>
    {{ $slot }}
</a>
