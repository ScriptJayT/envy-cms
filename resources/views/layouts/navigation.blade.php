<nav class="w-full border-b border-invert-400 | bg-gray-50/5 backdrop-blur-xl">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="shrink-0">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-6 w-auto text-accent-400" />
                </a>
            </div>

            <div class="flex items-center gap-4">
                <x-modal.partial _button_text="CLI [C]" _button_type="ghost">
                    <x-slot name="header">
                        <h2>CLI</h2>
                    </x-slot>
                    <x-inspiration class="text-white mb-6" />
                    <x-form.text-field value='search' type=search />
                </x-modal.partial>

                <!-- Main Menu -->
                <x-modal.full _button_text="Menu [M]" _button_type="ghost">
                    <x-slot name="header">
                        <h2>Menu</h2>
                    </x-slot>
                    <ul>
                        <x-nav-link _to_route='dashboard' _label="{{ __('Dashboard') }}" />
                    </ul>
                </x-modal.full>

                <!-- User Menu -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <x-actions.ghost class="flex items-center gap-2">
                            <x-media.picture :_source="Auth::user()->profile_picture" _placeholder="user.svg#profile" class="size-4 text-gray-500" aria-hidden />

                            <div>{{ Auth::user()->name }} [P]</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </x-actions.ghost>
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