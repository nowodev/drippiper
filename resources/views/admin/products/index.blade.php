<x-admin-layout>
    <x-slot name="header">
        {{ __('Products') }}
    </x-slot>

    <x-success />

    <div class="flex flex-col space-y-2">
        <div class="flex justify-end">
            <x-link href="{{ route('admin.products.create') }}">Create</x-link>
        </div>

        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Price
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Category
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Visible
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <img src="{{ asset('storage/' . $product->cover_image) }}" class="w-12"
                                alt="Img">
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $product->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $product->price }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 font-bold whitespace-no-wrap">
                                {{ $product->category->name }}
                            </p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <form action="{{ route('admin.products.status', $product) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="flex w-fit">
                                    <x-boolean value="{{ $product->status }}" />
                                </button>
                            </form>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <div class="justify-end space-x-3 flex items-center">

                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="flex w-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>

                                <a href="{{ route('admin.products.show', $product) }}"
                                    class="flex w-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>

                                <form action="{{ route('admin.products.destroy', $product) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()"
                                        class="flex w-fit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-6 h-6 text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6"
                            class="text-center px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">No Record Found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div
                class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</x-admin-layout>