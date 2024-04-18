@php
$quotes = new App\Inspire();
$quote = $quotes->pick();
@endphp

@once
<style>
    .quotes {

        & cite,
        & quote {
            display: block;
            width: 100%;
        }

        & cite {
            text-align: right;
        }
    }
</style>
@endonce

<div data-range='{{ $quote->length() }}' class='quotes ¦ self-center mx-4 text-white'>
    {!! $quote->quote() !!}
</div>