<x-app-layout>
    <div class="max-w-4xl px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:px-8">
        <x-success />

        <x-errors class="mb-4" :errors="$errors" />

        <div class="mt-10 sm:mt-0">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('customer.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input type="text" name="name" id="name"
                                        value="{{ old('name', auth()->user()->name) }}" required />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input type="email" name="email" id="email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                        required />
                                </div>


                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="phone" :value="__('Phone Number')" />
                                    <x-input type="text" name="phone" id="phone"
                                        value="{{ old('phone', auth()->user()->phone) }}"
                                        required />
                                </div>

                                <div class="col-span-6">
                                    <x-label for="address" :value="__(' Address')" />
                                    <x-input type="text" name="address" id="ddress"
                                        value="{{ old('address', auth()->user()->address) }}" />
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <x-label for="city" :value="__('City')" />
                                    <x-input type="text" name="city" id="city"
                                        value="{{ old('city', auth()->user()->city) }}" />
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <x-label for="state" :value="__('State')" />
                                    <x-input type="text" name="state" id="state"
                                        value="{{ old('state', auth()->user()->state) }}" />
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <x-label for="zip" :value="__('Zip')" />
                                    <x-input type="text" name="zip" id="zip"
                                        value="{{ old('zip', auth()->user()->zip) }}" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="password" :value="__('Password')" />
                                    <x-input type="password" name="password" id="password" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="password_confirmation"
                                        :value="__('Confirm Password')" />
                                    <x-input type="password" name="password_confirmation"
                                        id="password_confirmation" />
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>