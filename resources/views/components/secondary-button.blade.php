<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center gap-2 rounded-sm border border-navy-900/15 px-6 py-3 text-sm font-semibold text-navy-900 transition hover:border-gold-500 hover:text-gold-600']) }}>
    {{ $slot }}
</button>
