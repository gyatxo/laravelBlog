<x-layout>
    <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 rounded-lg p-6 mt-8">
        <h1 class="text-center">
            Login
        </h1>
        <form action="/sessions" method="post" class="mt-2">
            @csrf
            <div class="mb-2">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="email" id="email"
                    aria-describedby="helpId" placeholder="email" value="{{ old('email') }}">

                @error('email')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password"
                    aria-describedby="helpId" placeholder="password">
                @error('password')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <button type="submit" class="bg-blue-400 text-white py-2 px-4 rounded hover:bg-blue-500">
                    Login
                </button>
            </div>
        </form>
    </main>
</x-layout>
