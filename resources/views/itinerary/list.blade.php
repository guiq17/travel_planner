<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            旅のしおり一覧
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            <div class="max-w-7xl mx-auto pb-4">
                <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('travel.create') }}">追加</a>
            </div>
            <table class="min-w-full">
                <thead>
                    <tr class="border-b">
                        <th class="w-1/3 px-4 py-3">タイトル</th>
                        <th class="w-1/6 px-4 py-3">開始日</th>
                        <th class="w-1/6 px-4 py-3">終了日</th>
                        <th class="w-1/10 px-4 py-3">詳細</th>
                        <th class="w-1/10 px-4 py-3">編集</th>
                        <th class="w-1/10 px-4 py-3">削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $val)
                        <tr class="py-3">
                            <td class="w-1/3 px-4 py-3 text-center">{{ $val->title }}</td>
                            <td class="w-1/6 px-4 py-3 text-center">{{ $val->start_date }}</td>
                            <td class="w-1/6 px-4 py-3 text-center">{{ $val->end_date }}</td>
                            <td class="w-1/10 px-4 py-3 text-center"><button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"><a href="">詳細</a></button></td>
                            <td class="w-1/10 px-4 py-3 text-center"><button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('travel.edit', ['id' => $val->id]) }}">編集</a></button></td>
                            <form action="{{ route('travel.destroy', ['id' => $val->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td class="w-1/10 px-4 py-3 text-center"><input type="submit" value="削除" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick='return confirm("この旅程を削除しますか？")'></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
