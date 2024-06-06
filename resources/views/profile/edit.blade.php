<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-16">
            <div>
                <dl class="space-y-4">
                    @foreach ( $user->teams as $_t )
                    <li>
                        <dt class="inline">{{ $_t->name }}</dt>
                        <dd>{{ $_t->description }}</dd>
                    </li>
                    @endforeach
                </dl>
            </div>

            <div class="p-4 sm:p-8 sm:rounded-lg border bg-theme-gradient-300">
                @include('profile.partials.latest-actions')
            </div>

            <div class="p-4 sm:p-8 sm:rounded-lg border bg-theme-gradient-300">
                @include('profile.partials.session')
            </div>

            <div class="p-4 sm:p-8 sm:rounded-lg border bg-theme-gradient-300">
                @include('profile.partials.update-profile-information-form')
            </div>

            @if( !$user->isSystem() )
            <div class="p-4 sm:p-8 sm:rounded-lg border bg-theme-gradient-300">
                @include('profile.partials.user-settings-form')
            </div>

            <div class="p-4 sm:p-8 sm:rounded-lg border bg-theme-gradient-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 sm:rounded-lg border bg-theme-gradient-300">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>