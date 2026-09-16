<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} | ATUNKO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-cream-100 font-sans text-navy-900 antialiased">
    <div class="flex min-h-screen" x-data="{ sidebarOpen: false }">

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed inset-y-0 left-0 z-40 w-72 transform bg-navy-950 transition-transform lg:static lg:translate-x-0">
            <div class="flex h-full flex-col">
                <div class="border-b border-white/10 px-6 py-6">
                    <x-site.logo dark />
                    <p class="mt-2 text-xs font-semibold uppercase tracking-widest text-gold-500">Staff Portal</p>
                </div>

                <nav class="flex-1 space-y-1 px-4 py-6">
                    @php
                        $navItems = [
                            ['label' => 'Dashboard', 'route' => 'admin.dashboard'],
                            ['label' => 'Investor Directory', 'route' => 'admin.investors.index'],
                            ['label' => 'Investor Leads', 'route' => 'admin.leads.index'],
                            ['label' => 'Contact Messages', 'route' => 'admin.messages.index'],
                            ['label' => 'Audit Log', 'route' => 'admin.audit-log.index'],
                            ['label' => 'Reports', 'route' => 'admin.reports.index'],
                        ];
                        if (auth()->user()->isAdmin()) {
                            $navItems[] = ['label' => 'Users & Roles', 'route' => 'admin.users.index'];
                            $navItems[] = ['label' => 'System Settings', 'route' => 'admin.settings.index'];
                        }
                    @endphp

                    @foreach ($navItems as $item)
                        <a href="{{ route($item['route']) }}"
                           class="flex items-center gap-3 rounded-sm px-3 py-2.5 text-sm font-medium transition
                               {{ request()->routeIs($item['route']) ? 'bg-white/10 text-gold-400' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="border-t border-white/10 p-4">
                    <p class="px-3 text-xs text-white/40">{{ auth()->user()->name }} &middot; {{ ucfirst(auth()->user()->role) }}</p>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-3 rounded-sm px-3 py-2.5 text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black/50 lg:hidden"></div>

        <div class="flex min-h-screen flex-1 flex-col">
            <header class="flex items-center justify-between border-b border-navy-900/10 bg-white px-6 py-4 lg:px-10">
                <button type="button" @click="sidebarOpen = true" class="text-navy-900 lg:hidden">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                    </svg>
                </button>
                <h1 class="font-serif text-xl font-semibold text-navy-900">{{ $title ?? 'Admin' }}</h1>
                <a href="{{ route('home') }}" class="text-sm text-navy-900/50 hover:text-gold-600">View site &rarr;</a>
            </header>

            <main class="flex-1 px-6 py-8 lg:px-10">
                @if (session('status'))
                    <div class="mb-6 rounded-sm border border-gold-500/40 bg-gold-500/10 px-4 py-3 text-sm text-gold-700">
                        {{ session('status') }}
                    </div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
