<x-app-layout>
    {{-- Hero Section --}}
    <section class="w-full md:p-12 p-4 ">
        <div>
            <div>
                <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/files/ASHLUXE-PARADISE-INYONI-LOCATION0057-1_1296x.png?v=1628967799"
                    alt="background__image" class="w-full align-center justify-center mx-auto">
            </div>
        </div>
    </section>

    {{-- <section>
        <div class="relative">
            <div
                class="absolute inset-0 w-screen h-screen bg-pink-500 text-white flex items-center justify-center text-5xl transition-all ease-in-out duration-1000 transform translate-x-0 slide">
                <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/files/ASHLUXE-PARADISE-INYONI-LOCATION0057-1_1296x.png?v=1628967799"
                    alt="background__image" class="w-full align-center justify-center mx-auto">
            </div>

            <div
                class="absolute inset-0 w-screen h-screen bg-purple-500 text-white flex items-center justify-center text-5xl transition-all ease-in-out duration-1000 transform translate-x-full slide">
                <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/files/ASHLUXE-PARADISE-INYONI-LOCATION0057-1_1296x.png?v=1628967799"
                    alt="background__image" class="w-full align-center justify-center mx-auto">
            </div>
        </div>
    </section> --}}

    {{-- Featured Section --}}
    <section class="w-full">
        <div class="text-center mb-4 text-3xl font-semibold ">
            <h3 class=" text-[#6366F1]">
                Featured products
            </h3>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 mx-auto text-[#6366F1]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
            </svg>

        </div>
        <div class="w-full md:flex justify-center items-center md:mb-24">
            <div class="md:flex md:space-x-4 mb-4">
                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0 ">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
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
                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
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


                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
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


                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
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
    </section>

    <!-- Gallery -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex w-full mb-20 flex-wrap">
                <h1 class="sm:text-3xl text-3xl font-bold title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">
                    Gallery
                </h1>
                <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aliquid, fuga doloribus temporibus
                    voluptate, sequi sapiente optio aspernatur laborum distinctio, autem nobis. Ab iusto labore et
                    explicabo dignissimos vero voluptatibus enim ipsam, repellendus asperiores voluptatem accusantium
                    itaque ad voluptatum numquam.
                </p>
            </div>
            <div class="flex flex-wrap md:-m-2 -m-1">
                <div class="flex flex-wrap w-1/2">
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block"
                            src="https://dummyimage.com/500x300">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block"
                            src="https://dummyimage.com/501x301">
                    </div>
                    <div class="md:p-2 p-1 w-full">
                        <img alt="gallery" class="w-full h-full object-cover object-center block"
                            src="https://dummyimage.com/600x360">
                    </div>
                </div>
                <div class="flex flex-wrap w-1/2">
                    <div class="md:p-2 p-1 w-full">
                        <img alt="gallery" class="w-full h-full object-cover object-center block"
                            src="https://dummyimage.com/601x361">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block"
                            src="https://dummyimage.com/502x302">
                    </div>
                    <div class="md:p-2 p-1 w-1/2">
                        <img alt="gallery" class="w-full object-cover h-full object-center block"
                            src="https://dummyimage.com/503x303">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- New collection -->
    <section>
        <div class="text-center mb-8 text-3xl font-semibold">
            <h3 class=" text-[#6366F1]">
                New Collections
            </h3>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 mx-auto text-[#6366F1]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
            </svg>

        </div>
        <div class="container mx-auto flex justify-between md:px-24 px-5">
            <h3 class="md:text-sm text-xs cursor-pointer text-[#6366F1] ">Collections</h3>
            <div class="flex justify-center items-center space-x-2 md:text-sm text-xs cursor-pointer">
                <h3 class="text-[#6366F1] ">Show all </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-[#6366F1] ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </div>
        </div>
        <div class="w-full md:flex justify-center items-center md:mb-24">
            <div class="md:flex md:space-x-4 mb-4">
                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0 ">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                </div>
                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                </div>


                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                </div>


                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0 mb-6 md:mb-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                </div>
            </div>
        </div>

        <div class="text-center mb-4">
            <button class="cursor-pointer text-white bg-black p-3 rounded md:w-1/6 w-1/3 md:text-xl text-sm hover:bg-pink-700
                transition ease-out duration-500">
                View all
            </button>
        </div>
    </section>

    {{-- Testimonial Section --}}
    <section class="text-gray-600 body-font">
        <div class="text-center md:mb-4 mt-8 md:text-3xl text-sm font-semibold ">
            <h3 class=" text-[#6366F1]">
                Our Customer Speak For Us..
            </h3>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 mx-auto text-[#6366F1]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
            </svg>

        </div>
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/3 lg:mb-0 mb-6 p-4">
                    <div class="h-full text-center">
                        <img alt="testimonial"
                            class="w-20 h-20 mb-8 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                            src="https://dummyimage.com/302x302">
                        <p class="leading-relaxed">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque iusto ex velit
                            repellendus laborum! Delectus voluptate tempora ullam, porro totam quidem eos vel non fuga
                            ut corrupti, est odio aperiam deserunt id recusandae unde quos nam ab, molestias possimus
                            ipsum doloremque odit. Veritatis laudantium blanditiis labore quam quis? Distinctio,
                            ratione?
                        </p>
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-6 mb-4"></span>
                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">HOLDEN CAULFIELD</h2>
                        <p class="text-gray-500">Senior Product Designer</p>
                    </div>
                </div>
                <div class="lg:w-1/3 lg:mb-0 mb-6 p-4">
                    <div class="h-full text-center">
                        <img alt="testimonial"
                            class="w-20 h-20 mb-8 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                            src="https://dummyimage.com/300x300">
                        <p class="leading-relaxed">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate ullam, fugit
                            accusantium praesentium consectetur voluptatum? Tenetur eveniet eius consequuntur ab porro
                            quam cum officiis perferendis delectus maxime blanditiis ad libero vero ipsa, unde autem
                            iure, tempora ut qui quisquam omnis nemo et? Nisi adipisci maxime nobis ad aliquid rem illo!
                        </p>
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-6 mb-4"></span>
                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">ALPER KAMU</h2>
                        <p class="text-gray-500">UI Develeoper</p>
                    </div>
                </div>
                <div class="lg:w-1/3 lg:mb-0 p-4">
                    <div class="h-full text-center">
                        <img alt="testimonial"
                            class="w-20 h-20 mb-8 object-cover object-center rounded-full inline-block border-2 border-gray-200 bg-gray-100"
                            src="https://dummyimage.com/305x305">
                        <p class="leading-relaxed">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nam placeat, fugiat magni
                            inventore itaque voluptate qui ut facilis molestias sapiente veritatis enim numquam quos.
                            Minus sint cupiditate expedita, non quae tempora pariatur obcaecati delectus vel
                            voluptatibus possimus alias sed, at dolorum voluptate animi deserunt! Fugit exercitationem
                            quos aperiam asperiores!
                        </p>
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-6 mb-4"></span>
                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">HENRY LETHAM</h2>
                        <p class="text-gray-500">CTO</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('scripts')
    {{-- <script>
        setTimeout(function() {
            let activeSlide = document.querySelector('.slide.translate-x-0');
            activeSlide.classList.remove('translate-x-0');
            activeSlide.classList.add('-translate-x-full');

            let nextSlide = activeSlide.nextElementSibling;
            nextSlide.classList.remove('translate-x-full');
            nextSlide.classList.add('translate-x-0');
        }, 3000);
    </script> --}}
    @endpush
</x-app-layout>