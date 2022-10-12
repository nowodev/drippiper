<x-app-layout>

    <h3 class="py-4 mt-4 mb-4 text-3xl font-bold text-center text-gray-900 md:mb-6">
        Products
    </h3>
    <div class="items-center justify-center w-full md:flex md:mb-8">
        <div class="mb-4 md:flex md:space-x-4">

            @foreach ($products as $product)
            <div
                class="relative w-fit mb-6 overflow-hidden shadow-lg cursor-pointer group md:pl-0 md:mb-0">
                <img src="{{ asset('storage/' . $product->cover_image) }}" alt="Product Image"
                    class="h-96 max-w-[240px] duration-500">
                <a href="{{ route('products.show', $product) }}"
                    class="absolute px-5 py-2 bg-black text-white left-1/4 font-semibold rounded bottom-[-65px] group-hover:bottom-14 duration-700">
                    View Product
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor"
                    class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>