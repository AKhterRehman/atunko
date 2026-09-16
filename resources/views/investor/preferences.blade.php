@php
$sectorOptions = [
    'sports_education' => 'Sports & Education',
    'renewable_energy' => 'Renewable Energy',
    'real_estate' => 'Real Estate',
    'agriculture' => 'Agriculture',
    'fintech' => 'Fintech',
];
$selectedSectors = old('sectors_of_interest', $preference->sectors_of_interest ?? []);
@endphp

<x-layouts.investor :title="'Investment Preferences'">
    <x-site.card title="Investment Preferences" class="mx-auto max-w-3xl">
        <p class="mt-2 text-sm text-navy-900/60">
            Tell us about the scale and sectors of investment you are interested in.
        </p>

        <form method="POST" action="{{ route('investor.preferences.update') }}" class="mt-8 space-y-6">
            @csrf
            @method('PUT')

            <x-form.select label="Indicative Investment Amount" name="indicative_interest" required
                :value="$preference->indicative_interest ?? null" :options="[
                '100k_500k' => '£100k–£500k',
                '500k_1m' => '£500k–£1m',
                '1m_5m' => '£1m–£5m',
                '5m_plus' => '£5m+',
            ]" />

            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-navy-900/50">Sectors of Interest</p>
                <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    @foreach ($sectorOptions as $value => $label)
                        <label class="flex items-center gap-3 rounded-sm border border-navy-900/15 px-4 py-3 text-sm text-navy-900">
                            <input type="checkbox" name="sectors_of_interest[]" value="{{ $value }}"
                                   @checked(in_array($value, $selectedSectors))
                                   class="rounded-sm border-navy-900/30 text-gold-600 focus:ring-gold-500">
                            {{ $label }}
                        </label>
                    @endforeach
                </div>
                @error('sectors_of_interest')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form.textarea label="Specific Projects of Interest (optional)" name="projects_of_interest" :value="$preference->projects_of_interest ?? null" />

            <x-form.checkbox name="risk_acknowledged" required>
                I acknowledge that investment involves risk and have reviewed the
                <a href="{{ route('risk-disclosure') }}" target="_blank" class="text-gold-600 underline">Risk Disclosure</a>.
            </x-form.checkbox>

            <button type="submit" class="rounded-sm bg-gold-500 px-6 py-3 text-sm font-semibold text-navy-950 transition hover:bg-gold-400">
                Save preferences
            </button>
        </form>
    </x-site.card>
</x-layouts.investor>
