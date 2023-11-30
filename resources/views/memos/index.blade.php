<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ一覧
        </h2>
    </x-slot>
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            <div class="m-5">
                @include('components.complete_message')
                @include('components.validate_message')
            </div>
            <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('memo.create', $travel_id) }}">メモ追加</a>
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="w-1/3 px-4 py-3">ノート</th>
                            <th class="w-1/3 px-4 py-3">URL</th>
                            <th class="w-1/10 px-4 py-3">編集</th>
                            <th class="w-1/10 px-4 py-3">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($memos as $memo)
                        <tr class="py-3">
                            <td class="w-1/3 px-4 py-3 text-center">{{ $memo->note }}</td>
                            <td class="w-1/3 px-4 py-3 text-center"><a href="{{ $memo->url }}" target="_blank">{{ $memo->url }}</a></td>
                            <td class="w-1/10 px-4 py-3 text-center"><a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('memo.edit', ['id' => $memo->id, 'travel_id' => $travel_id]) }}">編集</a></td>
                            <form action="{{ route('memo.destroy', ['id' => $memo->id, 'travel_id' => $travel_id]) }}" method="POST">
                                @csrf
                                <td class="w-1/10 px-4 py-3 text-center"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit" onclick='return confirm("このメモを削除しますか？")'>削除</button></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</x-app-layout>