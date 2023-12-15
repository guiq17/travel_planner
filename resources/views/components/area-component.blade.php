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