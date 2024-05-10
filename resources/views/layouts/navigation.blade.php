<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="shrink-0">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-5 w-auto text-accent-600" />
                </a>
            </div>

            <div class="flex items-center gap-4">
                <!-- CLI -->
                <x-secondary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'open-cli')">{{ __('CLI') }} [ ]</x-secondary-button>
                <x-modal name="open-cli" :show="false" focusable>
                    <div class="p-6">
                        <x-inspiration class="text-white mb-6" />
                        <x-form.text-field value='search' type=search />
                    </div>
                </x-modal>

                <!-- Main Menu -->
                <x-secondary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'open-menu')">{{ __('Menu') }} [ ]</x-secondary-button>
                <x-modal name="open-menu" :show="false" focusable>
                    <div class="p-6">
                        <x-inspiration class="text-white mb-6" />

                        <ul>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </ul>
                    </div>
                </x-modal>

                <!-- User Menu -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <x-secondary-button class="flex items-center gap-2">
                            <x-media.picture :_source="Auth::user()->profile_picture" _placeholder="user.svg#profile" class="size-4 text-gray-500" aria-hidden />

                            <div>{{ Auth::user()->name }} [ ]</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </x-secondary-button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>