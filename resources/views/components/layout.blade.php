<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center gap-3">
                @auth
                    <div x-data="{ show: false }" @click.away="show=false">
                        <button @click="show = ! show" class="font-bold text-sm uppercase">Welcome,
                            {{ auth()->user()->name }}</button>

                        @can('admin')
                            <div x-show="show"
                                class="absolute z-50 py-1 mt-2 rounded-xl w-48 bg-gray-100 max-h-52 overflow-auto"
                                style="display: none;">
                                <a href="/admin/posts"
                                    class="rounded-xl block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white
                        {{ request()->is('admin/posts') ? 'bg-blue-500' : '' }}">Dashboard</a>
                                <a href="/admin/posts/create"
                                    class="rounded-xl block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white
                        {{ request()->is('admin/posts/create') ? 'bg-blue-500' : '' }}">New
                                    Post</a>
                            </div>
                        @endcan
                    </div>
                    <form action="/logout" method="post" class="text-blue-700 ml-3 font-semibold text-sm">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="/register"
                        class="text-xs uppercase text-white bg-red-500 rounded-full py-2 px-4 hover:bg-red-600">Register</a>
                    <a href="/login"
                        class="text-xs uppercase text-white bg-green-500 rounded-full py-2 px-4 hover:bg-green-600">Login</a>
                @endauth

                <a href="#subscribe"
                    class="text-xs uppercase text-white bg-blue-500 rounded-full py-2 px-4 hover:bg-blue-600">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form id="subscribe" method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    <x-flash />
</body>
