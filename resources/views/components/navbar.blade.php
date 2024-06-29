<header class="absolute inset-x-0 top-0 z-50" x-data="{ isOpen: false }">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <h1 class="text-green-600 font-bold text-lg">Puskesmas<span class="text-black">App</span></h1>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" @click="isOpen =!isOpen"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
            <x-nav-link href="/queue" :active="request()->is('/queue')">Antrian</x-nav-link>
            <x-nav-link href="/poli" :active="request()->is('/poli')">Poli</x-nav-link>
            <x-nav-link href="/doctor" :active="request()->is('/doctor')">Dokter</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('/about')">Tentang Kami</x-nav-link>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:items-center">
            @guest
                <a href="{{ route('pasien.register') }}"
                    class="text-xs font-normal leading-6 text-white bg-green-600 me-2 rounded px-2 hover:bg-green-800">Register</a>
                <a href="{{ route('pasien.login') }}"
                    class="text-xs font-semibold leading-6 text-gray-900 border-2 rounded-md px-2 hover:bg-gray-200">Log
                    in</a>
            @else
                <div class="relative ml-3">
                    <div>
                        <button type="button" @click="isOpen =!isOpen"
                            class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            @if (Auth::user()->role == 'dokter')
                                <img class="h-8 w-8 object-cover rounded-full" src="{{ asset(Auth::user()->dokter->photo) }}"
                                    alt="">
                            @else
                                <img class="h-8 w-8 object-cover rounded-full" src="{{ asset(Auth::user()->pasien->photo) }}"
                                    alt="">
                            @endif
                        </button>
                    </div>

                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        @if (Auth::user()->role == 'dokter')
                            <a href="{{ route('dokter.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                            <a href="{{ route('dokter.logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-1">Logout</a>
                        @else
                            <a href="{{ route('pasien.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                            <a href="{{ route('pasien.logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-1">Logout</a>
                        @endif
                    </div>
                </div>
            @endguest
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="isOpen" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-50"></div>
        <div
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <h1 class="text-green-600 font-bold text-lg">Puskesmas<span class="text-black">App</span></h1>
                </a>
                <button @click="isOpen =!isOpen" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <x-nav-link-mobile href="/" :active="request()->is('/')">Beranda</x-nav-link-mobile>
                        <x-nav-link-mobile href="/queue" :active="request()->is('/queue')">Antrian</x-nav-link-mobile>
                        <x-nav-link-mobile href="/poli" :active="request()->is('/poli')">Poli</x-nav-link-mobile>
                        <x-nav-link-mobile href="/doctor" :active="request()->is('/doctor')">Dokter</x-nav-link-mobile>
                        <x-nav-link-mobile href="/about" :active="request()->is('/about')">Tentang Kami</x-nav-link-mobile>
                    </div>
                    <div class="py-6">
                        @guest
                            <a href="{{ route('pasien.register') }}"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Register</a>
                            <a href="{{ route('pasien.register') }}"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                in</a>
                        @else
                            <div class="pb-3 pt-4">
                                <div class="flex items-center px-5">
                                    <div class="flex-shrink-0">
                                        @if (Auth::user()->role == 'dokter')
                                            <img class="h-10 w-10 object-cover rounded-full"
                                                src="{{ asset(Auth::user()->dokter->photo) }}" alt="">
                                        @else
                                            <img class="h-10 w-10 object-cover rounded-full"
                                                src="{{ asset(Auth::user()->pasien->photo) }}" alt="">
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-base font-medium leading-none text-green-600">
                                            {{ Auth::user()->name }}</div>
                                        <div class="text-sm font-medium leading-none text-gray-400">
                                            {{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                                <div class="mt-3 space-y-1 px-2">
                                    @if (Auth::user()->role == 'dokter')
                                        <a href="{{ route('dokter.dashboard') }}"
                                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Dashboard</a>
                                        <a href="{{ route('dokter.logout') }}"
                                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
                                    @else
                                        <a href="{{ route('pasien.dashboard') }}"
                                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Dashboard</a>
                                        <a href="{{ route('pasien.logout') }}"
                                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
                                    @endif
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
