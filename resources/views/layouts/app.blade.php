@props(['_banner' => null])

@php
$_header_height = $_banner ? 'min-h-96' : '';
@endphp

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
    <site class="block min-h-screen">

        <!-- Page Heading -->
        <header class="relative isolate | flex flex-col {{ $_header_height }} | border-b border-invert-400">
            @include('layouts.navigation')

            @if( $_banner ?? false )
            <img class="pointer-events-none select-none | absolute inset-0 -z-10 | w-full h-full object-cover object-top" src="{{ asset('media/banners/'.$_banner) }}" alt="" aria-hidden>
            @endif

            @if( isset($header) )
            <div class="w-full max-w-7xl m-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
            @endif
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @if (isset($footer))
        <footer class="border-t border-invert-400">
            <div class="max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $footer }}
            </div>
        </footer>
        @endif
    </site>
</body>

</html>