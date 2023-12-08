<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            施設検索
        </h2>
    </x-slot>
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            {{-- 施設検索フォーム --}}
            <form action="{{ route('facility.search') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md bg-gradient-to-b from-indigo-400 to-cyan-400">
                @csrf
                <div class="">
                    {{-- カテゴリー選択 --}}
                    <div>
                        <label for="pref">都道府県:</label>
                        <select id="pref" onchange="loadCities()">
                            <option value="">選択してください</option>
                            {{-- @foreach($areas[1]['middleClasses'] as $middleClassGroup)
                                @foreach($middleClassGroup['middleClass'] as $middleClass)
                                    @if(isset($middleClass['middleClassCode']) && isset($middleClass['middleClassName']))
                                        <option value="{{ $middleClass['middleClassCode'] }}">{{ $middleClass['middleClassName'] }}</option>
                                    @endif
                                @endforeach
                            @endforeach --}}
                        </select>
                    </div>
                    <div>
                        <label for="city">市区町村:</label>
                        <select id="city" onchange="loadRegions()">
                            <option value="">選択してください</option>
                        </select>
                    </div>
                    <div>
                        <label for="region">地域:</label>
                        <select id="region">
                            <option value="">選択してください</option>
                        </select>
                    </div>
                </div>
                {{-- 検索ボタン --}}
                <div class="mt-20">
                    {{-- <a class="inline-block px-4 py-2 mr-2 bg-white text-red-500 border-2 border-red-500 rounded-md hover:bg-red-500 hover:text-white" href="{{ route('packing.index', ['travel_id' => $travel_id]) }}">キャンセル</a> --}}
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">検索</button>
                </div>
            </form>
            <div>
                {{-- @if(count($facilities) > 0)
                    <ul>
                        @foreach($facilities as $facility)
                            <li>{{ $facility['hotel'][0]['hotelBasicInfo']['hotelName'] }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No facilities found.</p>
                @endif --}}
            </div>
        </div>
    </div>
</x-app-layout>