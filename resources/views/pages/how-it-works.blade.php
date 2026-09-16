@php
$platformSteps = [
    ['title' => 'Originate', 'description' => 'We identify commercially viable opportunities across our five priority sectors with strong fundamentals and complementary impact.'],
    ['title' => 'Structure', 'description' => 'Each opportunity is structured into an investable vehicle with clear governance, rights and reporting obligations.'],
    ['title' => 'Mobilise', 'description' => 'Capital is raised from founding investors, family offices, institutions and strategic partners aligned to the thesis.'],
    ['title' => 'Oversee', 'description' => 'An investment committee and independent advisers oversee deployment against defined commercial and compliance criteria.'],
    ['title' => 'Monitor', 'description' => 'Performance, risk and impact are tracked continuously and reported transparently to investors.'],
    ['title' => 'Scale or exit', 'description' => 'Proven platforms are scaled with repeat capital, or exited responsibly once objectives are met.'],
];

$investorSteps = [
    ['title' => 'Register your interest', 'description' => 'Submit the confidential investor registration form with your profile and indicative interest.'],
    ['title' => 'Confidential conversation', 'description' => 'Our team reviews your enquiry and arranges a private discussion to understand your objectives.'],
    ['title' => 'Eligibility and KYC/AML', 'description' => 'Eligible investors proceed through identity verification, source-of-funds and compliance checks.'],
    ['title' => 'Application and documents', 'description' => 'Complete your investor application and securely upload the required supporting documents.'],
    ['title' => 'Review and approval', 'description' => 'Our compliance and investment teams review your application and communicate the outcome.'],
    ['title' => 'Onboarding complete', 'description' => 'Approved investors gain access to curated opportunities, reporting and the investor portal.'],
];
@endphp

<x-layouts.public :title="'How It Works'">

    <x-site.page-header eyebrow="A Disciplined Platform" title="Originate with insight. Structure with rigour. Scale with purpose."
        description="ATUNKO is designed to originate opportunities, structure investable vehicles, mobilise capital, oversee deployment, monitor performance and scale or exit responsibly." />

    <section class="bg-cream-50 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <x-site.eyebrow>The Platform</x-site.eyebrow>
            <h2 class="mt-4 font-serif text-3xl font-semibold text-navy-900">How capital moves through ATUNKO.</h2>
            <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($platformSteps as $i => $step)
                    <div class="border-t-2 border-gold-500 pt-5">
                        <span class="font-serif text-sm text-navy-900/50">0{{ $i + 1 }}</span>
                        <h3 class="mt-1 font-serif text-xl font-semibold text-navy-900">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-navy-900/70">{{ $step['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-navy-900 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <x-site.eyebrow dark>The Investor Journey</x-site.eyebrow>
            <h2 class="mt-4 font-serif text-3xl font-semibold text-white">From registration to onboarding.</h2>
            <div class="mt-12 space-y-6">
                @foreach ($investorSteps as $i => $step)
                    <div class="flex gap-6 border-t border-white/10 pt-6 first:border-t-0 first:pt-0">
                        <span class="w-10 shrink-0 font-serif text-lg text-gold-500">0{{ $i + 1 }}</span>
                        <div>
                            <h3 class="font-serif text-lg font-semibold text-white">{{ $step['title'] }}</h3>
                            <p class="mt-1 text-sm leading-relaxed text-white/60">{{ $step['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-cream-50 px-6 py-20 lg:px-8">
        <div class="mx-auto flex max-w-4xl flex-col items-center gap-6 text-center">
            <h2 class="font-serif text-3xl font-semibold text-navy-900">Ready to start the conversation?</h2>
            <x-site.button-primary :href="route('register-interest')">
                Request investor access <span aria-hidden="true">&rarr;</span>
            </x-site.button-primary>
        </div>
    </section>

</x-layouts.public>
