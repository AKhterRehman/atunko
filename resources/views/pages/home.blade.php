<x-layouts.public :title="'Home'">

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-navy-900">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-navy-900 to-navy-700 opacity-90"></div>
        <div class="relative mx-auto max-w-7xl px-6 py-28 lg:px-8 lg:py-36">
            <x-site.eyebrow dark>Africa &bull; Bahrain &bull; Global Capital</x-site.eyebrow>
            <h1 class="mt-6 max-w-3xl font-serif text-5xl font-semibold leading-tight text-white sm:text-6xl">
                Rewriting Destinies.
                <span class="block italic text-gold-400">Rebuilding Lives.</span>
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-white/70">
                A new investment partnership connecting disciplined global capital with commercially
                viable opportunities that can create measurable economic and social value across Africa.
            </p>
            <div class="mt-10 flex flex-wrap items-center gap-6">
                <x-site.button-primary :href="route('register-interest')">
                    Request investor access <span aria-hidden="true">&rarr;</span>
                </x-site.button-primary>
                <x-site.button-outline :href="route('how-it-works')" dark>
                    Explore our thesis <span aria-hidden="true">&rarr;</span>
                </x-site.button-outline>
            </div>

            <div class="mt-20 grid grid-cols-2 gap-8 border-t border-white/10 pt-10 sm:grid-cols-4">
                <x-site.stat value="£10bn" label="5-year mobilisation ambition" dark />
                <x-site.stat value="Up to 12%" label="target annual return objective*" dark />
                <x-site.stat value="5" label="priority investment sectors" dark />
                <x-site.stat value="Bahrain" label="proposed international hub" dark />
            </div>
        </div>
    </section>

    {{-- Purpose before capital --}}
    <section class="bg-cream-50 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <x-site.eyebrow>Purpose Before Capital</x-site.eyebrow>
            <h2 class="mt-4 font-serif text-4xl font-semibold leading-tight text-navy-900 sm:text-5xl">
                Capital can do more than generate returns.
            </h2>
            <p class="mt-8 text-lg leading-relaxed text-navy-900/70">
                It can create jobs, strengthen communities, expand access to opportunity and build the
                infrastructure future generations inherit.
            </p>
            <p class="mt-4 text-lg leading-relaxed text-navy-900/70">
                ATUNKO brings together investors, family offices, institutions and strategic partners who
                want financial performance and visible impact to move in the same direction.
            </p>
        </div>
    </section>

    {{-- Sectors --}}
    <section class="bg-navy-900 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.eyebrow dark>Investment Opportunities</x-site.eyebrow>
            <h2 class="mt-4 max-w-2xl font-serif text-4xl font-semibold text-white sm:text-5xl">
                Five sectors. One connected future.
            </h2>
            <p class="mt-6 max-w-2xl text-white/60">
                Our diversified thesis targets sectors with strong commercial fundamentals and
                complementary economic effects.
            </p>

            <div class="mt-14 grid grid-cols-1 gap-x-8 lg:grid-cols-5">
                <x-site.sector-card number="01" title="Sports &amp; Education"
                    description="The John Chamberlain Sports Institute: developing elite talent, education and human capital." />
                <x-site.sector-card number="02" title="Renewable Energy"
                    description="Utility-scale solar and clean generation powering businesses, communities and resilient growth." />
                <x-site.sector-card number="03" title="Real Estate"
                    description="Purposeful urban development, hospitality and mixed-use assets built around genuine demand." />
                <x-site.sector-card number="04" title="Agriculture"
                    description="Commercial farming, processing, cold-chain infrastructure and export-oriented value chains." />
                <x-site.sector-card number="05" title="Fintech"
                    description="Digital financial services widening access to payments, credit and commercial opportunity." />
            </div>
        </div>
    </section>

    {{-- Disciplined platform --}}
    <section class="bg-cream-50 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.eyebrow>A Disciplined Platform</x-site.eyebrow>
            <h2 class="mt-4 max-w-3xl font-serif text-4xl font-semibold leading-tight text-navy-900 sm:text-5xl">
                Originate with insight. Structure with rigour. Scale with purpose.
            </h2>
            <p class="mt-6 max-w-2xl text-navy-900/70">
                ATUNKO is designed to originate opportunities, structure investable vehicles, mobilise
                capital, oversee deployment, monitor performance and scale or exit responsibly.
            </p>

            <div class="mt-16">
                <p class="text-sm font-semibold uppercase tracking-widest text-navy-900/50">
                    Five-year capital roadmap &mdash; &pound;10bn
                </p>
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-5">
                    @foreach ([
                        ['year' => '2027', 'amount' => '&pound;0.5bn', 'label' => 'Founding investors &amp; flagship vehicles'],
                        ['year' => '2028', 'amount' => '&pound;1.5bn', 'label' => 'Scale proven sector platforms'],
                        ['year' => '2029', 'amount' => '&pound;2.0bn', 'label' => 'Institutional co-investment'],
                        ['year' => '2030', 'amount' => '&pound;2.5bn', 'label' => 'Sovereign, pension &amp; insurance capital'],
                        ['year' => '2031', 'amount' => '&pound;3.5bn', 'label' => 'Global scale, repeat vehicles &amp; exits'],
                    ] as $milestone)
                        <div class="border-t-2 border-gold-500 pt-4">
                            <p class="font-serif text-lg font-semibold text-navy-900">{{ $milestone['year'] }}</p>
                            <p class="mt-1 font-serif text-2xl font-semibold text-gold-600">{!! $milestone['amount'] !!}</p>
                            <p class="mt-2 text-xs leading-relaxed text-navy-900/60">{!! $milestone['label'] !!}</p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-8 text-xs text-navy-900/40">Strategic mobilisation objective; not a forecast or guarantee.</p>
            </div>
        </div>
    </section>

    {{-- Trust by design --}}
    <section class="bg-navy-900 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <x-site.eyebrow dark>Trust By Design</x-site.eyebrow>
            <h2 class="mt-4 max-w-2xl font-serif text-4xl font-semibold text-white sm:text-5xl">
                Governance is not an afterthought.
            </h2>
            <p class="mt-6 max-w-2xl text-white/60">
                Every opportunity is intended to pass through defined investment, compliance and
                reporting controls before capital is committed.
            </p>

            <div class="mt-14 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Independent oversight', 'description' => 'Investment committee discipline and defined decision rights.'],
                    ['title' => 'Institutional diligence', 'description' => 'Commercial, legal, technical, ESG and impact review.'],
                    ['title' => 'Transparent reporting', 'description' => 'Performance, risk and impact visibility for partners.'],
                    ['title' => 'Responsible compliance', 'description' => 'Investor eligibility, KYC/AML and source-of-funds controls.'],
                ] as $pillar)
                    <div class="border-t border-white/10 pt-6">
                        <h3 class="font-serif text-lg font-semibold text-white">{{ $pillar['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-white/60">{{ $pillar['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-cream-50 px-6 py-24 lg:px-8">
        <div class="mx-auto flex max-w-4xl flex-col items-center gap-6 text-center">
            <x-site.eyebrow>Private Investor Access</x-site.eyebrow>
            <h2 class="font-serif text-4xl font-semibold text-navy-900 sm:text-5xl">Build wealth with purpose.</h2>
            <p class="max-w-2xl text-navy-900/70">
                Tell us about your investment interests. Our team will review your enquiry and contact
                you to arrange a confidential conversation.
            </p>
            <x-site.button-primary :href="route('register-interest')">
                Investor registration <span aria-hidden="true">&rarr;</span>
            </x-site.button-primary>
        </div>
    </section>

</x-layouts.public>
