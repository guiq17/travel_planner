@if (session('success'))
    <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex justify-center items-center"
        role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="mt-4 bg-red-100 border border-red-400 px-4 py-3 rounded relative flex justify-center items-center">
        <span class="text-center w-2/4 py-2.5 mt-2 rounded">{{ session('error') }}</span>
    </div>
@endif
