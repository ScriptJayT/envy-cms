<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @env('local')
    <fieldset class="space-y-2 mb-6 text-theme-400">
        <legend>Login as:</legend>
        <div class="flex justify-between gap-x-6">
            <x-login-link key="1" label="System" />
            <x-login-link key="2" label="Dev" />
            <x-login-link key="3" label="Admin" />
        </div>
        <small class="block">(these auto-logins will not be registered by History)</small>
    </fieldset>
    <hr>
    @endenv

    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
        @csrf

        <!-- Handle -->
        <x-form.text-field :_label="__('Login Handle')" :_value="old('handle')" name=handle required autofocus autocomplete=username>
            <x-input-error :messages="$errors->get('handle')" class="mt-2" />
        </x-form.text-field>

        <!-- Password -->
        <x-form.text-field :_label="__('Password')" :_value="old('password')" _action="toggle" type=password name=password required autocomplete=current-password>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </x-form.text-field>

        <!-- Submit -->
        <div class="flex items-center justify-end">
            <x-primary-button class="ms-3">{{ __('Log in') }}</x-primary-button>
        </div>

        @if (Route::has('password.request'))
        <div>
            <!-- Remember -->
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        </div>
        @endif
    </form>
</x-guest-layout>