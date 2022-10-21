<div x-data="{ showCart: false }">
    <button @click="showCart = ! showCart" class="relative flex items-center justify-center gap-x-1"">
        @if($cartCount > 0)
        <span
            class=" absolute w-5 h-5 text-sm font-extrabold text-white bg-red-500 rounded-full
        -top-2 -right-2 animate-bounce">
        {{ $cartCount }}
        </span>
        @endif

        <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
        </span>
    </button>

    <div x-show="showCart" class="relative z-10" aria-labelledby="slide-over-title" role="dialog"
        aria-modal="true">

        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="fixed inset-y-0 right-0 flex max-w-full pointer-events-none">
                    <div class="w-screen max-w-md pointer-events-auto">
                        <div class="flex flex-col h-full overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 px-4 py-6 overflow-y-auto sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900"
                                        id="slide-over-title">
                                        Shopping cart
                                    </h2>

                                    <div class="flex items-center ml-3 h-7">
                                        <button @click="showCart = ! showCart" type="button"
                                            class="p-2 -m-2 text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Close panel</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            @foreach ($cartItems as $item)
                                            <li class="flex py-6">
                                                <div
                                                    class="flex-shrink-0 w-24 h-24 overflow-hidden border border-gray-200 rounded-md">
                                                    <img src="{{ $item->product->thumbnail }}"
                                                        class="object-cover object-center w-full h-full"
                                                        alt="Img">
                                                </div>

                                                <div
                                                    class="flex flex-col flex-1 ml-4 overflow-hidden">
                                                    <div
                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                        <h3>{{ $item->product->name }}</h3>
                                                        <p class="ml-4">₦{{ $item->total }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="flex items-end justify-between flex-1 text-sm">
                                                        <p class="text-gray-500">Qty
                                                            {{ $item->quantity }}
                                                        </p>

                                                        <div class="flex space-x-2">
                                                            <button class="hover:opacity-75"
                                                                wire:click="reduceQuantity({{ $item->quantity}}, {{ $item->id }})"
                                                                :disabled="{{ $item->quantity }} == 1">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" width="24"
                                                                    height="24">
                                                                    <path fill="none"
                                                                        d="M0 0h24v24H0z" />
                                                                    <path
                                                                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zM7 11v2h10v-2H7z"
                                                                        fill="rgba(0,0,0,1)" />
                                                                </svg>
                                                            </button>

                                                            <button class="hover:opacity-75"
                                                                wire:click="increaseQuantity({{ $item->quantity }}, {{ $item->id }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" width="24"
                                                                    height="24">
                                                                    <path fill="none"
                                                                        d="M0 0h24v24H0z" />
                                                                    <path
                                                                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11H7v2h4v4h2v-4h4v-2h-4V7h-2v4z"
                                                                        fill="rgba(0,0,0,1)" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div class="flex">
                                                            <button type="button"
                                                                wire:click="removeItemFromCart({{ $item->id }})"
                                                                class="text-red-600 hover:text-red-500">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            @if ($cartItems->isNotEmpty())
                            <div class="px-4 py-6 border-t border-gray-200 sm:px-6">
                                <div
                                    class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Total</p>
                                    <p>₦{{ $total }}</p>
                                </div>
                                <div class="mt-6">
                                    <a href="{{ route('customer.checkout') }}"
                                        class="flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-indigo-700">Checkout</a>
                                </div>
                                <div
                                    class="flex justify-center mt-6 text-sm text-center text-gray-500">
                                    <p>
                                        or <button @click="showCart = ! showCart" type="button"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">Continue
                                            Shopping<span aria-hidden="true">
                                                &rarr;</span></button>
                                    </p>
                                </div>
                            </div>

                            @else

                            <div class="grid pb-10 text-xl font-extrabold place-items-center">
                                Nothing to see here
                            </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>