<x-app-layout>
    <x-slot name="header">
        <h1>Test</h1>
    </x-slot>

    <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
        <ul class="space-y-4">
            @foreach ($teams as $_t )
            <li>
                <div class="flex justify-between gap-4">
                    <a href="teams/{{ $_t->id }}">
                        {{ $_t->name }}
                    </a>
                    <p>
                        Last Edit: <time title="{{ $_t->updated_at }}">{{ $_t->updated_at->diffForHumans() }}</time>
                    </p>
                </div>
                <p>
                    {{ $_t->description ?? 'No Description yet' }}
                </p>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>