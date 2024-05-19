@props(['_to_route'=>'home', '_label'=>null])

@php

$ref = route($_to_route) ?? '';
$active = request()->routeIs($_to_route) ?? false;
$aria = $active ? 'page' : 'false';

$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-accent-400 text-sm font-medium leading-5 text-theme-400 focus:outline-none focus:border-accent-600 transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-theme-400 hover:border-gray-300 focus:outline-none focus:border-theme-600 transition duration-150 ease-in-out';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes, 'href' => $ref, 'aria-current' => $aria]) }}>
        {{ $slot }}
        {{ $_label }}
    </a>
</li>