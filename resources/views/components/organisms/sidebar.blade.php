<div class="hidden w-64 overflow-y-auto bg-gray-900 md:block">
    <div class="flex flex-col items-center w-full py-6">
        <div class="flex items-center flex-shrink-0">
            <x-atoms::logo class="w-auto mx-auto h-14 fill-white" />
        </div>
        <div class="flex-1 w-full px-2 mt-6 space-y-1">

        </div>
    </div>
</div>

<div x-show="open" class="md:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state."
    x-ref="dialog" aria-modal="true">
    <div class="fixed inset-0 flex z-[99]">
        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
            class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="open = false" aria-hidden="true">
        </div>

        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            x-description="Off-canvas menu, show/hide based on off-canvas menu state."
            class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-gray-900">

            <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="absolute right-0 p-1 top-1 -mr-14"
                x-description="Close button, show/hide based on off-canvas menu state.">
                <button type="button"
                    class="flex items-center justify-center w-12 h-12 rounded-full focus:outline-none focus:ring-2 focus:ring-white"
                    @click="open = false">
                    <x-dynamic-component :component="WireUi::component('icon')" name="x" class="w-6 h-6 text-white" />
                </button>
            </div>

            <div class="flex items-center flex-shrink-0 px-4">

            </div>
            <div class="flex-1 h-0 px-2 mt-5 overflow-y-auto">
                <nav class="flex flex-col h-full">
                    <div class="space-y-1">

                    </div>
                </nav>
            </div>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
        </div>
    </div>
</div>
