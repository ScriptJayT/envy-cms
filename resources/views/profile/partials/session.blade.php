<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Current Session Details') }}
        </h2>
        <p class="mt-2 text-sm max-w-prose italic">Following data is read from the headers set by your browser. This may not be entirely correct as the browser may obfuscate some values for privacy reasons.</p>
    </header>

    <div class="mt-6 space-y-2">
        <div>
            Your current IP: {{ request()->ip() }}
        </div>
        <div>
            Your current Browser: {{ request()->header('sec-ch-ua') }}
        </div>
        <div>
            Your current OS: {{ request()->header('sec-ch-ua-platform') }}
        </div>
        <div>
            Your current User Agent: {{ request()->header('user-agent') }}
        </div>
    </div>
</section>