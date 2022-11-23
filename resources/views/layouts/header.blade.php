<header x-data="{ showMenu: false, showAvatar: false }" class="sticky top-0 z-50 ">
    <div class="bg-white">
        <!--
        Mobile menu

        Off-canvas menu for mobile, show/hide based on off-canvas menu state.
        -->
        <div x-show="showMenu" class="fixed inset-0 z-40 flex lg:hidden" role="dialog" aria-modal="true">
            <!--
                Off-canvas menu overlay, show/hide based on off-canvas menu state.

                Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
                Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

            <!--
                Off-canvas menu, show/hide based on off-canvas menu state.

                Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div class="relative flex flex-col w-full max-w-xs pb-12 overflow-y-auto bg-white shadow-xl">
                <div class="flex px-4 pt-5 pb-2">
                    <button @click="showMenu = !showMenu" type="button"
                        class="inline-flex items-center justify-center p-2 -m-2 text-gray-400 rounded-md">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links -->
                <div class="px-4 py-6 mt-2 space-y-6 border-t border-gray-200">
                    <div class="flow-root">
                        <a href="{{ route('products.index') }}"
                            class="block p-2 -m-2 font-medium text-gray-900">Products</a>
                    </div>

                    @foreach ($categories as $category)
                        <div class="flow-root">
                            <a href="{{ route('category', $category->slug) }}"
                                class="block p-2 -m-2 font-medium text-gray-900">
                                {{ $category->name }}
                            </a>
                        </div>
                    @endforeach

                </div>

                <div class="px-4 py-6 space-y-6 border-t border-gray-200">
                    @guest
                        <div class="flow-root">
                            <a href="{{ route('register') }}" class="block p-2 -m-2 font-medium text-gray-900">
                                Create an account
                            </a>
                        </div>
                        <div class="flow-root">
                            <a href="{{ route('login') }}" class="block p-2 -m-2 font-medium text-gray-900">
                                Sign in
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <header class="relative">
            <nav aria-label="Top">
                <!-- Top navigation -->
                <div class="bg-gray-900 hidden lg:block">
                    <div class="container flex items-center justify-between h-10 px-4 mx-auto sm:px-6 lg:px-8">
                        {{-- <p class="flex-1 text-sm font-medium text-center text-white lg:flex-none">
                            Get free delivery on orders over ₦10000</p> --}}

                        @guest
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <a href="{{ route('register') }}"
                                    class="text-sm font-medium text-white hover:text-gray-100">Create an
                                    account</a>
                                <span class="w-px h-6 bg-gray-600" aria-hidden="true"></span>
                                <a href="{{ route('login') }}"
                                    class="text-sm font-medium text-white hover:text-gray-100">Sign
                                    in</a>
                            </div>
                        @endguest
                    </div>
                </div>

                <!-- Secondary navigation -->
                <div class="bg-white border-b border-gray-200">
                    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between h-16">
                            <!-- Logo (lg+) -->
                            <div class="hidden lg:flex lg:items-center">
                                <a href="/">
                                    <span class="sr-only">DripPiper</span>
                                    <x-application-logo />
                                </a>
                            </div>

                            <div class="hidden h-full lg:flex">
                                <!-- Mega menus -->
                                <div class="ml-8">
                                    <div class="flex justify-center h-full space-x-8">

                                        <a href="{{ route('products.index') }}"
                                            class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Products</a>

                                        @foreach ($categories as $category)
                                            <a href="{{ route('category', $category->slug) }}"
                                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile menu and search (lg-) -->
                            <div class="flex items-center flex-1 lg:hidden">
                                <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                                <button @click="showMenu = !showMenu" type="button"
                                    class="p-2 -ml-2 text-gray-400 bg-white rounded-md">
                                    <span class="sr-only">Open menu</span>
                                    <!-- Heroicon name: outline/menu -->
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Logo (lg-) -->
                            <a href="/" class="lg:hidden">
                                <span class="sr-only">DripPiper</span>
                                <x-application-logo />
                            </a>

                            <div class="flex items-center justify-end flex-1">
                                <div class="flex items-center lg:ml-8">
                                    <!-- Profile dropdown -->
                                    <div class="relative z-10 ml-3">
                                        <div>
                                            @auth
                                                <button @click="showAvatar = !showAvatar" type="button"
                                                    class="flex text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                    <span class="sr-only">Open user menu</span>
                                                    <img class="w-8 h-8 rounded-full"
                                                        src="{{ asset('images/avatar.png') }}" alt="">
                                                </button>

                                                <div x-show="showAvatar" @click.away="showAvatar = false"
                                                    class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                    role="menu" aria-orientation="vertical"
                                                    aria-labelledby="user-menu-button" tabindex="-1">
                                                    <!-- Active: "bg-gray-100", Not Active: "" -->

                                                    @if (Auth::user()->type == 'admin')
                                                        <a href="{{ route('admin.profile.show') }}"
                                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                                            tabindex="-1">
                                                            Your Profile
                                                        </a>
                                                    @else
                                                        <a href="{{ route('customer.profile.show') }}"
                                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                                            tabindex="-1">
                                                            Your Profile
                                                        </a>

                                                        <a href="{{ route('customer.orders') }}"
                                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                                            tabindex="-1">
                                                            Orders
                                                        </a>

                                                        {{-- <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700"
                                                    role="menuitem" tabindex="-1"
                                                   >
                                                    Order History
                                                </a> --}}
                                                    @endif

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                                            type="button" class="block px-4 py-2 text-sm text-gray-700"
                                                            role="menuitem" tabindex="-1">
                                                            Sign out
                                                        </a>
                                                    </form>
                                                </div>
                                            @endauth
                                        </div>
                                    </div>

                                    <span class="w-px h-6 mx-4 bg-gray-200 lg:mx-6" aria-hidden="true"></span>

                                    <livewire:cart />

                                    {{-- <div class="flow-root">
                                            <a href="#" class="flex items-center p-2 -m-2 group">
                                                <!-- Heroicon name: outline/shopping-cart -->
                                                <svg class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                    aria-hidden="true">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                <span
                                                    class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                                <span class="sr-only">items in cart, view bag</span>
                                            </a>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</header>
