@php
$sectors = [
    [
        'number' => '01',
        'title' => 'Sports & Education',
        'summary' => 'The John Chamberlain Sports Institute: developing elite talent, education and human capital.',
        'details' => 'A flagship institute combining elite athletic development with formal education pathways, creating long-term human capital value alongside commercial sponsorship, media and facility revenue.',
    ],
    [
        'number' => '02',
        'title' => 'Renewable Energy',
        'summary' => 'Utility-scale solar and clean generation powering businesses, communities and resilient growth.',
        'details' => 'Utility-scale solar and complementary clean generation assets, structured to deliver contracted power revenue while expanding reliable energy access for businesses and communities.',
    ],
    [
        'number' => '03',
        'title' => 'Real Estate',
        'summary' => 'Purposeful urban development, hospitality and mixed-use assets built around genuine demand.',
        'details' => 'Urban development, hospitality and mixed-use assets underwritten against genuine demand, targeting stable yield alongside measurable community and urban-renewal benefit.',
    ],
    [
        'number' => '04',
        'title' => 'Agriculture',
        'summary' => 'Commercial farming, processing, cold-chain infrastructure and export-oriented value chains.',
        'details' => 'Commercial farming, processing and cold-chain infrastructure that strengthen food security and unlock export-oriented value chains for smallholders and commercial operators alike.',
    ],
    [
        'number' => '05',
        'title' => 'Fintech',
        'summary' => 'Digital financial services widening access to payments, credit and commercial opportunity.',
        'details' => 'Digital financial services that widen access to payments, credit and commercial opportunity, supporting the growth of the underlying real economy across our other sectors.',
    ],
];
@endphp

<x-layouts.public :title="'Investment Sectors'">

    <x-site.page-header eyebrow="Investment Opportunities" title="Five sectors. One connected future."
        description="Our diversified thesis targets sectors with strong commercial fundamentals and complementary economic effects." />

    <section class="bg-navy-900 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-6xl space-y-16">
            @foreach ($sectors as $sector)
                <div class="grid grid-cols-1 gap-8 border-t border-white/10 pt-12 first:border-t-0 first:pt-0 lg:grid-cols-3">
                    <div>
                        <span class="font-serif text-sm text-gold-500">{{ $sector['number'] }}</span>
                        <h2 class="mt-2 font-serif text-3xl font-semibold text-white">{{ $sector['title'] }}</h2>
                    </div>
                    <div class="lg:col-span-2">
                        <p class="text-white/70 leading-relaxed">{{ $sector['details'] }}</p>
                        <a href="{{ route('register-interest') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-gold-400">
                            Express interest <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bg-cream-50 px-6 py-20 lg:px-8">
        <div class="mx-auto flex max-w-4xl flex-col items-center gap-6 text-center">
            <h2 class="font-serif text-3xl font-semibold text-navy-900">Ready to register your interest?</h2>
            <p class="max-w-xl text-navy-900/70">Tell us which sectors align with your investment objectives and our team will follow up directly.</p>
            <x-site.button-primary :href="route('register-interest')">
                Investor registration <span aria-hidden="true">&rarr;</span>
            </x-site.button-primary>
        </div>
    </section>

</x-layouts.public>
