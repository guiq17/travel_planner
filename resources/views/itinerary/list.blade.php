<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            旅のしおり一覧
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('travel.create') }}">追加</a>
    </div>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="container px-5 py-5 mx-auto">
            <div class="mx-auto overflow-auto">
                <table class="table-auto whitespace-no-wrap">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-3">タイトル</th>
                            <th class="px-4 py-3">開始日</th>
                            <th class="px-4 py-3">終了日</th>
                            <th class="px-4 py-3">詳細</th>
                            <th class="px-4 py-3">編集</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $val)
                            <tr class="py-3">
                                <td class="px-4 py-3">{{ $val->title }}</td>
                                <td class="px-4 py-3">{{ $val->start_date }}</td>
                                <td class="px-4 py-3">{{ $val->end_date }}</td>
                                <td class="px-4 py-3"><button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('schedule.index', ['travel_id' => $val->id]) }}">詳細</a></button></td>
                                <td class="px-4 py-3"><button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('travel.edit', ['id' => $val->id]) }}">編集</a></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
