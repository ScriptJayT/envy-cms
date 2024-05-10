<x-app-layout>
    <x-slot name="header">
        <p class="text-3xl"> {{ __("Welcome (back)") }}, {{ auth()->user()->name }}! </p>
        <p> {{ __("Let's see what we are doing today")}} </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ol class="md:columns-2 space-y-8 gap-16 pt-6">
                @foreach ( App\Models\HistoryPoint::all() as $_h )
                <li class="p-4 pt-0 border-b break-inside-avoid grid gap-4 grid-cols-3">
                    <span class="col-span-2">
                        {{ $_h->type }} message due to an action by:
                    </span>
                    <name class="text-purple-600" title="{{ $_h->user->handle }}">
                        {{ $_h->user->name }}
                    </name>
                    <span class="text-cyan-300 col-span-2">
                        {{ $_h->details }}
                    </span>
                    <time title="(Y-m-d) {{ $_h->created_at }}">
                        {{ $_h->created_at->diffForHumans() }}
                    </time>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
</x-app-layout>