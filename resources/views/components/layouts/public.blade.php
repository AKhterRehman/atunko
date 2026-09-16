<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'ATUNKO' }} | Rewriting Destinies, Rebuilding Lives</title>
    <meta name="description" content="{{ $description ?? 'ATUNKO connects disciplined global capital with commercially viable opportunities that create measurable economic and social value across Africa.' }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-cream-50 font-sans text-navy-900 antialiased">
    <x-site.nav />

    <main>
        {{ $slot }}
    </main>

    <x-site.footer />
</body>
</html>
