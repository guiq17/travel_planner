<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            持ち物リスト
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            <div class="max-w-7xl mx-auto pb-4">
                <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded" href="{{ route('packing.create', ['travel_id' => $travel_id]) }}">追加</a>
                {{-- <a type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('packing.create', ['travel_id' => $travel_id]) }}">編集</a> --}}
            </div>
            <div class="space-y-4">
                <!-- カテゴリーごとのリスト -->
                @foreach($list as $packing_category_name => $items)
                    <div class="mb-4">
                        <!-- カテゴリー名 -->
                        <h2 class="text-lg font-semibold">{{ $packing_category_name }}</h2>
                        <!-- アイテムリスト -->
                        <ul class="list-disc pl-4 space-y-2">
                            @foreach($items as $item)
                                <li class="flex items-center">
                                    <!-- チェックボックス -->
                                    <input type="checkbox" class="mr-2">
                                    <!-- アイテム名 -->
                                    <span>{{ $item->packing_item_name }}</span>
                                    <!-- 編集へのリンク -->
                                    <a href="{{ route('packing.edit', ['packing_item_id' => $item->packing_item_id, 'travel_id' => $travel_id]) }}" class="ml-2 text-blue-500 hover:underline">編集</a>
                                    <!-- 削除リンク -->
                                    <form action="{{ route('packing.destroy', ['packing_item_id' => $item->packing_item_id, 'travel_id' => $travel_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 text-red-500 hover:underline" onclick="return confirm('この品名を削除しますか？')">削除</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>