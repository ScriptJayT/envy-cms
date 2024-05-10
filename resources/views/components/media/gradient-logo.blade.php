@php
$gr = new App\QueerGradients();
@endphp

<icon class="block w-full" style="{{$gr->get_style()}}" title="The Envy-logo in the colours of the {{ $gr->get_label() }}"></icon>