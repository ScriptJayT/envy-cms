@props(['_icon'=>false, '_label'=>false, '_action'=>false ])

@php
$fieldtype = $attributes->get('type') ?? 'text';
$id = $fieldtype.'-'.uniqid();
$readonly = $attributes->get('readonly') != null;
@endphp


<div>

    @if($_label)
    <label @class(["flex items-center gap-2 w-fit", "font-medium text-sm" , "text-gray-700 dark:text-gray-300" ]) for="{{ $id }}">
        <span class="block">
            {{ $_label }}
        </span>

        @if($after_label ?? null)
        {{ $after_label }}
        @endif
    </label>
    @endif

    <envy-formfield @class([ "block"=> !$_icon && !$_action, "flex"=> $_icon || $_action, "mt-1" => $_label, "border rounded-sm shadow-sm", "border-gray-300 dark:border-gray-700", "text-gray-700 dark:text-gray-300", "bg-white dark:bg-gray-900" => !$readonly, "bg-white-200 bg-gray-700" => $readonly ])>

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

        <input {{ $attributes }} id="{{ $id }}" type="text" @class([ 'block w-full py-2' , 'px-3'=> !$_icon, 'ps-2 pe-3' => $_icon, 'border-0 border-r' , 'border-gray-300 dark:border-gray-700' , 'italic'=>$readonly, 'bg-transparent' ])>

        @if($_action)
        <button type=button class="shrink-0 block px-3 py-2" envy-action="{{ $_action }}">

            @switch($_action)
            @case('copy')
            <icon title="{{ __('Copy this fields data to your clipboard') }}" class='block size-4'>
                <x-media.svg source='formfields.svg#clipboard' />
            </icon>
            @break
            @case('generate')
            <icon title="{{ __('Generate') }}" class='block size-4'>
                <x-media.svg source='formfields.svg#redo' />
            </icon>
            @break
            @case('toggle')
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