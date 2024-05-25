<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Take a look at your account's profile.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 grid grid-cols-2 gap-6">
        @csrf
        @method('patch')

        <fieldset class="border border-gray-500 p-6 rounded-lg">
            <legend class="select-none text-gray-500 text-2xl">Theme</legend>
            <div class="space-y-6">
                <x-form.text-field _label="Main Theme (bg)" :value="$user->settings->firstWhere('name', 'prefered-theme')->value" />
                <x-form.text-field _label="Accent Theme (accent)" :value="$user->settings->firstWhere('name', 'accent-theme')->value" />
            </div>
        </fieldset>

        <fieldset class="border border-gray-500 p-6 rounded-lg">
            <legend class="select-none text-gray-500 text-2xl">Accessebility</legend>
            <div class="space-y-6">
                <x-form.text-field _label="Screen Reader" :value="$user->settings->firstWhere('name', 'screen-reader')?->value ?? 'none'" />
            </div>
        </fieldset>


        <fieldset></fieldset>

        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <x-actions.primary type="submit">{{ __('Save') }}</x-actions.primary>

            @if (session('status') === 'profile-updated')
            <p class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>