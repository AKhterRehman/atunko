<x-layouts.investor :title="'Investor Profile'">
    <x-site.card title="Investor Profile" class="mx-auto max-w-3xl">
        <p class="mt-2 text-sm text-navy-900/60">
            This information is used to verify your identity and eligibility. It will be reviewed by our compliance team.
        </p>

        <form method="POST" action="{{ route('investor.profile.update') }}" class="mt-8 space-y-6">
            @csrf
            @method('PUT')

            <x-form.select label="Investor Type" name="investor_type" required :value="$profile->investor_type" :options="[
                'individual' => 'Individual investor',
                'company' => 'Company',
                'family_office' => 'Family office',
                'institution' => 'Institution',
            ]" />

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-form.input label="First Name" name="first_name" required :value="$profile->first_name" />
                <x-form.input label="Last Name" name="last_name" required :value="$profile->last_name" />
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-form.input label="Organisation Name" name="organisation_name" :value="$profile->organisation_name" />
                <x-form.input label="Registration Number" name="registration_number" :value="$profile->registration_number" />
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <x-form.input label="Nationality" name="nationality" required :value="$profile->nationality" />
                <x-form.input label="Date of Birth" name="date_of_birth" type="date" required :value="$profile->date_of_birth" />
            </div>

            <x-form.input label="Address Line 1" name="address_line_1" required :value="$profile->address_line_1" />
            <x-form.input label="Address Line 2" name="address_line_2" :value="$profile->address_line_2" />

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                <x-form.input label="City" name="city" required :value="$profile->city" />
                <x-form.input label="Postal Code" name="postal_code" required :value="$profile->postal_code" />
                <x-form.input label="Country" name="country" required :value="$profile->country" />
            </div>

            <x-form.input label="Source of Funds" name="source_of_funds" required :value="$profile->source_of_funds" />

            <x-form.checkbox name="eligibility_confirmed" required>
                I confirm that the information provided is accurate and that I meet the eligibility criteria described in the
                <a href="{{ route('eligibility') }}" target="_blank" class="text-gold-600 underline">Investor Eligibility</a> policy.
            </x-form.checkbox>

            <button type="submit" class="rounded-sm bg-gold-500 px-6 py-3 text-sm font-semibold text-navy-950 transition hover:bg-gold-400">
                Save profile
            </button>
        </form>
    </x-site.card>
</x-layouts.investor>
