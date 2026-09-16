@php
$legal = [
    ['label' => 'Privacy Policy', 'route' => 'privacy'],
    ['label' => 'Terms of Use', 'route' => 'terms'],
    ['label' => 'Risk Disclosure', 'route' => 'risk-disclosure'],
    ['label' => 'Investor Eligibility', 'route' => 'eligibility'],
];
@endphp
<footer class="border-t border-white/10 bg-navy-950 text-white">
    <div class="mx-auto max-w-7xl px-6 py-14 lg:px-8">
        <div class="flex flex-col justify-between gap-10 lg:flex-row">
            <div class="max-w-sm">
                <x-site.logo dark />
                <p class="mt-4 text-sm text-white/60">Rewriting Destinies, Rebuilding Lives</p>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-gold-500">Company</p>
                    <ul class="mt-4 space-y-2 text-sm text-white/70">
                        <li><a href="{{ route('about') }}" class="hover:text-gold-400">About ATUNKO</a></li>
                        <li><a href="{{ route('sectors') }}" class="hover:text-gold-400">Investment Sectors</a></li>
                        <li><a href="{{ route('how-it-works') }}" class="hover:text-gold-400">How It Works</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-gold-400">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-gold-500">Legal</p>
                    <ul class="mt-4 space-y-2 text-sm text-white/70">
                        @foreach ($legal as $item)
                            <li><a href="{{ route($item['route']) }}" class="hover:text-gold-400">{{ $item['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-gold-500">Investors</p>
                    <ul class="mt-4 space-y-2 text-sm text-white/70">
                        <li><a href="{{ route('register-interest') }}" class="hover:text-gold-400">Request Access</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-gold-400">Investor Login</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-gold-400">FAQs</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-white/10 pt-8 text-xs leading-relaxed text-white/50">
            <p>&copy; {{ now()->year }} ATUNKO. All rights reserved.</p>
            <p class="mt-2">Investment opportunities involve risk. Target returns are objectives and are not guaranteed. Seek independent professional advice.</p>
        </div>
    </div>
</footer>
