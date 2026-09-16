@props(['value', 'label', 'dark' => false])

<div>
    <p class="font-serif text-3xl font-semibold {{ $dark ? 'text-white' : 'text-navy-900' }} sm:text-4xl">{{ $value }}</p>
    <p class="mt-1 text-sm {{ $dark ? 'text-white/60' : 'text-navy-900/60' }}">{{ $label }}</p>
</div>
