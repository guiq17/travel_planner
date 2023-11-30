<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           スケジュール編集画面
        </h2>
    </x-slot>
    @include('components.complete_message')
    @include('components.validate_message')
    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8">
        <a type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" href="{{ route('schedule.index', ['travel_id' => $travel_id]) }}">一覧へ戻る</a>
    </div>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="container px-5 py-5 mx-auto">
            {{-- スケジュール編集フォーム --}}
            <form action="{{ route('schedule.update', ['id' => $id, 'travel_id' => $travel_id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" value="{{ $travel_id }}" name="travel_id">
                {{-- 日付 --}}
                <div class="mb-6">
                    <label for="date" class="block text-lg font-medium text-gray-700 pd-4">日付</label>
                    <input type="date" name="date" value="{{ old('date', $schedule->date) }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="日付">
                </div>
                {{-- 開始時間入力 --}}
                <div class="mb-6">
                    <label for="start_time" class="block text-lg font-medium text-gray-700">開始時間</label>
                    <input type="time" name="start_time" value="{{ substr($schedule->start_time, 0, 5) }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="出発日入力">
                </div>
                {{-- 終了時間入力 --}}
                <div class="mb-6">
                    <label for="end_time" class="block text-lg font-medium text-gray-700">終了時間</label>
                    <input type="time" name="end_time" value="{{ substr($schedule->end_time, 0, 5) }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="帰宅日入力">
                </div>
                {{-- 内容 --}}
                <div class="mb-6">
                    <label for="event" class="block text-lg font-medium text-gray-700">内容</label>
                    <input type="text" name="event" value="{{ old('event', $schedule->event) }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="内容を記載してください(例：東京タワーに行こう！">
                </div>
                {{-- 参考HP --}}
                <div class="mb-6">
                    <label for="url" class="block text-lg font-medium text-gray-700">参考HP</label>
                    <input type="text" name="url" value="{{ old('url', $schedule->url) }}" min="{{ now()->toDateString() }}" class="w-full p-2 rounded-md border border-gray-300" placeholder="URL入力(例http://www.gogle.co.jp)">
                </div>
                {{-- アイコン --}}
                <div class="mb-6 checkbox-icon">
                <label for="car">
                    <input type="radio" name="icon" id="car" value="car" {{ $schedule->icon === 'car' ? 'checked' : '' }}>
                    <i class="fas fa-car fa-2x"></i>
                </label>
                <label for="subway">
                    <input type="radio" name="icon" id="subway" value="subway" {{ $schedule->icon === 'subway' ? 'checked' : '' }}>
                    <i class="fas fa-subway fa-2x"></i>
                </label>
                <label for="plane">
                    <input type="radio" name="icon" id="plane" value="plane" {{ $schedule->icon === 'plane' ? 'checked' : '' }}>
                    <i class="fas fa-plane fa-2x"></i>
                </label>
                <label for="ship">
                    <input type="radio" name="icon" id="ship" value="ship" {{ $schedule->icon === 'ship' ? 'checked' : '' }}>
                    <i class="fas fa-ship fa-2x"></i>
                </label>
                <label for="bicycle">
                    <input type="radio" name="icon" id="bicycle" value="bicycle" {{ $schedule->icon === 'bicycle' ? 'checked' : '' }}>
                    <i class="fas fa-bicycle fa-2x"></i>
                </label>
                <label for="shoe-prints">
                    <input type="radio" name="icon" id="shoe-prints" value="shoe-prints" {{ $schedule->icon === 'shoe-prints' ? 'checked' : '' }}>
                    <i class="fas fa-shoe-prints fa-2x"></i>
                </label>
                <label for="shopping-cart">
                    <input type="radio" name="icon" id="shopping-cart" value="shopping-cart" {{ $schedule->icon === 'shopping-cart' ? 'checked' : '' }}>
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </label>
                <label for="utensil-spoon">
                    <input type="radio" name="icon" id="utensil-spoon" value="utensil-spoon" {{ $schedule->icon === 'utensil-spoon' ? 'checked' : '' }}>
                    <i class="fas fa-utensil-spoon fa-2x"></i>
                </label>
                <label for="coffee">
                    <input type="radio" name="icon" id="coffee" value="coffee" {{ $schedule->icon === 'coffee' ? 'checked' : '' }}>
                    <i class="fas fa-coffee fa-2x"></i>
                </label>
                <label for="beer">
                    <input type="radio" name="icon" id="beer" value="beer" {{ $schedule->icon === 'beer' ? 'checked' : '' }}>
                    <i class="fas fa-beer fa-2x"></i>
                </label>
                <label for="bed">
                    <input type="radio" name="icon" id="bed" value="bed" {{ $schedule->icon === 'bed' ? 'checked' : '' }}>
                    <i class="fas fa-bed fa-2x"></i>
                </label>
                <label for="hot-tub">
                    <input type="radio" name="icon" id="hot-tub" value="hot-tub" {{ $schedule->icon === 'hot-tub' ? 'checked' : '' }}>
                    <i class="fas fa-hot-tub fa-2x"></i>
                </label>
                <label for="mountain">
                    <input type="radio" name="icon" id="mountain" value="mountain" {{ $schedule->icon === 'mountain' ? 'checked' : '' }}>
                    <i class="fas fa-mountain fa-2x"></i>
                </label>
                <label for="swimmer">
                    <input type="radio" name="icon" id="swimmer" value="swimmer" {{ $schedule->icon === 'swimmer' ? 'checked' : '' }}>
                    <i class="fas fa-swimmer fa-2x"></i>
                </label>
                <label for="republican">
                    <input type="radio" name="icon" id="republican" value="republican" {{ $schedule->icon === 'republican' ? 'checked' : '' }}>
                    <i class="fas fa-republican fa-2x"></i>
                </label>
                </div>
                {{-- 保存ボタン --}}
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">保存</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
