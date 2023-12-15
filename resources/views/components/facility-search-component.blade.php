<div>
    @if(isset($searchResults))
    <div>
        <h2>検索結果</h2>
        {{-- 検索結果の表示 --}}
        @foreach ($searchResults as $result)
            <div>
                {{-- 結果の表示 --}}
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