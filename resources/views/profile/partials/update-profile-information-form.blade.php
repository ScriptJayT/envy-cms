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

        <fieldset class="border border-gray-500 p-6 rounded-lg">
            <legend class="select-none text-gray-500 text-2xl">Login Data</legend>
            <div class="space-y-6">
                {{-- Handle --}}
                <x-form.text-field readonly :value="$user->handle" _icon=unprotected :_label="__('Handle')" _action=copy />
                {{-- Email --}}
                <x-form.text-field name=email type=email required :value="old('email',$user->email)" _icon=protected :_label="__('Registered Email')" _action=copy>
                    <x-slot:after_label>
                        @if($user->hasVerifiedEmail())
                        <icon title="Your email has been verified. Good job!" class="cursor-help block size-5 text-green-600 dark:text-green-400">
                            <x-media.svg source="formfields.svg#check" />
                        </icon>
                        @else
                        <icon title="Your email should be verified." class="cursor-help block size-5 text-red-600 dark:text-red-400">
                            <x-media.svg source="formfields.svg#cross" />
                        </icon>
                        @endif
                    </x-slot:after_label>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                    </div>
                    @endif

                    @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif

                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </x-form.text-field>
                {{-- Password --}}
                @if( !$user->isSystem() )
                <x-form.text-field readonly value="The Password You Choose" _icon=protected :_label="__('Password')" />
                @endif
            </div>
        </fieldset>

        <fieldset class="border border-gray-500 p-6 rounded-lg">
            <legend class="select-none text-gray-500 text-2xl">Personal Data</legend>
            <div class="space-y-6">
                {{-- Name --}}
                <x-form.text-field :_label="__('Name')" _icon=protected _action=copy name=name :value="old('name', $user->name)" required autocomplete="name">
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </x-form.text-field>
                {{-- Profile Picture --}}
                <x-form.text-field :_label="__('Profile Picture')" _icon=unprotected _action=copy name=profile_picture :value="old('profile_picture', $user->profile_picture)" />
                <x-media.picture :_source="old('profile_picture', $user->profile_picture)" _placeholder="user.svg#profile" class="size-16 border border-current text-gray-500" title="Your current profile picture" />
            </div>
        </fieldset>

        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>