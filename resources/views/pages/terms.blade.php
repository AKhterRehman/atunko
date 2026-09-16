<x-layouts.public :title="'Terms of Use'">

    <x-site.page-header eyebrow="Legal" title="Terms of Use" />

    <section class="bg-cream-50 px-6 py-20 lg:px-8">
        <div class="mx-auto max-w-3xl space-y-8 text-navy-900/80">
            <div class="rounded-sm border border-gold-500/30 bg-gold-500/10 px-5 py-4 text-sm text-navy-900/70">
                Placeholder legal text. Must be reviewed and finalised by qualified legal and compliance
                counsel for the relevant jurisdictions before production use.
            </div>

            <p class="text-sm text-navy-900/50">Last updated: {{ now()->format('d F Y') }}</p>

            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">1. Acceptance of terms</h2>
                <p class="mt-3 leading-relaxed">
                    By accessing this website or the investor portal, you agree to be bound by these
                    Terms of Use. If you do not agree, please do not use the site or portal.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">2. No offer or advice</h2>
                <p class="mt-3 leading-relaxed">
                    Content on this website is provided for general information only. Nothing on this
                    site constitutes an offer, solicitation, commitment or investment advice. Submitting
                    the investor registration form does not constitute an application for investment.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">3. Eligibility</h2>
                <p class="mt-3 leading-relaxed">
                    Access to the investor portal and any investment opportunity is subject to
                    eligibility criteria, KYC/AML checks and acceptance at ATUNKO's sole discretion. See
                    our <a href="{{ route('eligibility') }}" class="text-gold-600 underline">Investor Eligibility</a> page for details.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">4. Account responsibilities</h2>
                <p class="mt-3 leading-relaxed">
                    Investor portal users are responsible for maintaining the confidentiality of their
                    account credentials and for the accuracy of information submitted during onboarding.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">5. Limitation of liability</h2>
                <p class="mt-3 leading-relaxed">
                    ATUNKO accepts no liability for decisions made based on information contained on
                    this website. See our <a href="{{ route('risk-disclosure') }}" class="text-gold-600 underline">Risk Disclosure</a> page.
                </p>
            </div>
        </div>
    </section>

</x-layouts.public>
