<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <x-form.text-field :_label="__('Email')" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </x-form.text-field>

        <!-- Password -->
        <x-form.text-field :_label="__('Password')" type="password" name="password" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </x-form.text-field>

        <!-- Confirm Password -->
        <x-form.text-field :_label="__('Confirm Password')" type="password" name="password_confirmation" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </x-form.text-field>

        <div class="flex items-center justify-end mt-4">
            <x-actions.primary type="submit"> {{ __('Reset Password') }} </x-actions.primary>
        </div>
    </form>
</x-guest-layout>