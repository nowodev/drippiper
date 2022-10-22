<x-app-layout>
    <div class="bg-white">
        <!-- Background color split screen for large screens -->
        <div class="fixed top-0 left-0 hidden w-1/2 h-full bg-white lg:block" aria-hidden="true">
        </div>
        <div class="fixed top-0 right-0 hidden w-1/2 h-full bg-indigo-900 lg:block"
            aria-hidden="true"></div>

        <header
            class="relative py-6 mx-auto bg-indigo-900 max-w-7xl lg:bg-transparent lg:grid lg:grid-cols-2 lg:gap-x-16 lg:px-8 lg:pt-16 lg:pb-10">
            <div class="flex max-w-2xl px-4 mx-auto lg:max-w-lg lg:w-full lg:px-0">
                <a href="#">
                    <span class="sr-only">Piperwears</span>
                    <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                </a>
            </div>
        </header>

        <main class="relative grid grid-cols-1 mx-auto gap-x-16 max-w-7xl lg:px-8 lg:grid-cols-2">
            <h1 class="sr-only">Checkout</h1>

            <section aria-labelledby="summary-heading"
                class="pt-6 pb-12 text-indigo-300 bg-indigo-900 md:px-10 lg:max-w-lg lg:w-full lg:mx-auto lg:px-0 lg:pt-0 lg:pb-24 lg:bg-transparent lg:row-start-1 lg:col-start-2">
                <div class="max-w-2xl px-4 mx-auto lg:max-w-none lg:px-0">
                    <h2 id="summary-heading" class="sr-only">Order summary</h2>

                    <dl>
                        <dt class="text-sm font-medium">Amount due</dt>
                        <dd class="mt-1 text-3xl font-extrabold text-white">
                            N{{ $total + 2500 }}
                        </dd>
                    </dl>

                    <ul role="list"
                        class="text-sm font-medium divide-y divide-white divide-opacity-10">
                        @foreach ($cartItems as $item)
                        <li class="flex items-start py-6 space-x-4">
                            <img src="{{ $item->product->thumbnail }}" alt=""
                                class="flex-none object-cover object-center w-20 h-20 rounded-md">
                            <div class="flex-auto space-y-1">
                                <h3 class="text-white">{{ $item->product->name }}</h3>
                                <p>{{ $item->product->category->name }}</p>
                                <p>Size: {{ $item->product->stocks->find($item->stock_id)->size }}
                                </p>
                                <p>Pcs: {{ $item->quantity }}</p>
                            </div>
                            <p class="flex-none text-base font-medium text-white">N{{ $item->total
                                }}.00</p>
                        </li>
                        @endforeach
                    </ul>

                    <dl
                        class="pt-6 space-y-6 text-sm font-medium border-t border-white border-opacity-10">
                        <div class="flex items-center justify-between">
                            <dt>Subtotal</dt>
                            <dd>N{{ $total }}</dd>
                        </div>

                        <div class="flex items-center justify-between">
                            <dt>Shipping</dt>
                            <dd>N2500</dd>
                        </div>

                        <div
                            class="flex items-center justify-between pt-6 text-white border-t border-white border-opacity-10">
                            <dt class="text-base">Total</dt>
                            <dd class="text-base">N{{ $total + 2500 }}</dd>
                        </div>
                    </dl>
                </div>
            </section>

            <section aria-labelledby="payment-and-shipping-heading"
                class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-1">
                <h2 id="payment-and-shipping-heading" class="sr-only">Payment and shipping details
                </h2>

                <form method="POST" action="{{ route('customer.checkout.confirm.order') }}">
                    @csrf

                    <x-errors class="mb-4" :errors="$errors" />

                    <div class="max-w-2xl px-4 mx-auto lg:max-w-none lg:px-0">
                        <div>
                            <h3 id="contact-info-heading" class="text-lg font-medium text-gray-900">
                                Contact information</h3>

                            <div class="mt-6">
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700">Email
                                    address</label>
                                <div class="mt-1">
                                    <input type="email" name="email" readonly
                                        value="{{ auth()->user()->email }}"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="mt-6">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700">Phone
                                    number</label>
                                <div class="mt-1">
                                    <input type="text" name="phone"
                                        value="{{ old('phone', auth()->user()->phone) }}"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h3 id="shipping-heading" class="text-lg font-medium text-gray-900">
                                Shipping address</h3>

                            <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-3">
                                <div class="sm:col-span-3">
                                    <label for="address"
                                        class="block text-sm font-medium text-gray-700">Address</label>
                                    <div class="mt-1">
                                        <input type="text" id="address" name="address"
                                            value="{{ old('address', auth()->user()->address) }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="city"
                                        class="block text-sm font-medium text-gray-700">City</label>
                                    <div class="mt-1">
                                        <input type="text" id="city" name="city"
                                            value="{{ old('city', auth()->user()->city) }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="state"
                                        class="block text-sm font-medium text-gray-700">State</label>
                                    <div class="mt-1">
                                        <input type="text" id="state" name="state"
                                            value="{{ old('state', auth()->user()->state) }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>

                                <div>
                                    <label for="postal-code"
                                        class="block text-sm font-medium text-gray-700">Zip
                                        code</label>
                                    <div class="mt-1">
                                        <input type="text" id="postal-code" name="zip"
                                            value="{{ old('zip', auth()->user()->zip) }}"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-6 mt-10 border-t border-gray-200">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                Confirm Order
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
</x-app-layout>