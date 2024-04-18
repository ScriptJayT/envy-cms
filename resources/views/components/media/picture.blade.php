@props([ '_placeholder' => null, '_source' => null, '_descr' => '' ])
@php( $svg_placeholder = str_contains($_placeholder, '.svg#') )

<picture {{ $attributes->except('class') }} class="block {{ $attributes->get('class') }}">
    @if($svg_placeholder)
    <img src="{{ $_source }}" onerror="this.errors=null; this.classList.add('hidden'); this.nextElementSibling.classList.remove('hidden')" class="w-full, h-full object-cover object-center" alt="{{$_descr}}">
    <x-media.svg class="hidden text-current" source="{{$_placeholder}}" />
    @else
    <source data-src="{{ $_source }}" srcset="{{ $_source }}">
    <img onerror="this.errors=null; this.previousElementSibling.srcset=this.src;" class="w-full, h-full object-cover object-center" src='{{ asset("media/placeholders/$_placeholder") }}' alt="{{$_descr}}">
    @endif
</picture>