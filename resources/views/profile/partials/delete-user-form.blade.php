<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-actions.danger x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-actions.danger>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 mb-6 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <x-form.text-field _label="{{ __('Password') }}" name="password" type="password">
                <x-form.error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </x-form.text-field>

            <div class="mt-6 flex justify-end">
                <x-actions.ghost x-on:click="$dispatch('close')"> {{ __('Cancel') }} </x-actions.ghost>
                <x-actions.danger type="submit" class="ms-3"> {{ __('Delete Account') }} </x-actions.danger>
            </div>
        </form>
    </x-modal>
</section>