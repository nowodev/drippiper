<x-customer-layout>
    <x-slot name="header">
        {{ __('My profile') }}
    </x-slot>

    <x-success />

    <x-errors class="mb-4" :errors="$errors" />

    <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">

            <form action="{{ route('customer.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input type="text" name="name" id="name"
                            value="{{ old('name', auth()->user()->name) }}" required />
                    </div>

                    <div>
                        <x-label for="email" :value="__('Email')" />
                        <x-input type="email" name="email" id="email"
                            value="{{ old('email', auth()->user()->email) }}" required />
                    </div>

                    <div>
                        <x-label for="phone" :value="__('Phone Number')" />
                        <x-input type="text" name="phone" id="phone"
                            value="{{ old('phone', auth()->user()->phone) }}" required />
                    </div>

                    <div>
                        <x-label for="address" :value="__(' Address')" />
                        <x-input type="text" name="address" id="ddress"
                            value="{{ old('address', auth()->user()->address) }}" />
                    </div>

                    <div>
                        <x-label for="city" :value="__('City')" />
                        <x-input type="text" name="city" id="city"
                            value="{{ old('city', auth()->user()->city) }}" />
                    </div>

                    <div>
                        <x-label for="state" :value="__('State')" />
                        <x-input type="text" name="state" id="state"
                            value="{{ old('state', auth()->user()->state) }}" />
                    </div>

                    <div>
                        <x-label for="zip" :value="__('Zip')" />
                        <x-input type="text" name="zip" id="zip"
                            value="{{ old('zip', auth()->user()->zip) }}" />
                    </div>

                    <div></div>

                    <div>
                        <x-label for="password" :value="__('Password')" />
                        <x-input type="password" name="password" id="password" />
                    </div>

                    <div>
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input type="password" name="password_confirmation"
                            id="password_confirmation" />
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <x-button>
                        {{ __('Submit') }}
                    </x-button>
                </div>

            </form>

        </div>
    </div>
</x-customer-layout>