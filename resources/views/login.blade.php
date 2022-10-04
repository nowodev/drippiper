<x-app-layout>
    <section class="h-screen">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center">
                    <h3 class="font-semibold text-xl mb-0">
                        Welcome Back {user.firstname}
                    </h3>
                    <h2 class="mt-6 md:text-xl md:mb-2 mb-3 text-sm tracking-tight text-gray-900">
                        Sign in to your account
                    </h2>
                    <span class="text-sm text-gray-600">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia asperiores voluptatem qui?
                    </span>
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
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Password">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>

                        <div class="text-sm">
                            <a href="{{route('forgotpassword')}}"
                                class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your
                                password?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

                            Sign in
                        </button>
                    </div>
                    <div class="flex gap-3 text-gray-600 text-sm">
                        <span> Don't have an account?</span>
                        <a href="{{route('register')}}" class="hover:text-indigo-600">
                            <p>Click here</p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>