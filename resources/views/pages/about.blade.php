<x-layouts.public :title="'About ATUNKO'">

    <x-site.page-header eyebrow="About ATUNKO" title="A partnership built on purpose and discipline."
        description="ATUNKO Partnership exists to connect disciplined global capital with commercially viable opportunities that create measurable economic and social value across Africa." />

    <section class="bg-cream-50 px-6 py-24 lg:px-8">
        <div class="mx-auto grid max-w-6xl gap-16 lg:grid-cols-2">
            <div>
                <x-site.eyebrow>Our Story</x-site.eyebrow>
                <h2 class="mt-4 font-serif text-3xl font-semibold text-navy-900">
                    Rewriting destinies, rebuilding lives.
                </h2>
                <p class="mt-6 text-navy-900/70 leading-relaxed">
                    ATUNKO was founded on a simple conviction: capital deployed with discipline and
                    purpose can outperform financially while transforming the communities it touches.
                    We bring together investors, family offices, institutions and strategic partners
                    who want performance and impact to move together, not in competition with one
                    another.
                </p>
                <p class="mt-4 text-navy-900/70 leading-relaxed">
                    Our team originates opportunities across five priority sectors, structures them into
                    investable vehicles, and oversees deployment through to exit &mdash; underpinned by
                    institutional-grade governance at every stage.
                </p>
            </div>
            <div>
                <x-site.eyebrow>Proposed International Base</x-site.eyebrow>
                <h2 class="mt-4 font-serif text-3xl font-semibold text-navy-900">Bahrain</h2>
                <p class="mt-6 text-navy-900/70 leading-relaxed">
                    A strategic gateway connecting relationships across the GCC, Europe, Africa, Asia and
                    the Americas &mdash; subject to legal, regulatory and licensing approvals.
                </p>
                <div class="mt-8 grid grid-cols-2 gap-6">
                    <x-site.stat value="£10bn" label="5-year mobilisation ambition" />
                    <x-site.stat value="5" label="priority investment sectors" />
                </div>
            </div>
        </div>
    </section>

    <section class="bg-navy-900 px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <x-site.eyebrow dark>How We Work</x-site.eyebrow>
            <h2 class="mt-4 max-w-2xl font-serif text-3xl font-semibold text-white">
                Originate. Structure. Mobilise. Oversee. Scale.
            </h2>
            <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-5">
                @foreach (['Originate opportunities', 'Structure investable vehicles', 'Mobilise capital', 'Oversee deployment', 'Monitor, scale or exit'] as $i => $step)
                    <div class="border-t border-white/10 pt-6">
                        <span class="font-serif text-sm text-gold-500">0{{ $i + 1 }}</span>
                        <p class="mt-2 text-sm font-medium text-white">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-cream-50 px-6 py-20 lg:px-8">
        <div class="mx-auto flex max-w-4xl flex-col items-center gap-6 text-center">
            <h2 class="font-serif text-3xl font-semibold text-navy-900">Want to learn more about our thesis?</h2>
            <x-site.button-primary :href="route('sectors')">
                Explore investment sectors <span aria-hidden="true">&rarr;</span>
            </x-site.button-primary>
        </div>
    </section>

</x-layouts.public>
