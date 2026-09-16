<x-layouts.public :title="'Privacy Policy'">

    <x-site.page-header eyebrow="Legal" title="Privacy Policy" />

    <section class="bg-cream-50 px-6 py-20 lg:px-8">
        <div class="mx-auto max-w-3xl space-y-8 text-navy-900/80">
            <div class="rounded-sm border border-gold-500/30 bg-gold-500/10 px-5 py-4 text-sm text-navy-900/70">
                Placeholder legal text. Must be reviewed and finalised by qualified legal and compliance
                counsel for the relevant jurisdictions before production use.
            </div>

            <p class="text-sm text-navy-900/50">Last updated: {{ now()->format('d F Y') }}</p>

            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">1. Information we collect</h2>
                <p class="mt-3 leading-relaxed">
                    We collect information you provide directly, including name, contact details,
                    organisation, investor profile and indicative investment interest submitted through
                    our registration and contact forms, together with information generated when you use
                    our investor portal, such as onboarding, application and KYC/AML data.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">2. How we use information</h2>
                <p class="mt-3 leading-relaxed">
                    Information is used to respond to enquiries, assess investor eligibility, perform
                    KYC/AML and compliance checks, administer investor accounts, and communicate about
                    relevant opportunities where consent has been given.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">3. Data security</h2>
                <p class="mt-3 leading-relaxed">
                    Identity documents and sensitive investor data are stored in private, encrypted
                    storage and are never exposed through public URLs. Access is restricted by role and
                    logged for audit purposes.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">4. Data retention and your rights</h2>
                <p class="mt-3 leading-relaxed">
                    Data is retained for as long as necessary to meet regulatory, compliance and
                    contractual obligations. Subject to applicable law, you may request access,
                    correction or deletion of your personal data by contacting us.
                </p>
            </div>
            <div>
                <h2 class="font-serif text-2xl font-semibold text-navy-900">5. Contact</h2>
                <p class="mt-3 leading-relaxed">
                    Questions about this policy can be directed to
                    <a href="{{ route('contact') }}" class="text-gold-600 underline">our contact page</a>.
                </p>
            </div>
        </div>
    </section>

</x-layouts.public>
