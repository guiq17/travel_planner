<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ一覧
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="container px-5 py-5 mx-auto">
            <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('memo.create', $travel_id) }}">メモ追加</a>
            <div class="mx-auto overflow-auto">
                <table class="table-auto whitespace-no-wrap">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-3">ノート</th>
                            <th class="px-4 py-3">URL</th>
                        </tr>
                        @foreach ($memos as $memo)
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $memo->note }}</td>
                            <td class="px-4 py-3">{{ $memo->url }}</td>
                            <td><a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('memo.edit', ['id' => $memo->id, 'travel_id' => $travel_id]) }}">編集</a></td>
                            <form action="{{ route('memo.destroy', ['id' => $memo->id, 'travel_id' => $travel_id]) }}" method="POST">
                                @csrf
                                <td><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">削除</button></td>
                            </form>
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>