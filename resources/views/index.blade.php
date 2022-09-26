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
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mx-auto text-[#6366F1]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
            </svg>

        </div>
        <div class="w-full md:flex justify-center items-center mb-32">
            <div class="md:flex md:space-x-4 mb-4">
                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                    <p
                        class="absolute px-3 group-hover:bottom-28 text-center bg-black text-white duration-700">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </p>
                    <a href="{{route('product.view')}}">
                        <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                    left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">VIEW
                            PRODUCT</button>
                    </a>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>


                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                    <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">
                        VIEW PRODUCT</button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>


                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                    <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">VIEW PRODUCT</button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>


                <div class="relative cursor-pointer shaadow-lg group overflow-hidden pl-6 md:pl-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/PufferJacket2_360x.png?v=1663679518"
                        alt="" class="h-96 duration-500 group-hover:opacity-0">
                    <img src="https://cdn.shopify.com/s/files/1/0066/2326/4828/products/image_67c584d0-d8d4-4452-8bd5-a360370b647d_360x.jpg?v=1662634229"
                        alt="" class="h-96 absolute top-0 z-[-1]">
                    <button class="absolute px-5 py-2 bg-black text-white font-semibold rounded
                left-1/4 bottom-[-65px] group-hover:bottom-14 duration-700">VIEW PRODUCT</button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-8 h-8 absolute bg-black text-white  rounded-full p-2 duration-500 right-[-60px] top-5 hover:bg-slate-800 group-hover:right-2 delay-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonial Section --}}
    <section class="text-gray-400 mb-4">
        <div class="container px-5 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                    <path
                        d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                    </path>
                </svg>
                <p class="text-3xl font-bold mb-3">
                    Let Customers Speak for Us
                </p>
                <p class="leading-relaxed text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab beatae
                    exercitationem dicta, labore libero
                    repellat amet cupiditate pariatur nemo odio sunt quis vel distinctio officia
                    iusto sit tenetur rerum,
                    qui minima ea eligendi dolorem possimus? Delectus unde, animi doloremque
                    quibusdam cum blanditiis vitae
                    omnis error fugiat veniam qui distinctio consequuntur ea quam eius quod sed
                    dolor aliquid.
                </p>
                <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">Piper Wears
                </h2>
                <p class="text-gray-500">Bank Manager</p>

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