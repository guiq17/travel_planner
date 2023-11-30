<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お土産一覧
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            href="{{ route('souvenir.create', $travel_id) }}">お土産追加</a>
    </div>

    {{-- お土産一覧表示用のコード --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($souvenir_items as $item)
            <div class="mx-4 sm:p-8">
                <div class="mt-4">
                    <div
                        class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500 flex">
                        <div class="flex-grow">
                            <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">
                                {{ $item->item_name }}</h1>
                            <hr class="w-full">
                            <p class="mt-4 text-gray-600 py-1">
                                {{ $item->quantity }}個{{ $item->price ? '　　　' . $item->price . '円' : '' }}</p>
                            <a href="{{ $item->url }}" target="_blank">
                                <p class="mt-4 text-gray-600 py-1 hover:underline">{{ $item->url ? $item->url : '' }}</p>
                            </a>
                            <p class="mt-4 text-gray-600 py-1">{{ $item->contents ? $item->contents : '' }}</p>
                        </div>
                        @if ($item->image)
                            <div class="mt-4 self-end ml-4">
                                <img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->item_name }}"
                                    width="200" class="max-w-full">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>






    {{-- <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">

                @foreach ($souvenir_items as $item)
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                        <span class="font-semibold title-font text-gray-700">CATEGORY</span>
                        <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
                    </div>
                    <div class="md:flex-grow">
                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $item->item_name }}</h2>
                        <p>{{ $item->quantity }}個</p>
                        <p>{{ $item->price }}円</p>
                        <p>{{ $item->url }}</p>
                        <p class="leading-relaxed">{{ $item->contents}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}
</x-app-layout>
