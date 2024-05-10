<!DOCTYPE html>
<html class='pride dark' lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('media/favicon.svg') }}" type="image/svg">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-base antialiased | text-theme-200 bg-invert-0">
    <div class="flex flex-col sm:justify-center items-center pt-6">
        <div class="w-full max-w-md px-6" style="filter: drop-shadow(1px 1px 0 gray);">
            <x-media.gradient-logo />
        </div>

        <div class="w-full max-w-md mt-6 px-6 py-4 | border focus-within:border-accent-600 rounded-lg | bg-theme-gradient-300 shadow-lg">
            {{ $slot }}
        </div>

        <div class="w-full max-w-md px-6 mt-8">
            <x-inspiration _filter='pride' />
        </div>
    </div>
</body>

</html>