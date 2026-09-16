@php
$faqs = [
    ['q' => 'What is ATUNKO Partnership?', 'a' => 'ATUNKO is an investment partnership connecting disciplined global capital with commercially viable opportunities across five priority sectors in Africa, aiming to create measurable economic and social value alongside financial returns.'],
    ['q' => 'Who can register as an investor?', 'a' => 'Individual investors, family offices, institutions and strategic partners can register their interest. Final eligibility is confirmed during onboarding, subject to KYC/AML and jurisdictional requirements.'],
    ['q' => 'Does registering interest guarantee an investment allocation?', 'a' => 'No. Submitting the investor registration form does not constitute an offer, commitment or investment application. It initiates a confidential conversation with our team.'],
    ['q' => 'What sectors does ATUNKO invest in?', 'a' => 'Sports & Education, Renewable Energy, Real Estate, Agriculture and Fintech — five sectors selected for strong commercial fundamentals and complementary economic effects.'],
    ['q' => 'Are the target returns guaranteed?', 'a' => 'No. Target returns, the £10bn five-year mobilisation ambition and roadmap milestones are strategic planning objectives, not forecasts or guarantees. See our Risk Disclosure page.'],
    ['q' => 'How is investor data protected?', 'a' => 'Identity documents and sensitive data are stored in private, encrypted storage, never exposed via public URLs, and access is restricted by role and logged for audit purposes.'],
    ['q' => 'What happens after I register my interest?', 'a' => 'Our team reviews your enquiry and reaches out to arrange a confidential conversation. Eligible investors then proceed through KYC/AML, application and document review before onboarding.'],
    ['q' => 'Where is ATUNKO based?', 'a' => 'Bahrain is the proposed international hub, subject to legal, regulatory and licensing approvals, connecting relationships across the GCC, Europe, Africa, Asia and the Americas.'],
];
@endphp

<x-layouts.public :title="'FAQs'">

    <x-site.page-header eyebrow="Support" title="Frequently Asked Questions" />

    <section class="bg-cream-50 px-6 py-20 lg:px-8">
        <div class="mx-auto max-w-3xl divide-y divide-navy-900/10">
            @foreach ($faqs as $faq)
                <div x-data="{ open: false }" class="py-6">
                    <button type="button" @click="open = !open" class="flex w-full items-center justify-between gap-4 text-left">
                        <span class="font-serif text-lg font-semibold text-navy-900">{{ $faq['q'] }}</span>
                        <span class="shrink-0 text-gold-600" x-text="open ? '−' : '+'"></span>
                    </button>
                    <p x-show="open" x-cloak class="mt-3 text-sm leading-relaxed text-navy-900/70">
                        {{ $faq['a'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bg-navy-900 px-6 py-20 lg:px-8">
        <div class="mx-auto flex max-w-4xl flex-col items-center gap-6 text-center">
            <h2 class="font-serif text-3xl font-semibold text-white">Still have questions?</h2>
            <x-site.button-primary :href="route('contact')">
                Contact our team <span aria-hidden="true">&rarr;</span>
            </x-site.button-primary>
        </div>
    </section>

</x-layouts.public>
