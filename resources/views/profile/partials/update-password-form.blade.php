<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-theme-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <x-form.text-field :_label="__('Current Password')" _action=toggle-input name=current_password type=password autocomplete="current-password">
            <x-form.error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </x-form.text-field>

        <x-form.text-field :_label="__('New Password')" _action=toggle-input name=password type=password autocomplete="new-password">
            <x-form.error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </x-form.text-field>

        <x-form.text-field :_label="__('Confirm Password')" _action=toggle-input name=password_confirmation type=password autocomplete="new-password">
            <x-form.error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </x-form.text-field>

        <div class="flex items-center gap-4">
            <x-actions.primary type="submit">{{ __('Save') }}</x-actions.primary>

            @if (session('status') === 'password-updated')
            <p class="text-sm">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>