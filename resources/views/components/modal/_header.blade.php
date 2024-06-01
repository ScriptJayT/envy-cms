@props(['_button' => true])

<header class="flex justify-between mb-8">
    <div class="text-xl">{{ $slot }}</div>

    @if($_button)
    <button>Close</button>
    @endif
</header>