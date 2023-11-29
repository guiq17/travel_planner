<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            持ち物リスト作成
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            {{-- 持ち物登録フォーム --}}
            <form action="{{ route('packing.create', ['travel_id' => $travel_id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md bg-gradient-to-b from-indigo-400 to-cyan-400">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    {{-- カテゴリー選択 --}}
                    <div class="col-span-2 mt-8">
                        <label for="category_id" class="block text-lg font-medium text-gray-700 pd-4">カテゴリー</label>
                        <select name="category_id" id="" class="w-full p-2 rounded-md border border-gray-300">
                            <option value="">カテゴリーを選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- 持ち物 --}}
                    <div class="col-span-2">
                        <label for="name" class="block text-lg font-medium text-gray-700">品名</label>
                        <input type="text" name="name" value="{{ old('name') }}" autocomplete="off" class="w-full p-2 rounded-md border border-gray-300" placeholder="品名を入力してください">
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