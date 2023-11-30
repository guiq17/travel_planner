<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スケジュール一覧
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('schedule.create', $travel_id)}}">スケジュール追加</a>
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('memo.create', $travel_id) }}">メモ追加</a>
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('souvenir.index', $travel_id) }}">お土産一覧</a>
    </div>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="container px-5 py-5 mx-auto">
            <div class="mx-auto overflow-auto">
                <table class="table-auto whitespace-no-wrap">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-3">日付</th>
                            <th class="px-4 py-3">開始時間</th>
                            <th class="px-4 py-3">終了時間</th>
                            <th class="px-4 py-3">内容</th>
                            <th class="px-4 py-3">参考HP</th>
                            <th class="px-4 py-3">画像</th>
                            <th class="px-4 py-3">アイコン</th>
                            <th class="px-4 py-3">編集</th>
                            <th class="px-4 py-3">削除</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
