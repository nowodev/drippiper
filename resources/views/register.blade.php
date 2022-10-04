<x-app-layout>
    <section class="h-screen">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center">
                    <h3 class="font-semibold text-xl mb-0">
                        Welcome to Piperwears
                    </h3>
                    <h2 class="mt-6 md:text-xl md:mb-2 mb-3 text-sm tracking-tight text-gray-900">
                        Create an account

                    </h2>
                    <span class="text-sm text-gray-600">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia asperiores voluptatem qui?
                    </span>
                </div>
                <form class="mt-8 space-y-6" action="#" method="POST">
                    <input type="hidden" name="remember" value="true">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div class="mb-4">
                            <label for="first-name" class="sr-only">First Name</label>
                            <input id="first-name" name="firstName" type="text" autocomplete="off" required
                                class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="First name">
                        </div>
                        <div class="mb-4">
                            <label for="last-name" class="sr-only">Last Name</label>
                            <input id="last-name" name="lastName" type="text" autocomplete="off" required
                                class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Last name">
                        </div>

                        <div class="-space-y-px rounded-md shadow-sm">
                            <div class="mb-4 mt-4">
                                <label for="email-address" class="sr-only">Email address</label>
                                <input id="email-address" name="email" type="email" autocomplete="email" required
                                    class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Email address">
                            </div>
                            <div class="mb-4 mt-4">
                                <label for="phone-number" class="sr-only">Phone number</label>
                                <input id="phone-number" name="phone" type="number" autocomplete="off" required
                                    class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm mb-4"
                                    placeholder="Phone Number">
                            </div>
                            <div class="">
                                <label for=" password" class="sr-only">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="group relative flex w-full justify-center mt-4 mb-4 rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Sign up
                            </button>
                        </div>
                        <div class="flex gap-3 text-gray-600 text-sm">
                            <span> Already have an account?</span>
                            <a href="{{route('login')}}" class="hover:text-indigo-600">
                                <p>Sign in</p>
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>