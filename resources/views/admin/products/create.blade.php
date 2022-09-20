<x-admin-layout>
    <x-slot name="header">
        {{ __('Create Product') }}
    </x-slot>


    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.products.form')
    </form>

</x-admin-layout>