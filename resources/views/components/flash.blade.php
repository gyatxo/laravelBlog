@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="bg-blue-500 text-sm text-white rounded-xl px-4 py-2 fixed bottom-4 right-4">
        <p>{{ session('success') }}</p>
    </div>
@endif
