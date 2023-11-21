@if ($errors->any())
    <div class="mt-4 bg-red-100 border border-red-400 px-4 py-3 rounded">
        @foreach ($errors->all() as $error)
            <li class="text-center w-2/4 py-2.5 mt-2 rounded">{{ $error }}</li>
        @endforeach
    </div>
@endif