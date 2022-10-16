<x-app-layout>
    <div class="space-y-6">
        {{-- Hero Section --}}
        <section>
            <img src="{{ asset('00004.jpg') }}" alt="background__image"
                class="justify-center h-screen object-cover w-full mx-auto align-center">
        </section>

        {{-- Featured Section --}}

        <div class="container mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Featured Products</h2>

            <div
                class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)

                <div class="relative">
                    <div
                        class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                            alt="Front of men&#039;s Basic Tee in black."
                            class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
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
        </div>

        <!-- Gallery -->
        <section class="text-gray-600 body-font">
            <div class="container flex flex-wrap px-5 py-24 mx-auto">
                <div class="flex flex-wrap w-full mb-20">
                    <h1 class="mb-4 text-3xl font-bold text-gray-900 title-font lg:w-1/3 lg:mb-0">
                        Gallery
                    </h1>
                    <p class="mx-auto text-base leading-relaxed lg:pl-6 lg:w-2/3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aliquid,
                        fuga
                        doloribus temporibus
                        voluptate, sequi sapiente optio aspernatur laborum distinctio, autem nobis.
                        Ab
                        iusto labore et
                        explicabo dignissimos vero voluptatibus enim ipsam, repellendus asperiores
                        voluptatem accusantium
                        itaque ad voluptatum numquam.
                    </p>
                </div>
                <div class="flex flex-wrap -m-1 md:-m-2">
                    <div class="flex flex-wrap w-1/2">
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery"
                                class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/500x300">
                        </div>
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery"
                                class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/501x301">
                        </div>
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery"
                                class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/600x360">
                        </div>
                    </div>
                    <div class="flex flex-wrap w-1/2">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery"
                                class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/601x361">
                        </div>
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery"
                                class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/502x302">
                        </div>
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery"
                                class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/503x303">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- New collection -->

        <div class="container mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">New Collections</h2>

            <div
                class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($newCollections as $product)

                <div class="relative">
                    <div
                        class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                            alt="Front of men&#039;s Basic Tee in black."
                            class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
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
        </div>

        {{-- Testimonial Section --}}
        <section class="text-gray-600">
            <div class="mb-3 text-center">
                <h3 class="mb-4 text-3xl font-bold text-gray-900 lg:mb-0">
                    Our Customer Speak For Us..
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto text-[#6366F1]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>

            </div>
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    @for ($i = 1; $i <= 3; $i++) <div class="p-4 mb-6 lg:w-1/3 lg:mb-0">
                        <div class="h-full text-center">
                            <img alt="testimonial"
                                class="inline-block object-cover object-center w-20 h-20 mb-8 bg-gray-100 border-2 border-gray-200 rounded-full"
                                src="https://dummyimage.com/302x302">
                            <p class="leading-relaxed">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                                iusto ex velit
                                repellendus laborum! Delectus voluptate tempora ullam, porro totam
                                quidem eos vel non fuga
                                ut corrupti, est odio aperiam deserunt id recusandae unde quos nam
                                ab,
                                molestias possimus
                                ipsum doloremque odit. Veritatis laudantium blanditiis labore quam
                                quis?
                                Distinctio,
                                ratione?
                            </p>
                            <span
                                class="inline-block w-10 h-1 mt-6 mb-4 bg-indigo-500 rounded"></span>
                            <h2 class="text-sm font-medium tracking-wider text-gray-900 title-font">
                                HOLDEN CAULFIELD</h2>
                            <p class="text-gray-500">Senior Product Designer</p>
                        </div>
                </div>
                @endfor
            </div>
        </section>

    </div>
</x-app-layout>