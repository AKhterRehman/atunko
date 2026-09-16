<x-layouts.public :title="'Investor Registration'">

    <x-site.page-header eyebrow="Private Investor Access" title="Build wealth with purpose."
        description="Tell us about your investment interests. Our team will review your enquiry and contact you to arrange a confidential conversation." />

    <section class="bg-navy-900 px-6 py-24 lg:px-8">
        <div class="mx-auto grid max-w-6xl gap-16 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <ul class="space-y-4 text-sm text-white/70">
                    <li class="flex gap-3"><span class="text-gold-500">&bull;</span> Curated project opportunities</li>
                    <li class="flex gap-3"><span class="text-gold-500">&bull;</span> Co-investment and partnership pathways</li>
                    <li class="flex gap-3"><span class="text-gold-500">&bull;</span> Performance and impact visibility</li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <div class="rounded-sm border border-white/10 bg-navy-800/60 p-8">
                    <div class="flex items-center justify-between">
                        <h2 class="font-serif text-2xl font-semibold text-white">Investor registration</h2>
                        <span class="text-xs font-semibold uppercase tracking-widest text-gold-500">Confidential</span>
                    </div>

                    @if (session('status'))
                        <div class="mt-6 rounded-sm border border-gold-500/40 bg-gold-500/10 px-4 py-3 text-sm text-gold-300">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register-interest.store') }}" class="mt-8 space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <x-site.field label="First Name" name="first_name" required />
                            <x-site.field label="Last Name" name="last_name" required />
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <x-site.field label="Business Email" name="business_email" type="email" required />
                            <x-site.field label="Organisation" name="organisation" />
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <x-site.select label="Investor Profile" name="investor_profile" required :options="[
                                'individual' => 'Individual investor',
                                'family_office' => 'Family office',
                                'institution' => 'Institution',
                                'strategic_partner' => 'Strategic partner',
                            ]" />
                            <x-site.select label="Indicative Interest" name="indicative_interest" required :options="[
                                '100k_500k' => '£100k–£500k',
                                '500k_1m' => '£500k–£1m',
                                '1m_5m' => '£1m–£5m',
                                '5m_plus' => '£5m+',
                            ]" />
                        </div>

                        <x-site.select label="Sector Interest" name="sector_interest" required :options="[
                            'sports_education' => 'Sports & Education',
                            'renewable_energy' => 'Renewable Energy',
                            'real_estate' => 'Real Estate',
                            'agriculture' => 'Agriculture',
                            'fintech' => 'Fintech',
                            'multiple' => 'Multiple sectors',
                        ]" />

                        <label class="flex items-start gap-3 text-sm text-white/70">
                            <input type="checkbox" name="consent" value="1" required
                                   class="mt-1 rounded-sm border-white/30 bg-transparent text-gold-500 focus:ring-gold-500">
                            I consent to ATUNKO contacting me about relevant investment opportunities.
                        </label>
                        @error('consent')
                            <p class="text-xs text-red-400">{{ $message }}</p>
                        @enderror

                        <button type="submit"
                                class="w-full rounded-sm bg-gold-500 px-6 py-3 text-sm font-semibold text-navy-950 transition hover:bg-gold-400">
                            Request a confidential briefing
                        </button>

                        <p class="text-xs text-white/40">
                            Submitting this form does not constitute an offer, commitment or investment application.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
