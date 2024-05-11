@php
$_ip = request()->ip();
$_os = trim(request()->header('sec-ch-ua-platform'), '"');
$_b = explode(',', request()->header('sec-ch-ua'));
$_ua = str_replace(') ', ')<br>',request()->header('user-agent'));

$_r = fn($_v) => explode(';', str_replace('"', '', $_v));

[$_browser, $_browser_v] = $_r( $_b[0] );
[$_js_engine, $_js_engine_v] = $_r( $_b[1] );
[$_engine, $_engine_v] = $_r( $_b[2] );

@endphp


<section>
    <header>
        <h2 class="text-lg font-medium"> {{ __('Current Session Details') }} </h2>
        <p class="mt-2 text-sm max-w-prose italic">Following data is read from the headers set by your browser. This may not be entirely correct as the browser may obfuscate some values for privacy reasons.</p>
    </header>

    <div class="grid grid-cols-2 gap-y-4 gap-x-2 max-w-2xl mt-6">
        <key>Your current IP:</key>
        <value>{{ $_ip }}</value>
        <key>Your current Browser:</key>
        <value>{{ $_browser }} {{ $_browser_v }}</value>
        <key class="pl-6">Browser Engine:</key>
        <value class="pl-6">{{ $_engine }} {{ $_engine_v }}</value>
        <key class="pl-6">JavaScript Engine:</key>
        <value class="pl-6">{{ $_js_engine }} {{ $_js_engine_v }}</value>
        <key>Your current OS:</key>
        <value>{{ $_os }}</value>
        <key>Full User Agent:</key>
        <value>{!! $_ua !!}</value>
    </div>
</section>