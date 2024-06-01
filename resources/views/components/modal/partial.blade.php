@props([
'_button_type' => 'default',
'_button_text' => 'Open Modal'
])

@php
$_id = "popover-" . uniqid();
$_generate_btn = !isset($button);
@endphp

@if( $_generate_btn && $_button_type === "default" )
<button popovertarget="{{ $_id }}">{{ $_button_text }}</button>

@elseif( $_generate_btn && $_button_type === "primary" )
<x-actions.primary popovertarget="{{ $_id }}" _text="{{ $_button_text }}" />

@elseif( $_generate_btn && $_button_type === "ghost" )
<x-actions.ghost popovertarget="{{ $_id }}" _text="{{ $_button_text }}" />

@endif

@if( isset($button) )
{{ $button }}
@endif

<envy-modal popover id="{{ $_id }}" class="w-1/2 max-w-5xl p-8 border border-accent-800 bg-theme-gradient-300">
    @if ( isset($header) )
    <x-modal._header :_button="false">{{ $header }}</x-modal._header>
    @endif

    <x-modal._body>{{ $slot }}</x-modal._body>
</envy-modal>