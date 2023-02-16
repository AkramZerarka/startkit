<x-templates::base>
    <div x-data="{ open: false }" @keydown.window.escape="open = false" class="flex h-screen">
        <x-organisms::sidebar />
        <div class="flex flex-col flex-1 overflow-hidden">
            <x-organisms::header />
            <div class="flex items-stretch flex-1 overflow-hidden">
                <main class="flex flex-1 overflow-y-auto">
                    @isset($menu)
                        {{ $menu }}
                    @else
                        <x-organisms::menu />
                    @endisset
                    <div class="w-full space-y-10 overflow-auto bg-gray-50">
                        @isset($breadcrumb)
                            {{ $breadcrumb }}
                        @else
                            <x-organisms::breadcrumb />
                        @endisset
                        @yield('content')
                        @isset($slot)
                            {{ $slot }}
                        @endisset
                    </div>

                </main>
            </div>
        </div>
    </div>
</x-templates::base>
