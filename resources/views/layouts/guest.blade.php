<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ATUNKO') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-navy-900 font-sans text-navy-900 antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center px-6 py-12">
            <a href="{{ route('home') }}" class="mb-8">
                <x-site.logo dark />
            </a>

            <div class="w-full max-w-md rounded-sm border border-navy-900/10 bg-white p-8 shadow-lg">
                {{ $slot }}
            </div>

            <a href="{{ route('home') }}" class="mt-8 text-sm text-white/50 hover:text-gold-400">&larr; Back to website</a>
        </div>
    </body>
</html>
