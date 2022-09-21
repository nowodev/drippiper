<x-admin-layout>
    <x-slot name="header">
        <div class="items-center gap-x-3">
            <button onclick="history.back(-1)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            {{ __('Show Product') }}
        </div>
    </x-slot>

    <section class="max-w-4xl mx-auto overflow-hidden text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col w-full mb-20 text-center">
                <h1 class="mb-2 text-3xl font-medium text-gray-900 sm:text-4xl title-font">
                    {{ $product->name }}
                </h1>
                <p class="mx-auto text-base leading-relaxed text-gray-500 lg:w-2/3">
                    {{ $product->description }}
                </p>
                <div class="flex mx-auto mt-6 overflow-hidden border-2 border-green-500 rounded">
                    <button class="px-4 py-1 text-white bg-green-500 focus:outline-none">N{{
                        $product->sales_price }}</button>
                    <button class="px-4 py-1 focus:outline-none">N{{ $product->price }}</button>
                </div>
            </div>
            <div class="flex justify-between gap-x-6">
                @foreach ($product->stocks as $stock)
                <div
                    class="w-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 rounded-t-lg" src="" alt="product image">
                    </a>
                    <div class="flex justify-between px-5 pb-5 font-bold text-white">
                        <p>{{ $stock->size }}</p>
                        <p>{{ $stock->colour }}</p>
                        <p>{{ $stock->quantity }}</p>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
</x-admin-layout>