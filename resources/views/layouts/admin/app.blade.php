<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />

        @livewireStyles

        @livewireScripts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('layouts.admin.navigation')

            <div class="flex flex-col flex-1 overflow-hidden">
                @include('layouts.admin.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container px-6 py-8 mx-auto">
                        <h3 class="mb-4 text-3xl font-medium text-gray-700">
                            {{ $header ?? '' }}
                        </h3>

                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>

</html>