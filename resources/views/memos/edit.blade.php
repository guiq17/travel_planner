<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ編集画面
        </h2>
    </x-slot>
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
                <a type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" href="{{ route('memo.index', $travel_id) }}">一覧へ戻る</a>
            </div>
            <div class="m-5">
                @include('components.complete_message')
                @include('components.validate_message')
            </div>
            <form action="{{ route('memo.update', ['id' => $id, 'travel_id' => $travel_id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md bg-gradient-to-b from-indigo-400 to-cyan-400">
                @csrf
                <input type="hidden" value="{{ $travel_id }}" name="travel_id">
                <div class="mb-6">
                    <label for="title" class="block text-lg font-medium text-gray-700 pd-4">ノート</label>
                    <textarea class="w-full p-2 rounded-md border border-gray-300" name="note" cols="30" rows="10" placeholder="ノート入力">{{ old('note', $memo->note) }}</textarea>
                </div>
                <div class="mb-6">
                    <label for="title" class="block text-lg font-medium text-gray-700 pd-4">URL</label>
                    <input type="text" name="url" value="{{ old('url', $memo->url) }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="URL入力">
                </div>
                {{-- 保存ボタン --}}
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">保存</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>