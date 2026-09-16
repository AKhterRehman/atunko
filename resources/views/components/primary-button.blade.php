<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center gap-2 rounded-sm bg-gold-500 px-6 py-3 text-sm font-semibold text-navy-950 transition hover:bg-gold-400']) }}>
    {{ $slot }}
</button>
