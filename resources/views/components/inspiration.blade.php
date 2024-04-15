@php
$quotes = new App\Inspire();
$quote = $quotes->pick()->quote();
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

<div class='quotes ¦ self-center mx-4 text-white'>
    {!! $quote !!}
</div>