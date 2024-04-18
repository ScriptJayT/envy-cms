@props(['source' => ''])

<svg class='w-full h-full {{ $attributes->get("class") }}'>
    <use xlink:href="{{ asset('media/icons/'.$source) }}"></use>
</svg>