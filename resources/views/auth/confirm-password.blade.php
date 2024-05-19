<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <x-form.text-field :value="__('Password')" type="password" name="password" required autocomplete="current-password">
            <x-form.error :messages="$errors->get('password')" class="mt-2" />
        </x-form.text-field>

        <div class="flex justify-end mt-4">
            <x-actions.primary>
                {{ __('Confirm') }}
            </x-actions.primary>
        </div>
    </form>
</x-guest-layout>