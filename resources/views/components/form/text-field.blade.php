@props(['_icon'=>false, '_label'=>false, '_action'=>false ])

@php
$fieldtype = $attributes->get('type') ?? 'text';
$id = $fieldtype.'-'.uniqid();
$readonly = $attributes->get('readonly') != null;
@endphp


<div>

    @if($_label)
    <label @class(["flex items-center gap-2 w-fit", "font-medium text-sm" ]) for="{{ $id }}">
        <span class="block">
            {{ $_label }}
        </span>

        @if($after_label ?? null)
        {{ $after_label }}
        @endif
    </label>
    @endif

    <envy-formfield @class([ "block"=> !$_icon && !$_action, "flex"=> $_icon || $_action, "mt-1" => $_label, "transition border shadow-sm", "border-invert-400 hover:border-invert-600 ring-accent-600", "text-theme-400", "bg-invert-200" => !$readonly, "bg-invert-400" => $readonly ])>

        @if($_icon)
        <span class='cursor-help shrink-0 grid place-content-center ps-3 pe-1 py-2'>
            @switch($_icon)

            @case('protected')
            <icon title="{{ __('This data is encrypted in the Database') }}" class="block size-4">
                <x-media.svg source='formfields.svg#lock' />
            </icon>
            @break

            @case('unprotected')
            <icon title="{{ __('This data is NOT encrypted in the Database') }}" class="block size-4">
                <x-media.svg source='formfields.svg#unlock' />
            </icon>
            @break

            @default
            <icon class="block size-4"> {{ $_icon }} </icon>
            @endswitch
        </span>
        @endif

        <input {{ $attributes->except('class') }} id="{{ $id }}" type="text" @class([ 'block w-full py-2' , 'px-3'=> !$_icon, 'ps-2 pe-3' => $_icon, 'border-0',
        'border-r border-r-inherit' => $_action,
        'focus:ring-2 focus:ring-inherit', 'focus:outline-none focus:border-r-inherit',
        'italic'=>$readonly, 'bg-transparent' ])>

        @if($_action)
        <button is=envy-button envy-action="{{ $_action }}" type=button class="shrink-0 grid place-content-center px-3 py-2 outline-none focus:ring-2 focus:ring-inherit">

            @switch($_action)
            @case('copy-input')
            <icon title="{{ __('Copy this fields data to your clipboard') }}" class='block size-4'>
                <x-media.svg source='formfields.svg#clipboard' />
            </icon>
            @break
            @case('generate')
            <icon title="{{ __('Generate') }}" class='block size-4'>
                <x-media.svg source='formfields.svg#redo' />
            </icon>
            @break
            @case('toggle-input')
            <icon title="{{ __('Toggle') }}" class='block size-4'>
                <x-media.svg source='formfields.svg#eye' />
            </icon>
            @break

            @default
            <icon>BTN</icon>
            @endswitch
        </button>
        @endif
    </envy-formfield>

    {{ $slot }}
</div>