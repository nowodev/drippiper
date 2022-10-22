<x-app-layout>

    <h3 class="py-4 mt-4 mb-4 text-3xl font-bold text-center text-gray-900 md:mb-6">
        Products
    </h3>

    <div class="bg-white">
        <div class="container px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900"></h2>

            <div
                class="grid grid-cols-1 mt-6 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)

                <div class="relative">
                    <div
                        class="w-full overflow-hidden bg-gray-200 rounded-md min-h-80 aspect-w-1 aspect-h-1 group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="{{ $product->thumbnail }}" alt=""
                            class="object-cover object-center w-full h-full lg:w-full lg:h-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="{{ route('products.show', $product) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">N{{ $product->price }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mx-auto mt-10 max-w-7xl">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</x-app-layout>