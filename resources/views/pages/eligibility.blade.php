<x-layouts.public :title="'Investor Eligibility'">

    <x-site.page-header eyebrow="Legal" title="Investor Eligibility"
        description="Access to ATUNKO investment opportunities is subject to eligibility, verification and compliance requirements." />

    <section class="bg-cream-50 px-6 py-20 lg:px-8">
        <div class="mx-auto max-w-3xl space-y-8 text-navy-900/80">
            <div class="rounded-sm border border-gold-500/30 bg-gold-500/10 px-5 py-4 text-sm text-navy-900/70">
                Placeholder text. Final eligibility, KYC/AML and investor-acceptance criteria must be
                confirmed by legal and compliance counsel for each jurisdiction before production use.
            </div>

            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">Who can register interest</h2>
                <p class="mt-3 leading-relaxed">
                    Individual investors, family offices, institutions and strategic partners may
                    register their interest. Registering interest does not guarantee eligibility to
                    invest.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">Verification requirements</h2>
                <p class="mt-3 leading-relaxed">
                    Before any investment can proceed, investors must complete identity verification,
                    sanctions and PEP screening, source-of-funds checks and, for entities, beneficial
                    ownership verification.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">Jurisdictional restrictions</h2>
                <p class="mt-3 leading-relaxed">
                    ATUNKO may be unable to accept investors from certain jurisdictions due to
                    regulatory, sanctions or licensing restrictions. Eligibility is confirmed on a
                    case-by-case basis during onboarding.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">Right to decline</h2>
                <p class="mt-3 leading-relaxed">
                    ATUNKO reserves the right to decline any registration, application or investor
                    relationship at its sole discretion, including where compliance requirements cannot
                    be satisfied.
                </p>
            </div>

            <x-site.button-primary :href="route('register-interest')">
                Register your interest <span aria-hidden="true">&rarr;</span>
            </x-site.button-primary>
        </div>
    </section>

</x-layouts.public>
