<header class="w-full">
    <div class="relative z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200 shadow-sm">
        <x-button flat icon="menu-alt-2" lg class="focus:outline-none" @click="open = true" class="block md:hidden" />
        <div class="flex justify-between flex-1 px-4 sm:px-6">
            <div class="flex flex-1">
            </div>
            <div class="flex items-center ml-2 space-x-4 sm:ml-6 sm:space-x-6">
                <div x-data="{ open: false }" class="relative flex-shrink-0">
                    <div class="flex items-center">
                        <x-button.circle @click="open = true">

                        </x-button.circle>
                    </div>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        x-ref="menu-items" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                        tabindex="-1" @click.away="open = false">
                        <livewire:pages.auth.logout />
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>
