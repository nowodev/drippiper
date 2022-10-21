<x-admin-layout>
    <x-slot name="header">
        <div class="items-center gap-x-3">
            <button onclick="history.back(-1)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            {{ __('Edit Order') }}
        </div>
    </x-slot>

    <form action="{{ route('admin.orders.update', $order) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex flex-col max-w-sm space-y-6">
            <div class="grid grid-cols-1 gap-6 mdgrid-cols-2">
                <div>
                    <x-input-label>Order Status</x-input-label>

                    <select
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="order_status">
                        @foreach ($orderStatuses as $status)
                        <option value="{{ $status->value }}" @selected($order->order_status ==
                            $status->value)>
                            {{ $status->value }}
                        </option>
                        @endforeach
                    </select>

                    <x-input-error for="order_status" />
                </div>
            </div>

            <div class="flex justify-end">
                <x-primary-button type="submit">Save</x-primary-button>
            </div>
        </div>
    </form>

</x-admin-layout>