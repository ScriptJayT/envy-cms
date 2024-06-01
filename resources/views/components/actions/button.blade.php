@props([
'_to'=>null,
'_text'=>null,
])

@php
$_is_link = $_to !== null;
$_is_external = $_to !== null && str_starts_with($_to, 'http');
$_rel = $_is_external ? 'rel="noopener noreferrer" target="_blank"' : '';
@endphp

@if ($_is_link)
<a {{ $attributes }} {{ $_rel }} href="{{ $_to }}">{{$slot}}</a>
@else
<button {{ $attributes->merge(['type'=>'button']) }}>
    {{ $_text }}
    {{ $slot }}
</button>
@endif