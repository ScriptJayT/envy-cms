@props(['source' => ''])

<svg class='w-full h-full'>
    <use xlink:href="{{ asset('media/icons/'.$source) }}"></use>
</svg>