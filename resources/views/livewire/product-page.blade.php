<section class="overflow-hidden text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap mx-auto lg:w-4/5">
            <img class="object-cover object-center w-full h-64 rounded lg:w-1/2 lg:h-auto"
                src="{{ asset('storage/' . $product->cover_image) }}" alt="Product Image">


            <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
                <x-errors class="mb-2" />

                <h2 class="text-sm tracking-widest text-gray-500 title-font">
                    {{ $product->category->name }}
                </h2>
                <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">
                    {{ $product->name }}
                </h1>
                <div class="flex mb-4">
                    <span class="flex items-center">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <span class="ml-3 text-gray-600">4 Reviews</span>
                    </span>
                </div>
                <p class="leading-relaxed text-justify">
                    {{ $product->description }}
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nobis
                    aperiam repudiandae
                    tenetur laborum tempora officia aliquid optio enim quo, cupiditate
                    recusandae non illum dolor
                </p>

                <form method="POST" action="{{ route('customer.cart.store') }}">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div x-data="{ colour: @entangle('colour') }"
                        class="flex flex-col pb-5 mt-6 mb-5 space-y-3 border-b-2 border-gray-100">
                        <div class="flex items-center">
                            <span class="mr-3">Color</span>
                            @foreach ($product->stocks as $stock)
                            <button type="button" @click="$wire.set('colour', @js($stock->colour))"
                                :class="colour == @js($stock->colour) ? 'border-4 border-black' : ''"
                                class="inline-flex w-8 h-8 p-2 mr-2 rounded-full shadow focus:outline-none bg-[{{ $stock->colour }}] focus:shadow-outline">
                            </button>

                            <input type="hidden" name="colour" value="{{ $stock->colour }}">
                            @endforeach
                        </div>

                        <div class="flex">
                            <!-- Size -->
                            <div class="flex items-center">
                                <span class="mr-3">Size</span>
                                <div class="relative">
                                    <select name="size" wire:model="size"
                                        class="py-2 pl-3 pr-10 text-base border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                                        <option></option>
                                        @if (!is_null($colour))
                                        @foreach ($sizes as $item)
                                        <option value="{{ $item->size }}" selected>{{ $item->size }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <span
                                        class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-center text-gray-600 pointer-events-none">
                                        <svg fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div class="flex items-center ml-6">
                                <span class="mr-3">Qty</span>
                                <div class="relative">
                                    <select name="quantity" wire:model="quantity"
                                        class="py-2 pl-3 pr-10 text-base border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                                        @if (!is_null($size))
                                        @for($qty = 1; $qty <= $totalQuantity; $qty++) <option
                                            value="{{ $qty }}" selected>{{ $qty }}</option>
                                            @endfor
                                            @endif
                                    </select>
                                    <span
                                        class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-center text-gray-600 pointer-events-none">
                                        <svg fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold text-gray-900 title-font">
                                ${{ $product->sales_price }}.00
                            </span>
                            <s class="font-semibold text-red-600 title-font">
                                ${{ $product->price }}.00
                            </s>
                        </div>

                        <button type="submit"
                            class="flex px-6 py-2 text-white bg-indigo-500 border-0 rounded h-fit focus:outline-none hover:bg-indigo-600">
                            Add to cart
                        </button>

                        <button
                            class="inline-flex items-center justify-center w-10 h-10 p-0 text-gray-500 bg-gray-200 border-0 rounded-full">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>