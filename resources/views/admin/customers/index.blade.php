<x-admin-layout>
    @push('styles')
    <style>
        table {
            position: relative;
        }

        .rowlink::before {
            content: "";
            display: block;
            position: absolute;
            left: 0;
            width: 100%;
            height: 3em;
            /* don't forget to set the height! */
        }
    </style>
    @endpush

    <div class="px-4 sm:px-6 lg:px-8">
        <x-success />

        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-semibold text-gray-900">Customers</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all customers.</p>
            </div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div
                        class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th
                                        class="w-4 px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Name
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Phone
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Email
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Address
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($customers as $customer)
                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <a href="#"
                                            class="rowlink">
                                            {{ $loop->iteration }}
                                        </a>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $customer->name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $customer->phone }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $customer->email }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $customer->address }},
                                            {{ $customer->city }},
                                            {{ $customer->state }}
                                        </p>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-5 text-sm text-center bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">No Record Found
                                        </p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $customers->links() }}
    </div>
</x-admin-layout>