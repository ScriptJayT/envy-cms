@props([ '_filter' => null, '_count' => 1 ])

@php
$quote = $_filter ? (new App\Inspire())->have_tag($_filter)->pick($_count) : (new App\Inspire())->pick($_count);
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

<div data-filter='{{ $_filter }}' data-range='{{$_count}}/{{ $quote->length() }}' {!! $attributes->except('class') !!} class="quotes ¦ {{ $attributes->get('class') }}">
    {!! $quote->quote() !!}
</div>