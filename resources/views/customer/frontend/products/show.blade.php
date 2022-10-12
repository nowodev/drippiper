<x-app-layout>
    <section class="overflow-hidden text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap mx-auto lg:w-4/5">
                <img class="object-cover object-center w-full h-64 rounded lg:w-1/2 lg:h-auto"
                    src="{{ asset('storage/' . $product->cover_image) }}" alt="Product Image">

                <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
                    <h2 class="text-sm tracking-widest text-gray-500 title-font">
                        {{ $product->category->name }}
                    </h2>
                    <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">
                        {{ $product->name }}
                    </h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"
                                class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <span class="ml-3 text-gray-600">4 Reviews</span>
                        </span>
                        <span class="flex py-2 pl-3 ml-3 border-l-2 border-gray-200 space-x-2s">
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>
                    <p class="leading-relaxed text-justify">
                        {{ $product->description }}
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nobis
                        aperiam repudiandae
                        tenetur laborum tempora officia aliquid optio enim quo, cupiditate
                        recusandae non illum dolor
                    </p>
                    <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-100">
                        <div class="flex">
                            <span class="mr-3">Color</span>
                            @foreach ($product->stocks as $stock)
                            <input
                                class="w-6 h-6 ml-1 bg-[{{ $stock->colour }}] border-2 border-gray-300 rounded-full focus:outline-none" />
                            @endforeach
                        </div>

                        <!-- Size -->
                        <div class="flex items-center ml-6">
                            <span class="mr-3">Size</span>
                            <div class="relative">
                                <select
                                    class="py-2 pl-3 pr-10 text-base border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                                    @foreach ($product->stocks as $stock)
                                    <option>{{ $stock->size }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-center text-gray-600 pointer-events-none">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-4 h-4"
                                        viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="flex items-center ml-6">
                            <span class="mr-3">Qty</span>
                            <div class="relative">
                                <select
                                    class="py-2 pl-3 pr-10 text-base border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                                    @for($i = 1; $i <= $stock->quantity; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                                <span
                                    class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-center text-gray-600 pointer-events-none">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-4 h-4"
                                        viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold text-gray-900 title-font">
                                ${{ $product->sales_price }}.00
                            </span>
                            <s class="text-red-600 font-semibold title-font">
                                ${{ $product->price }}.00
                            </s>
                        </div>

                        <button
                            class="flex h-fit px-6 py-2 text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                            <a href="{{route('checkout')}}">
                                Add to cart
                            </a>
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
                </div>
            </div>
        </div>
    </section>

    {{-- <section>
        <!-- other products section -->
        <div class="items-center justify-center w-full md:flex md:mb-24">
            <div class="mb-4 md:flex md:space-x-4">
                <div class="relative pl-6 mb-6 overflow-hidden cursor-pointer shaadow-lg group md:pl-0 md:mb-0 ">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="duration-500 h-96 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                    <a href="{{ route('products.show') }}">
    <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                    left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">VIEW
        PRODUCT</button>
    </a>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor"
        class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
    </svg>
    </div>
    <div class="relative pl-6 mb-6 overflow-hidden cursor-pointer shaadow-lg group md:pl-0 md:mb-0">
        <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
            alt="" class="duration-500 h-96 group-hover:opacity-0">
        <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
            alt="" class="h-96 absolute top-0 z-[-1]">
        <a href="{{route('product.view')}}">
            <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                    left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">VIEW
                PRODUCT</button>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor"
            class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
    </div>


    <div class="relative pl-6 mb-6 overflow-hidden cursor-pointer shaadow-lg group md:pl-0 md:mb-0">
        <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
            alt="" class="duration-500 h-96 group-hover:opacity-0">
        <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
            alt="" class="h-96 absolute top-0 z-[-1]">
        <a href="{{route('product.view')}}">
            <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                    left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">VIEW
                PRODUCT</button>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor"
            class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
    </div>


    <div class="relative pl-6 mb-6 overflow-hidden cursor-pointer shaadow-lg group md:pl-0 md:mb-0">
        <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
            alt="" class="duration-500 h-96 group-hover:opacity-0">
        <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
            alt="" class="h-96 absolute top-0 z-[-1]">
        <a href="{{route('product.view')}}">
            <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                    left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">VIEW
                PRODUCT</button>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor"
            class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
    </div>
    </div>
    </div>
    </section> --}}


</x-app-layout>