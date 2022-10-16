<div x-data="{ colour: @entangle('colour'), size: @entangle('size'), quantity: @entangle('quantity') }"
    class="bg-white">
    <div class="pt-6 pb-16 sm:pb-24">
        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="#" class="mr-4 text-sm font-medium text-gray-900">
                            {{ $product?->category?->name }} </a>
                        <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" class="h-5 w-auto text-gray-300">
                            <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z"
                                fill="currentColor" />
                        </svg>
                    </div>
                </li>

                <li class="text-sm">
                    <p class="font-medium text-gray-500 hover:text-gray-600">
                        {{ $product->name }}
                    </p>
                </li>
            </ol>
        </nav>
        <div class="mt-8 max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
                <div class="lg:col-start-8 lg:col-span-5">
                    <div class="flex justify-between">
                        <h1 class="text-xl font-medium text-gray-900">{{ $product->name }}</h1>
                        <p class="text-xl font-medium text-gray-900">₦{{ $product->price }}</p>
                    </div>

                    <x-errors class="mt-8" />
                </div>

                <!-- Image gallery -->
                <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-7 lg:row-start-1 lg:row-span-3">
                    <h2 class="sr-only">Images</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 lg:grid-rows-3 lg:gap-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-featured-product-shot.jpg"
                            alt="Back of women&#039;s Basic Tee in black."
                            class="lg:col-span-2 lg:row-span-2 rounded-lg">

                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-product-shot-01.jpg"
                            alt="Side profile of women&#039;s Basic Tee in black."
                            class="hidden lg:block rounded-lg">

                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-product-shot-02.jpg"
                            alt="Front of women&#039;s Basic Tee in black."
                            class="hidden lg:block rounded-lg">
                    </div>
                </div>

                <div class="mt-8 lg:col-span-5">
                    <form method="POST" action="{{ route('customer.cart.store') }}">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="colour" value="{{ $colour }}">
                        <input type="hidden" name="size" value="{{ $size }}">
                        <input type="hidden" name="quantity" value="{{ $quantity }}">

                        <!-- Color picker -->
                        <div>
                            <h2 class="text-sm font-medium text-gray-900">Color</h2>

                            <fieldset class="mt-2">
                                <legend class="sr-only">Choose a color</legend>
                                <div class="flex items-center space-x-3">
                                    <!--
                      Active and Checked: "ring ring-offset-1"
                      Not Active and Checked: "ring-2"
                    -->
                                    @foreach ($product->stocks->unique('colour') as $stock)
                                    <label @click="$wire.set('colour', @js($stock->colour))"
                                        :class="colour == @js($stock->colour) ? 'ring ring-offset-1' : ''"
                                        class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-900">
                                        <input type="radio" name="color" class="sr-only"
                                            aria-labelledby="color-choice-0-label">
                                        <span aria-hidden="true"
                                            class="h-8 w-8 @if ($stock->colour == 'black') bg-black @else bg-{{ $stock->colour }}-600 @endif border border-black border-opacity-10 rounded-full"></span>
                                    </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>

                        <!-- Size picker -->
                        <div class="mt-8">
                            @if (!is_null($colour))

                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-medium text-gray-900">Size</h2>
                            </div>

                            <fieldset class="mt-2">
                                <legend class="sr-only">Choose a size</legend>
                                <div class="grid grid-cols-3 gap-3 sm:grid-cols-6">
                                    <!--
                      In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                      Active: "ring-2 ring-offset-2 ring-indigo-500"
                      Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                    -->
                                    @foreach ($sizes as $item)
                                    <label @click="$wire.set('size', @js($item->size))"
                                        :class="size == @js($item->size) ? 'ring-2 ring-offset-2 ring-indigo-500 bg-indigo-600 border-transparent text-white hover:bg-indigo-700' : 'bg-white border-gray-200 text-gray-900 hover:bg-gray-50'"
                                        class="border rounded-md p-3 flex items-center justify-center text-sm font-medium uppercase sm:flex-1 cursor-pointer focus:outline-none">
                                        <p>{{ $item->size }}</p>
                                    </label>
                                    @endforeach
                                </div>
                            </fieldset>
                            @endif
                        </div>

                        <!-- Size picker -->
                        <div class="mt-8">
                            @if (!is_null($size))

                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-medium text-gray-900">Quantity</h2>
                            </div>

                            <fieldset class="mt-2">
                                <legend class="sr-only">Select quantity</legend>
                                <div class="grid grid-cols-3 gap-3 sm:grid-cols-6">
                                    <!--
                      In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                      Active: "ring-2 ring-offset-2 ring-indigo-500"
                      Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                    -->
                                    @for($qty = 1; $qty <= $totalQuantity; $qty++) <label
                                        @click="$wire.set('quantity', @js($qty))"
                                        :class="quantity == @js($qty) ? 'ring-2 ring-offset-2 ring-indigo-500 bg-indigo-600 border-transparent text-white hover:bg-indigo-700' : 'bg-white border-gray-200 text-gray-900 hover:bg-gray-50'"
                                        class="border rounded-md p-1 flex items-center justify-center text-sm font-medium uppercase sm:flex-1 cursor-pointer focus:outline-none">
                                        <p>{{ $qty }}</p>
                                        </label>
                                        @endfor
                                </div>
                            </fieldset>
                            @endif
                        </div>

                        <button type="submit"
                            class="mt-8 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                            to cart</button>
                    </form>

                    <!-- Product details -->
                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Description</h2>

                        <div class="mt-4 prose prose-sm text-gray-500">
                            <p>The Basic tee is an honest new take on a classic. The tee uses
                                super soft, pre-shrunk cotton for true comfort and a dependable
                                fit. They are hand cut and sewn locally, with a special dye
                                technique that gives each tee it's own look.</p>
                            <p>Looking to stock your closet? The Basic tee also comes in a
                                3-pack or 5-pack at a bundle discount.</p>
                        </div>
                    </div>

                    <!-- Policies -->
                    <section aria-labelledby="policies-heading" class="mt-10">
                        <h2 id="policies-heading" class="sr-only">Our Policies</h2>

                        <dl
                            class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                            <div
                                class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center">
                                <dt>
                                    <!-- Heroicon name: outline/globe -->
                                    <svg class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="mt-4 text-sm font-medium text-gray-900">
                                        Fast delivery </span>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-500">Get your order in 2 years
                                </dd>
                            </div>
                        </dl>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>