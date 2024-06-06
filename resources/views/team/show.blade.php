<x-app-layout>
    <x-slot name="header">
        <h1>Team: {{ $team->name }}</h1>
        <p>
            {{ $team->description }}
        </p>
    </x-slot>

    <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">

        <h2>Linked Users:</h2>

        <ul>
            @foreach ( $team->users as $_u )
            <li>
                <name title="{{ $_u->handle }}">
                    {{ $_u->name }}
                </name>
                {{ $_u->profile_picture }}
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>