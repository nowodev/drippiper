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
                            Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $product->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $product->price }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div
                class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</x-admin-layout>