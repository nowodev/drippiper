<x-guest-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div
            class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true">&#8203;</span>
            <div
                class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <div
                        class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
                        <!-- Heroicon name: outline/check -->
                        <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                            Make Payment</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to purchase this order?
                            </p>
                        </div>
                    </div>
                    <div
                        class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                        <button type="button" onclick="payWithPaystack()"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Pay</button>

                        <a href="{{ route('customer.checkout') }}" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://js.paystack.co/v2/inline.js"></script>

        <script>
            function payWithPaystack() {
                const paystack = new PaystackPop();

                paystack.newTransaction({
                    key: 'pk_test_745396a668920336e76004a04860f41f2d5118cf',
                    first_name: '{{ auth()->user()->name }}',
                    phone: '{{ auth()->user()->phone }}',
                    email: '{{ auth()->user()->email }}',
                    amount: ({{ $total }} + 2500) * 100,

                    onSuccess: (transaction) => {
                        // Payment complete! Reference: transaction.reference
                        window.location.href = "{{ route('customer.checkout.confirm.payment', '') }}" + "/" + transaction.reference;
                    },
                    onCancel: () => {
                        // user closed popup
                        alert('Window closed.');
                    }
                });
            }

        </script>
</x-guest-layout>