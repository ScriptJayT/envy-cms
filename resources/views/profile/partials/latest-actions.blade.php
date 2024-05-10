<section>
    <header class="text-gray-900 dark:text-gray-100">
        <h2 class="text-lg font-medium">
            {{ __('Your latest Actions') }}
        </h2>
    </header>

    <div class="mt-6 text-white space-y-2">

        @foreach ( $user->historyPoints as $_action )
        <li class="{{ $_action->type }} flex justify-between">
            {{ $_action->details }}
            <time class="italic">
                {{ $_action->created_at->diffForHumans() }}
            </time>
        </li>
        @endforeach

        @if( $user->historyPoints->count() < 1 ) <p>No actions registered yet</p> @endif
    </div>
</section>