@props(['value'])

<label {{ $attributes->merge(['class' => 'text-xs font-semibold uppercase tracking-widest text-navy-900/50']) }}>
    {{ $value ?? $slot }}
</label>
