<x-app-layout _banner="planets.png">
    <x-slot name="header">
        <p class="text-3xl tracking-wider font-thin text-white"> {{ __("Welcome back") }}, {{ auth()->user()->name }}! </p>
        <p class="text-lg font-light text-white"> {{ __("Let's see what we are doing today")}} </p>
        <ul class="flex gap-4 mt-6">
            <li>
                <x-primary-button>
                    New Block
                </x-primary-button>
            </li>
            <li>
                <x-secondary-button>
                    Visit the Site [G]
                </x-secondary-button>
            </li>
            <li>
                <x-secondary-button>
                    Take a Backup
                </x-secondary-button>
            </li>
        </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <ol class="md:columns-2 lg:columns-3 space-y-8 gap-16 pt-6">
                @foreach ( App\Models\HistoryPoint::with('user')->get() as $_h )
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

    <x-slot name="footer">
        footer
    </x-slot>
</x-app-layout>