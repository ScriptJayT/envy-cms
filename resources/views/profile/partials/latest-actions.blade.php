<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Your latest Actions') }}
        </h2>
    </header>

    <div class="mt-6 text-white">
        @foreach ( $user->historyPoints as $_action )
        <li class="{{ $_action->type }}">
            {{ $_action->details }}
            <time>
                {{ $_action->created_at->diffForHumans() }}
            </time>
        </li>
        @endforeach
    </div>
</section>