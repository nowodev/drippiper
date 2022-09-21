<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit Product') }}
    </x-slot>


    <form action="{{ route('admin.products.update', $product) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.products.form', ['buttonName' => 'Save'])
    </form>

</x-admin-layout>