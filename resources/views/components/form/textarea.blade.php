@props(['label', 'name', 'required' => false, 'rows' => 4, 'value' => null])

<div>
    <label for="{{ $name }}" class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" @if($required) required @endif
              {{ $attributes->merge(['class' => 'mt-2 block w-full rounded-sm border border-navy-900/15 bg-white px-3 py-2.5 text-sm text-navy-900 focus:border-gold-500 focus:ring-gold-500']) }}>{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
