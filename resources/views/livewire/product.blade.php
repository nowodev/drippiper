<div x-data="{ size: @entangle('size'), quantity: @entangle('quantity') }" class="container mx-auto bg-white">
    <div class="pt-6 pb-16 sm:pb-24">
        <nav aria-label="Breadcrumb" class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="#" class="mr-4 text-sm font-medium text-gray-900">
                            {{ $product?->category?->name }} </a>
                        <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            class="w-auto h-5 text-gray-300">
                            <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
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
        <div class="max-w-2xl px-4 mx-auto mt-8 sm:px-6 lg:max-w-7xl lg:px-8">
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

                    <div class="grid grid-cols-1 gap-y-4 w-full">
                        <img src="{{ $product->thumbnail }}" alt=""
                            class="rounded-lg lg:col-span-2 lg:row-span-2">


                        <div class="w-full grid grid-cols-3 gap-4">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/product_images/' . $image->name) }}" alt=""
                                    class="h-full rounded-lg lg:block">
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-8 lg:col-span-5">
                    <form method="POST" action="{{ route('customer.cart.store') }}">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="size" value="{{ $size }}">
                        <input type="hidden" name="quantity" value="{{ $quantity }}">

                        <!-- Size picker -->
                        <div class="mt-8">
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
                                            :class="size == @js($item->size) ?
                                                'ring-2 ring-offset-2 ring-indigo-500 bg-indigo-600 border-transparent text-white hover:bg-indigo-700' :
                                                'bg-white border-gray-200 text-gray-900 hover:bg-gray-50'"
                                            class="flex items-center justify-center p-3 text-sm font-medium uppercase border rounded-md cursor-pointer sm:flex-1 focus:outline-none">
                                            <p>{{ $item->size }}</p>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>

                        <!-- Quantity picker -->
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
                                        @for ($qty = 1; $qty <= $totalQuantity; $qty++)
                                            <label @click="$wire.set('quantity', @js($qty))"
                                                :class="quantity == @js($qty) ?
                                                    'ring-2 ring-offset-2 ring-indigo-500 bg-indigo-600 border-transparent text-white hover:bg-indigo-700' :
                                                    'bg-white border-gray-200 text-gray-900 hover:bg-gray-50'"
                                                class="flex items-center justify-center p-1 text-sm font-medium uppercase border rounded-md cursor-pointer sm:flex-1 focus:outline-none">
                                                <p>{{ $qty }}</p>
                                            </label>
                                        @endfor
                                    </div>
                                </fieldset>
                            @endif
                        </div>

                        <button type="submit"
                            class="flex items-center justify-center w-full px-8 py-3 mt-8 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                            to cart</button>
                    </form>

                    <!-- Product details -->
                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Description</h2>

                        <div class="mt-4 prose-sm prose text-gray-500">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Policies -->
                    <section aria-labelledby="policies-heading" class="mt-10">
                        <h2 id="policies-heading" class="sr-only">Our Policies</h2>

                        <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                            <div class="p-6 text-center border border-gray-200 rounded-lg bg-gray-50">
                                <dt>
                                    <!-- Heroicon name: outline/globe -->
                                    <svg class="flex-shrink-0 w-6 h-6 mx-auto text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="mt-4 text-sm font-medium text-gray-900">
                                        Fast delivery </span>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-500">Get your order in 3 days
                                </dd>
                            </div>
                        </dl>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
