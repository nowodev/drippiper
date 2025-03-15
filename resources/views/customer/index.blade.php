<x-app-layout>
    <div class="space-y-6">
        <!-- Hero section -->
        <div class="relative bg-gray-900">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolue inset-0 overflow-hidden">
                <img src="{{ asset('images/hero.jpg') }}" alt="Piperwears" class="hidden w-full h-full md:flex">
                <img src="{{ asset('images/hero-mobile.jpeg') }}" alt="Piperwears" class="w-full h-full md:hidden">
            </div>

            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>
        </div>

        {{-- Featured Section --}}
        <div class="container px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Featured Products</h2>

            <div class="grid grid-cols-1 mt-6 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
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
        </div>

        <!-- Gallery -->
        {{-- <section class="text-gray-600 body-font">
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
                            <img alt="gallery" class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/500x300">
                        </div>
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/501x301">
                        </div>
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/600x360">
                        </div>
                    </div>
                    <div class="flex flex-wrap w-1/2">
                        <div class="w-full p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/601x361">
                        </div>
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/502x302">
                        </div>
                        <div class="w-1/2 p-1 md:p-2">
                            <img alt="gallery" class="block object-cover object-center w-full h-full"
                                src="https://dummyimage.com/503x303">
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


        <!-- New collection -->
        <div class="container px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">New Collections</h2>

            <div class="grid grid-cols-1 mt-6 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($newCollections as $product)
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
        </div>

        <!-- Testimonials -->
        <section aria-labelledby="testimonial-heading"
            class="container relative px-4 py-24 mx-auto sm:px-6 lg:py-32 lg:px-8">
            <div class="max-w-2xl mx-auto lg:max-w-none">
                <h2 id="testimonial-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">What are
                    people
                    saying?</h2>

                <div class="mt-16 space-y-16 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    <blockquote class="sm:flex lg:block">
                        <svg width="24" height="18" viewBox="0 0 24 18" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" class="flex-shrink-0 text-gray-300">
                            <path
                                d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                fill="currentColor" />
                        </svg>
                        <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                            <p class="text-lg text-gray-600">My order arrived super quickly. The
                                product is even better than I hoped it would be. Very happy customer
                                over here!</p>
                            <cite class="block mt-4 not-italic font-semibold text-gray-900"> Sarah
                                Peters, New Orleans </cite>
                        </div>
                    </blockquote>

                    <blockquote class="sm:flex lg:block">
                        <svg width="24" height="18" viewBox="0 0 24 18" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" class="flex-shrink-0 text-gray-300">
                            <path
                                d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                fill="currentColor" />
                        </svg>
                        <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                            <p class="text-lg text-gray-600">I had to return a purchase that didn’t
                                fit. The whole process was so simple that I ended up ordering two
                                new items!</p>
                            <cite class="block mt-4 not-italic font-semibold text-gray-900"> Kelly
                                McPherson, Chicago </cite>
                        </div>
                    </blockquote>

                    <blockquote class="sm:flex lg:block">
                        <svg width="24" height="18" viewBox="0 0 24 18" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" class="flex-shrink-0 text-gray-300">
                            <path
                                d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                fill="currentColor" />
                        </svg>
                        <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                            <p class="text-lg text-gray-600">Now that I’m on holiday for the summer,
                                I’ll probably order a few more shirts. It’s just so convenient, and
                                I know the quality will always be there.</p>
                            <cite class="block mt-4 not-italic font-semibold text-gray-900"> Chris
                                Paul, Phoenix </cite>
                        </div>
                    </blockquote>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
