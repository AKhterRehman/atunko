<x-layouts.investor :title="'Account Settings'">
    <div class="mx-auto max-w-3xl space-y-8">
        <x-site.card>
            @include('profile.partials.update-profile-information-form')
        </x-site.card>

        <x-site.card>
            @include('profile.partials.update-password-form')
        </x-site.card>

        <x-site.card>
            @include('profile.partials.delete-user-form')
        </x-site.card>
    </div>
</x-layouts.investor>
