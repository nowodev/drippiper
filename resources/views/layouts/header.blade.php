<header>
    <section>

        {{-- Desktop Nav --}}
        <div class="items-center justify-between hidden px-12 py-3 mx-auto bg-white md:flex">
            <div class="flex items-center jusify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-10 h-10 p-2 text-white bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <a href="{{route('home')}}">
                    <span class="ml-3 text-3xl font-bold"> Drip Piper</span>
                </a>
            </div>

            <div class="flex w-1/5 space-x-4">
                <div class="flex items-center justify-center">

                    <div class="flex justify-center">
                        <div x-data="{ show: false }" @click.away="show = false">
                            <button @click="show = ! show"
                                class="relative overflow-hidden transition duration-150 ease-in-out focus:outline-none focus:border-white">
                                <div class="flex justify-between">
                                    Account
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </span>
                                </div>
                            </button>

                            <div x-show="show"
                                class="absolute w-48 mt-2 transition duration-500 ease-in-out bg-white border rounded-lg shadow-xl">
                                <a href="#"
                                    class="block px-4 py-2 text-gray-800 rounded-t-lg hover:bg-indigo-500 hover:text-white">
                                    Profile
                                </a>

                                <a href="#"
                                    class="block px-4 py-2 text-gray-800 rounded-b-lg hover:bg-indigo-500 hover:text-white">
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('cart') }}" class="flex items-center justify-center gap-x-2">
                    <h3 class="">
                        Cart
                    </h3>

                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>

                    </span>
                </a>
            </div>
        </div>

        {{-- Mobile Nav --}}

        <div
            class="container flex items-center justify-between px-3 py-6 mx-auto bg-white md:hidden">
            <div class="flex items-center jusify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-10 h-10 p-2 text-white bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Drip Piper</span>
            </div>

            <div class="flex space-x-4">
                <h3 class="flex items-center gap-x-1">
                    Account

                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>

                    </span>
                </h3>

                <h3 class="flex gap-x-1 ">
                    <span>
                        Cart
                    </span>


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" <span>
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>

                    </span>
                </h3>
            </div>
        </div>
    </section>

    <div class="py-4">
        <nav class="flex">
            <ul class="flex gap-8 mx-auto">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-gray-600">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="hover:text-gray-600">
                        Products
                    </a>
                </li>
                <li>
                    New In
                </li>
                <li>
                    Sales
                </li>
                <li>
                    Testimonial
                </li>
            </ul>
        </nav>
    </div>
</header>