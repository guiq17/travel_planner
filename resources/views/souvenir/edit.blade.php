<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('souvenir edit') }}
        </h2>
    </x-slot>

    @include('components.complete_message')
    @include('components.validate_message')

    <form method="POST" action="{{ route('souvenir.update', ['id' => $id, 'travel_id' => $travel_id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-full">
                            <div class="relative leading-7 text-sm text-gray-600">
                                カテゴリー
                                <select name="category_id" id="category_id"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option selected disabled>-- 選択してください --</option>
                                    @foreach ($souvenir_categories as $souvenir_category)
                                        <option value="{{ $souvenir_category->id }}"
                                            {{ old('category_id', $souvenir_item->category_id) == $souvenir_category->id ? 'selected' : '' }}>
                                            {{ $souvenir_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="souvenir_name" class="leading-7 text-sm text-gray-600">品名</label>
                                <input type="text" id="souvenir_name" name="souvenir_name"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    value="{{ old('souvenir_name', $souvenir_item->name) }}">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="quantity" class="leading-7 text-sm text-gray-600">個数</label>
                                <input type="text" id="quantity" name="quantity"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    value="{{ old('quantity', $souvenir_item->quantity) }}">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
                                <input type="text" id="price" name="price"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    value="{{ old('price', $souvenir_item->price) }}">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="url" class="leading-7 text-sm text-gray-600">参考HP</label>
                                <input type="url" id="url" name="url"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    value="{{ old('url', $souvenir_item->url) }}">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="contents" class="leading-7 text-sm text-gray-600">内容</label>
                                <textarea id="contents" name="contents"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('contents', $souvenir_item->contents) }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                @if ($souvenir_item->image)
                                    <div>
                                        (画像ファイル：{{ $souvenir_item->image }})
                                    </div>
                                    <img src="{{ asset('storage/images/' . $souvenir_item->image) }}" class="mx-auto"
                                        style="height:300px;">
                                @endif
                                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                <input type="file" id="image" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">更新</button>
                        </div>
                        <a href="{{ route('souvenir.index', ['travel_id' => $travel_id]) }}" class="hover:underline">←
                            お土産一覧へ</a>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-app-layout>
