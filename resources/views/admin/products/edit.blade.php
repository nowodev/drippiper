<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit Product') }}
    </x-slot>

    <livewire:product-form :product="$product" :stocks="$product->stocks" :product_id="$product->id" />

</x-admin-layout>