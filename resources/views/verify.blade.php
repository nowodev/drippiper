<x-app-layout>
    <section class="h-screen">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center">
                    <h2 class="mt-6 md:text-xl md:mb-2 mb-3 text-sm tracking-tight text-gray-900">
                        Verify your account
                    </h2>
                </div>
                <form class="mt-8 space-y-6" action="#" method="POST">
                    <input type="hidden" name="remember" value="true">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div class="mb-4">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Email address">
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            </span>
                            RequesT OTP
                        </button>
                    </div>
                    <div class="flex gap-3 text-gray-600 text-sm">
                        <span> Don't have an accoun?</span>
                        <a href="{{route('register')}}" class="hover:text-indigo-600">
                            <p>Click here</p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>