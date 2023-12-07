<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            しおりの編集
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            {{-- しおり編集フォーム --}}
            <form action="{{ route('travel.update', ['id' => $travel->id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md bg-gradient-to-b from-indigo-400 to-cyan-400">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-6">
                    {{-- タイトル入力 --}}
                    <div class="col-span-2 mt-8">
                        <label for="title" class="block text-lg font-medium text-gray-700 pd-4">タイトル</label>
                        <input type="text" name="title" value="{{ $travel->title }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="タイトル入力">
                    </div>
                    {{-- 開始日入力 --}}
                    <div>
                        <label for="start_date" class="block text-lg font-medium text-gray-700">出発日</label>
                        <input type="date" name="start_date" value="{{ $travel->start_date }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="出発日入力">
                    </div>
                    {{-- 終了日入力 --}}
                    <div>
                        <label for="end_date" class="block text-lg font-medium text-gray-700">帰宅日</label>
                        <input type="date" name="end_date" value="{{ $travel->end_date }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="帰宅日入力">
                    </div>
                </div>
                {{-- 保存ボタン --}}
                <div class="mt-20">
                    <button type="submit" class="inline-block px-4 py-2 mr-2 bg-white text-red-500 border-2 border-red-500 rounded-md hover:bg-red-500 hover:text-white"><a href="{{ route('travel.list') }}">キャンセル</a></button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">保存</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>