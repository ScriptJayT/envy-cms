<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Take a look at your account's profile.") }}
        </p>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 grid grid-cols-2 gap-6">
        @csrf
        @method('patch')

        <fieldset class="border p-6 rounded-lg">
            <legend class="dark:text-white">Login Data</legend>

            <div class="space-y-6">
                <x-form.text-field readonly :value="$user->handle" _icon='unprotected' :_label="__('Handle')" _action='copy' />

                <x-form.text-field readonly :value="old('email',$user->email)" _icon='unprotected' :_label="__('Registered Email')" _action='copy'>
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                    </div>
                    @else
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">{{__('Your email addres has been verified. Good job.')}}</p>
                    @endif

                    @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </x-form.text-field>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                        @endif
                    </div>
                    @else
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">{{__('Your email addres has been verified. Good job.')}}</p>
                    @endif
                </div>

                <x-form.text-field readonly value="The Password You Choose" _icon='protected' :_label="__('Password')" />
            </div>
        </fieldset>

        <fieldset class="border p-6 rounded-lg">
            <legend class="dark:text-white">Personal Data</legend>

            <div class="space-y-6">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for=profile_pic :value="__('Profile Picture')" />
                    <x-text-input id=profile_pic class="block w-full mt-1" name='profile_picture' :value="old('profile_picture', $user->profile_picture)" />
                </div>

            </div>
        </fieldset>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>