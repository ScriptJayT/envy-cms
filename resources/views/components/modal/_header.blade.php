@props(['_button' => true])

<header class="flex justify-between mb-8">
    <div class="text-xl">{{ $slot }}</div>

    @if($_button)
    <button is="envy-button" envy-action="close-dialog">Close</button>
    @endif
</header>