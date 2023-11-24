<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規しおり作成
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
        <a type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" href="{{ route('travel.list') }}">一覧へ戻る</a>
    </div>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="container px-5 py-5 mx-auto">
            {{-- 新規しおり登録フォーム --}}
            <form action="{{ route('travel.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                {{-- タイトル入力 --}}
                <div class="mb-6">
                    <label for="title" class="block text-lg font-medium text-gray-700 pd-4">タイトル</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="タイトル入力">
                </div>
                {{-- 開始日入力 --}}
                <div class="mb-6">
                    <label for="start_date" class="block text-lg font-medium text-gray-700">出発日</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="出発日入力">
                </div>
                {{-- 終了日入力 --}}
                <div class="mb-6">
                    <label for="end_date" class="block text-lg font-medium text-gray-700">帰宅日</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="帰宅日入力">
                </div>
                {{-- 保存ボタン --}}
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">保存</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>