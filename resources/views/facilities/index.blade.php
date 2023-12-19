<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            施設検索
        </h2>
    </x-slot>
    <div class="flex justify-center items-center min-h-screen" style="background-image: url('/images/main_bg6.jpeg'); background-size: cover;">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-md max-w-5xl">
            {{-- 施設検索フォーム --}}
            <form action="{{ route('facility.search') }}" method="GET" class="bg-white p-6 rounded-lg shadow-md bg-gradient-to-b from-indigo-400 to-cyan-400">
                <div>
                    <div>
                        <input type="hidden" name="country" value="japan">
                        <label for="prefecture">都道府県:</label>
                        <select id="prefecture" name="prefecture">
                            <option value="">選択してください</option>
                            @foreach($area_data as $prefecture)
                                <option value="{{ $prefecture['code'] }}">{{ $prefecture['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="city">市区町村:</label>
                        <select id="city" name="city">
                            <option value="">選択してください</option>
                        </select>
                    </div>
                    <div>
                        <label for="region">地域:</label>
                        <select id="region" name="region">
                            <option value="">選択してください</option>
                        </select>
                    </div>
                </div>
                {{-- 検索ボタン --}}
                <div class="mt-20">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">検索</button>
                </div>
            </form>
            {{-- 施設情報の表示 --}}
            <div>
                @if(!empty($hotel_info))
                <div>
                    <h1>検索結果</h1>
                    @foreach ($hotel_info as $hotel)
                        <div>
                            <h2 class="my-4">{{ $hotel['hotel'][0]['hotelBasicInfo']['hotelName'] }}</h2>
                            <p>{{ $hotel['hotel'][0]['hotelBasicInfo']['hotelSpecial'] }}</p>
                        </div>
                    @endforeach
                    <div>
                        @if ($paging_info['page'] > 1)
                            <a href="{{ route('facility.search', ['page' => $paging_info['page'] - 1]) }}">前のページ</a>
                        @endif
                        @if ($paging_info['page'] < $paging_info['pageCount'])
                            <a href="{{ route('facility.search', ['page' => $paging_info['page'] + 1]) }}">次のページ</a>
                        @endif
                    </div>
                </div>
                @else
                    <div>
                        <p>ホテル情報が見つかりませんでした。</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
<script src="{{ asset('/js/area.js') }}"></script>