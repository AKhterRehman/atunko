<x-layouts.investor :title="'Investor Application'">
    <x-site.card title="Review & Submit Application" class="mx-auto max-w-3xl">
        <p class="mt-2 text-sm text-navy-900/60">
            Confirm the steps below, then submit your application for review by our compliance team.
        </p>

        <div class="mt-8 space-y-4">
            <div class="flex items-center justify-between rounded-sm border border-navy-900/10 px-4 py-3">
                <span class="text-sm font-medium text-navy-900">Investor profile</span>
                @if ($profileComplete)
                    <span class="text-xs font-semibold text-green-600">Complete</span>
                @else
                    <a href="{{ route('investor.profile.edit') }}" class="text-xs font-semibold text-gold-600">Complete now &rarr;</a>
                @endif
            </div>
            <div class="flex items-center justify-between rounded-sm border border-navy-900/10 px-4 py-3">
                <span class="text-sm font-medium text-navy-900">Investment preferences</span>
                @if ($preferencesComplete)
                    <span class="text-xs font-semibold text-green-600">Complete</span>
                @else
                    <a href="{{ route('investor.preferences.edit') }}" class="text-xs font-semibold text-gold-600">Complete now &rarr;</a>
                @endif
            </div>
        </div>

        @if ($application?->status !== 'draft')
            <div class="mt-8 rounded-sm border border-gold-500/40 bg-gold-500/10 px-4 py-3 text-sm text-gold-700">
                Your application was submitted on {{ $application->submitted_at?->format('d M Y') }} and is currently
                <strong>{{ str($application->status)->replace('_', ' ')->title() }}</strong>.
                View full details on the <a href="{{ route('investor.status') }}" class="underline">Application Status</a> page.
            </div>
        @elseif ($profileComplete && $preferencesComplete)
            <form method="POST" action="{{ route('investor.application.submit') }}" class="mt-8 space-y-6 border-t border-navy-900/10 pt-8">
                @csrf

                <x-form.checkbox name="terms_consent" required>
                    I have read and agree to the <a href="{{ route('terms') }}" target="_blank" class="text-gold-600 underline">Terms of Use</a>.
                </x-form.checkbox>
                <x-form.checkbox name="privacy_consent" required>
                    I have read and agree to the <a href="{{ route('privacy') }}" target="_blank" class="text-gold-600 underline">Privacy Policy</a>.
                </x-form.checkbox>

                <button type="submit" class="rounded-sm bg-gold-500 px-6 py-3 text-sm font-semibold text-navy-950 transition hover:bg-gold-400">
                    Submit application
                </button>
            </form>
        @else
            <p class="mt-8 border-t border-navy-900/10 pt-8 text-sm text-navy-900/60">
                Please complete your investor profile and investment preferences above before submitting.
            </p>
        @endif
    </x-site.card>
</x-layouts.investor>
