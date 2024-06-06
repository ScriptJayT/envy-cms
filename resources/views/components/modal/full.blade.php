@props([
'_button_type' => 'default',
'_button_text' => 'Open Modal'
])

@php
$_id = "dialog-" . uniqid();
$_generate_btn = !isset($button);
@endphp

@if( $_generate_btn && $_button_type === "default" )
<button data-target="{{$_id}}" is="envy-button" envy-action="open-dialog">{{ $_button_text }}</button>

@elseif( $_generate_btn && $_button_type === "primary" )
<x-actions.primary data-target="{{$_id}}" is="envy-button" envy-action="open-dialog" _text="{{ $_button_text }}" />

@elseif( $_generate_btn && $_button_type === "ghost" )
<x-actions.ghost data-target="{{$_id}}" is="envy-button" envy-action="open-dialog" _text="{{ $_button_text }}" />

@elseif( $_generate_btn && $_button_type === "danger" )
<x-actions.danger data-target="{{$_id}}" is="envy-button" envy-action="open-dialog" _text="{{ $_button_text }}" />

@endif

@if( isset($button) )
{{ $button }}
@endif

<dialog data-id="{{ $_id }}" class="w-full h-full p-8 border border-accent-800 bg-theme-gradient-300">
    @if ( isset($header) )
    <x-modal._header>{{ $header }}</x-modal._header>
    @endif

    <x-modal._body>{{ $slot }}</x-modal._body>

    @if ( isset($footer) )
    <x-modal._footer>{{ $header }}</x-modal._footer>
    @endif
</dialog>