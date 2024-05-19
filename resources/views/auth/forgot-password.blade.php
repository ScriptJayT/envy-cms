<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <x-form.text-field :_label="__('Email')" type="email" name="email" :value="old('email')" required autofocus>
            <x-form.error :messages="$errors->get('email')" class="mt-2" />
        </x-form.text-field>

        <div class="flex items-center justify-end mt-4">
            <x-actions.primary type="submit"> {{ __('Email Password Reset Link') }} </x-actions.primary>
        </div>
    </form>
</x-guest-layout>