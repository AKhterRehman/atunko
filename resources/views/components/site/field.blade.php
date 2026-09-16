@props(['label', 'name', 'type' => 'text', 'required' => false])

<div>
    <label for="{{ $name }}" class="text-xs font-semibold uppercase tracking-widest text-white/60">
        {{ $label }}
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}" @if($required) required @endif
           {{ $attributes->merge(['class' => 'mt-2 block w-full rounded-sm border-0 border-b border-white/20 bg-transparent px-0 py-2.5 text-white placeholder:text-white/30 focus:border-gold-500 focus:ring-0']) }}>
    @error($name)
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>
