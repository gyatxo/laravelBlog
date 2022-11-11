<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h1 class="mb-3">Links</h1>
                <ul>
                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All
                            Posts</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create"
                            class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                <form action="/admin/posts" method="post" class="max-w-xl mx-auto border border-gray-200 p-6 rounded-xl"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                        <input type="text" class="border border-gray-400 p-2 w-full" name="title" id="title"
                            aria-describedby="helpId" placeholder="Title" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="thumbnail"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">thumbnail</label>
                        <input type="file" class="border border-gray-400 p-2 w-full" name="thumbnail" id="thumbnail"
                            aria-describedby="helpId" placeholder="thumbnail" value="{{ old('thumbnail') }}">
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="excerpt"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full" rows="3">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                        <textarea name="body" id="body" class="border border-gray-400 p-2 w-full" rows="5">{{ old('body') }}</textarea>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="category_id"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                        <select name="category_id" id="category_id">
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-xs text-white uppercase font-semibold py-2 px-10 rounded-2xl hover:bg-blue-600">Publish
                    </button>
                </form>
            </main>
        </div>
    </main>
</x-layout>
