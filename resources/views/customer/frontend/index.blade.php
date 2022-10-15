<x-app-layout>
    <div class="space-y-6">
        {{-- Hero Section --}}
        <section>
            <img src="{{ asset('00004.jpg') }}"
                alt="background__image" class="justify-center h-screen object-cover w-full mx-auto align-center">
        </section>

        {{-- Featured Section --}}
        <section>
            <div class="mb-3 text-center">
                <h3 class="mb-4 text-3xl font-bold text-gray-900 lg:mb-0">
                    Featured products
                </h3>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto text-[#6366F1]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>
            </div>

            <!-- overlay -->
            <div class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-black bg-opacity-600 "
                id="myModal"></div>
            <!-- Modal Content -->
            <div class="relative top-20"></div>
            <div class="items-center justify-center w-full md:flex md:mb-24">
                <div class="mb-4 md:flex md:space-x-4 overflow-clip">
                    @foreach ($products as $product)
                    <div
                        class="relative w-fit mb-6 overflow-hidden shadow-lg cursor-pointer group md:pl-0 md:mb-0">
                        <img src="{{ asset('storage/' . $product->cover_image) }}"
                            alt="Product Image" class="h-96 max-w-[240px] duration-500">
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
        </section>

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
        <section>
            <div class="mb-3 text-center">
                <h3 class="mb-4 text-3xl font-bold text-gray-900 lg:mb-0">
                    New Collections
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto text-[#6366F1]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>

            </div>
            <div class="container flex justify-between px-5 mx-auto md:px-24">
                <span></span>
                <div
                    class="flex items-center justify-center space-x-2 text-xs cursor-pointer md:text-sm">
                    <h3 class="text-[#6366F1] ">Show all </h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#6366F1] ">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </div>
            </div>
            <div class="items-center justify-center w-full md:flex md:mb-24">
                <div class="mb-4 md:flex md:space-x-4">
                    @foreach ($newCollections as $newCollection)
                    <div
                        class="relative mb-6 w-fit overflow-hidden cursor-pointer shadow-lg group md:pl-0 md:mb-0 ">
                        <img src="{{ asset('storage/' . $newCollection->cover_image) }}"
                            alt="New Collection" class="h-96 max-w-[240px] duration-500">
                    </div>
                    @endforeach
                </div>
        </section>

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