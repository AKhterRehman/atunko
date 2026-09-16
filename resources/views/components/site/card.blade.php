@props(['title' => null])

<div {{ $attributes->merge(['class' => 'rounded-sm border border-navy-900/10 bg-white p-6 lg:p-8']) }}>
    @if ($title)
        <h2 class="font-serif text-xl font-semibold text-navy-900">{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>
