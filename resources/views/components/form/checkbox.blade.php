@props(['name', 'required' => false])

<label class="flex items-start gap-3 text-sm text-navy-900/70">
    <input type="checkbox" name="{{ $name }}" value="1" @if($required) required @endif
           class="mt-1 rounded-sm border-navy-900/30 text-gold-600 focus:ring-gold-500">
    <span>{{ $slot }}</span>
</label>
@error($name)
    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
@enderror
