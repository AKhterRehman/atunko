@props(['dark' => false])

<p {{ $attributes->merge(['class' => 'text-xs font-semibold uppercase tracking-[0.2em] ' . ($dark ? 'text-gold-400' : 'text-gold-600')]) }}>
    {{ $slot }}
</p>
