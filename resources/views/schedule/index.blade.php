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
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('packing.index', $travel_id)}}">持ち物リスト</a>
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('souvenir.index', $travel_id) }}">お土産リスト</a>
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('memo.index', $travel_id) }}">その他メモ</a>
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
                            <th class="px-4 py-3">アイコン</th>
                            <th class="px-4 py-3">編集</th>
                            <th class="px-4 py-3">削除</th>
                        </tr>
                    </thead>
                    @foreach ($schedules as $schedule)
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $schedule->date }}</td>
                            <td class="px-4 py-3">{{ $schedule->start_time }}</td>
                            <td class="px-4 py-3">{{ $schedule->end_time }}</td>
                            <td class="px-4 py-3">{{ $schedule->event }}</td>
                            <td class="px-4 py-3"><a href="{{ $schedule->url }}" target="_blank">{{ $schedule->url }}</a></td>
                            <td class="px-4 py-3 fas fa-{{$schedule->icon}} fa-2x"></td>
                            <td><a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('schedule.edit', ['id' => $schedule->id, 'travel_id' => $travel_id]) }}">編集</a></td>
                            <td><a type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('schedule.edit', ['id' => $schedule->id, 'travel_id' => $travel_id]) }}">削除</a></td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
