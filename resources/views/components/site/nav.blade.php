@php
$links = [
    ['label' => 'About', 'route' => 'about'],
    ['label' => 'Investment Sectors', 'route' => 'sectors'],
    ['label' => 'How It Works', 'route' => 'how-it-works'],
    ['label' => 'FAQs', 'route' => 'faq'],
    ['label' => 'Contact', 'route' => 'contact'],
];
@endphp
<header x-data="{ mobileOpen: false }" class="sticky top-0 z-50 border-b border-white/10 bg-navy-900/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
        <x-site.logo dark />

        <nav class="hidden items-center gap-8 lg:flex">
            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}"
                   class="text-sm font-medium text-white/80 transition hover:text-gold-400 {{ request()->routeIs($link['route']) ? 'text-gold-400' : '' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-4 lg:flex">
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm font-medium text-white/80 hover:text-gold-400">My Account</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-white/80 hover:text-gold-400">Investor Login</a>
            @endauth
            <a href="{{ route('register-interest') }}"
               class="inline-flex items-center gap-2 rounded-sm bg-gold-500 px-5 py-2.5 text-sm font-semibold text-navy-950 transition hover:bg-gold-400">
                Request investor access
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <button type="button" @click="mobileOpen = !mobileOpen"
                class="text-white lg:hidden" aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
            </svg>
        </button>
    </div>

    <div x-show="mobileOpen" x-cloak class="border-t border-white/10 bg-navy-900 px-6 py-4 lg:hidden">
        <div class="flex flex-col gap-4">
            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}" class="text-sm font-medium text-white/80 hover:text-gold-400">{{ $link['label'] }}</a>
            @endforeach
            <hr class="border-white/10">
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm font-medium text-white/80 hover:text-gold-400">My Account</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-white/80 hover:text-gold-400">Investor Login</a>
            @endauth
            <a href="{{ route('register-interest') }}" class="inline-flex items-center justify-center gap-2 rounded-sm bg-gold-500 px-5 py-2.5 text-sm font-semibold text-navy-950">
                Request investor access
            </a>
        </div>
    </div>
</header>
