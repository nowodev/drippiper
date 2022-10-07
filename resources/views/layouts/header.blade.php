<header>
    {{-- Desktop Nav --}}
    <section>
        <div class="hidden md:flex mx-auto px-12 py-6 bg-white justify-between items-center">
            <div class="flex jusify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                    viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <a href="{{route('home')}}">
                    <span class="ml-3 text-3xl font-bold"> Drip Piper</span>
                </a>
            </div>

            <!-- <input type="text" placeholder="Search" class="w-64 border border-black rounded"> -->

            <div class="flex space-x-4 w-1/5">
                <div class="flex justify-center items-center">

                    <div class="flex justify-center">
                        <div x-data="{show: false}" @click.away="show = false"> <button @click="show = ! show"
                                class="overflow-hidden relative focus:outline-none focus:border-white transition ease-in-out duration-150">
                                <div class="flex justify-between">
                                    Account
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </span>
                                </div>
                            </button>
                            <div x-show="show"
                                class="mt-2 py-2 w-48 absolute bg-white rounded-lg shadow-xl transition ease-in-out duration-500">
                                <a href="{{route('prof')}}"
                                    class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
                                    Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Signout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('cart')}}" class="flex gap-x-2 items-center justify-center">
                    <h3 class=" ">
                        Cart

                    </h3>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>

                    </span>
                </a>
            </div>
        </div>

        <nav class="flex">
            <ul class="flex gap-8 mx-auto">
                <li>
                    <a href="{{ route('home')}}" class="hover:text-gray-600">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{route('products')}}" class="hover:text-gray-600">
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
    </section>



    {{-- Mobile Nav --}}

    <div class=" md:hidden container mx-auto px-3 py-6 bg-white flex justify-between items-center">
        <div class="flex jusify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Piper Wears</span>
        </div>

        <div class="flex space-x-4">
            <h3 class="flex gap-x-1 items-center">
                Account

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                </span>
            </h3>

            <h3 class="flex gap-x-1 ">
                <span>
                    Cart
                </span>


                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" <span>
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>

                </span>
            </h3>
        </div>
    </div>
</header>