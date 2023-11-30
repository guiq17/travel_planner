<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('souvenir list') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8 mb-4">
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            href="{{ route('souvenir.create', $travel_id) }}">お土産追加</a>
    </div>

    {{-- お土産一覧表示用のコード --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($souvenir_list as $category_name => $items)
            <div class="mb-4">
                <!-- カテゴリー名の装飾 -->
                <h1 class="text-2xl font-bold border-b-2 border-gray-300 mb-2 pb-2">{{ $category_name }}</h1>

                @foreach ($items as $item)
                    <div class="mx-4 sm:p-8">
                        <div class="mt-4">
                            <div
                                class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                                <div class="flex">
                                    <div class="flex-grow">
                                        <h1 class="text-lg text-gray-700 font-semibold">
                                            {{ $item->item_name }}
                                        </h1>
                                        <hr class="w-full">
                                        <p class="mt-4 text-gray-600 py-1">
                                            {{ $item->quantity }}個{{ $item->price ? '　　　' . $item->price . '円' : '' }}
                                        </p>
                                        <a href="{{ $item->url }}" target="_blank">
                                            <p class="mt-4 text-gray-600 py-1 hover:underline">
                                                {{ $item->url ? $item->url : '' }}</p>
                                        </a>
                                        <p class="mt-4 text-gray-600 py-1">{{ $item->contents ? $item->contents : '' }}
                                        </p>
                                    </div>

                                    @if ($item->image)
                                        <div class="mt-4 self-end ml-4">
                                            <img src="{{ asset('storage/images/' . $item->image) }}"
                                                alt="{{ $item->item_name }}" width="200" class="max-w-full">
                                        </div>
                                    @endif
                                </div>

                                <a type="button"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-2 rounded"
                                    href="{{ route('souvenir.edit', ['id' => $item->item_id, 'travel_id' => $travel_id]) }}">編集</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>

</x-app-layout>
