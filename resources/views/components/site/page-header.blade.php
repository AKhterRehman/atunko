@props(['eyebrow' => null, 'title', 'description' => null])

<section class="border-b border-white/10 bg-navy-900 px-6 py-20 lg:px-8">
    <div class="mx-auto max-w-4xl text-center">
        @if ($eyebrow)
            <x-site.eyebrow dark class="justify-center">{{ $eyebrow }}</x-site.eyebrow>
        @endif
        <h1 class="mt-4 font-serif text-4xl font-semibold text-white sm:text-5xl">{{ $title }}</h1>
        @if ($description)
            <p class="mt-6 text-lg leading-relaxed text-white/70">{{ $description }}</p>
        @endif
    </div>
</section>
