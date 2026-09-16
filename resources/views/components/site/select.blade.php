@props(['label', 'name', 'options' => [], 'required' => false])

<div>
    <label for="{{ $name }}" class="text-xs font-semibold uppercase tracking-widest text-white/60">
        {{ $label }}
    </label>
    <select name="{{ $name }}" id="{{ $name }}" @if($required) required @endif
            {{ $attributes->merge(['class' => 'mt-2 block w-full rounded-sm border-0 border-b border-white/20 bg-navy-900 px-0 py-2.5 text-white focus:border-gold-500 focus:ring-0']) }}>
        <option value="" disabled {{ old($name) ? '' : 'selected' }}>Select</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" @selected(old($name) === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>
