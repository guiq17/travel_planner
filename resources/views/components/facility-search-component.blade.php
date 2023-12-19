@props(['hotelInfo' => [], 'pagingInfo' => []])
<div>
    @if(isset($hotelInfo))
    <div>
        <h2>検索結果</h2>
        {{-- 検索結果の表示 --}}
        @foreach ($hotelInfo as $hotel)
            <div>
                {{-- 結果の表示 --}}
                <h3>{{ $hotel['hotel'][0]['hotelBasicInfo']['hotelName'] }}</h3>
                <p>{{ $hotel['hotel'][0]['hotelBasicInfo']['hotelSpecial'] }}</p>
            </div>
        @endforeach

        {{-- ページングリンクの表示 --}}
        <div>
            @if ($pagingInfo['page'] > 1)
                <a href="{{ route('facility.search', ['page' => $pagingInfo['page'] - 1]) }}">前のページ</a>
            @endif

            @if ($pagingInfo['page'] < $pagingInfo['pageCount'])
                <a href="{{ route('facility.search', ['page' => $pagingInfo['page'] + 1]) }}">次のページ</a>
            @endif
        </div>
    </div>
    @endif
</div>