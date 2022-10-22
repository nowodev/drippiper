<x-app-layout>

    <div class="container px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Order Details</h1>

        <div class="pb-5 mt-2 text-sm border-b border-gray-200 sm:flex sm:justify-between">
            <dl class="flex">
                <dt class="text-gray-500">Order number&nbsp;</dt>
                <dd class="font-medium text-gray-900">{{ $order->order_no }}</dd>
                <dt>
                    <span class="sr-only">Date</span>
                    <span class="mx-2 text-gray-400" aria-hidden="true">&middot;</span>
                </dt>
                <dd class="font-medium text-gray-900">
                    {{ $order->created_at->format('F d, Y') }}
                </dd>
            </dl>
        </div>

        <div class="mt-8">
            <h2 class="sr-only">Products purchased</h2>

            <div class="space-y-24">
                @foreach ($order->order_items as $item)

                <div
                    class="grid grid-cols-1 text-sm sm:grid-rows-1 sm:grid-cols-12 sm:gap-x-6 md:gap-x-8 lg:gap-x-8">
                    <div class="sm:col-span-4 md:col-span-5 md:row-end-2 md:row-span-2">
                        <div class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1 bg-gray-50">
                            <img src="{{ $item->product->thumbnail }}" alt=""
                                class="object-cover object-center">
                        </div>
                    </div>
                    <div class="mt-6 sm:col-span-7 sm:mt-0 md:row-end-1">
                        <h3 class="flex justify-between text-lg font-medium text-gray-900">
                            <a href="{{ route('admin.products.show', $item->product_id) }}">
                                {{ $item->product->name }}
                            </a>

                            <p class="font-medium text-gray-900">₦{{ $item->total }}</p>
                        </h3>
                        <p class="flex items-center mt-1 font-medium text-gray-900 gap-x-3">
                            Colour:
                            <label
                                class="-m-0.5 relative p-0.5 rounded-full flex focus:outline-none">
                                <span aria-hidden="true"
                                    style="background: {{ $item->stock->colour }}"
                                    class="h-8 w-8 border border-black border-opacity-10 rounded-full"></span>
                            </label>
                        </p>
                        <p class="mt-1 font-medium text-gray-900">Size: {{ $item->stock->size }}
                        </p>
                        <p class="mt-1 font-medium text-gray-900">Qty:
                            {{ $item->stock->quantity }}
                        </p>
                        <p class="mt-3 text-gray-500">
                            {{ $item->product->description }}
                        </p>
                    </div>
                </div>
                @endforeach

                <div class="sm:col-span-12 md:col-span-7">
                    <p class="mt-6 font-medium text-gray-900 md:mt-10">Processing on <time
                            datetime="2021-03-24">March 24, 2021</time></p>
                    <div class="mt-6">
                        <div class="overflow-hidden bg-gray-200 rounded-full">
                            <div class="h-2 bg-indigo-600 rounded-full"
                                style="width: calc((1 * {{ $progress_no }} + 1) / 8 * 100%)"></div>
                        </div>
                        <div class="hidden grid-cols-4 mt-6 font-medium text-gray-600 sm:grid">
                            <div class="">Order placed</div>
                            <div class="text-center">Processing</div>
                            <div class="text-center">Shipped</div>
                            <div class="text-right">Delivered</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing -->
        <div class="mt-24">
            <h2 class="sr-only">Billing Summary</h2>

            <div
                class="px-6 py-6 rounded-lg bg-gray-50 lg:px-0 lg:py-8 lg:grid lg:grid-cols-12 lg:gap-x-8">
                <dl
                    class="grid grid-cols-1 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:pl-8 lg:col-span-5">
                    <div>
                        <dt class="font-medium text-gray-900">Shipping address</dt>
                        <dd class="mt-3 text-gray-500">
                            <span class="block">{{ $order->user->name }}</span>
                            <span class="block">{{ $order->user->phone }}</span>
                            <span class="block">{{ $order->user->email }}</span>
                            <span class="block">{{ $order->user->address }}</span>
                            <span
                                class="block">{{ $order->user->city . ', ' . $order->user->state }}</span>
                        </dd>
                    </div>
                </dl>

                <dl class="mt-8 text-sm divide-y divide-gray-200 lg:mt-0 lg:pr-8 lg:col-span-7">
                    <div class="flex items-center justify-between pb-4">
                        <dt class="text-gray-600">Subtotal</dt>
                        <dd class="font-medium text-gray-900">₦{{ $order->order_total - 2500 }}
                        </dd>
                    </div>
                    <div class="flex items-center justify-between py-4">
                        <dt class="text-gray-600">Shipping</dt>
                        <dd class="font-medium text-gray-900">₦2500</dd>
                    </div>
                    <div class="flex items-center justify-between pt-4">
                        <dt class="font-medium text-gray-900">Order total</dt>
                        <dd class="font-medium text-indigo-600">₦{{ $order->order_total }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>