$(document).ready(function () {
    // 都道府県選択時のイベント
    $('#prefecture').change(function () {
        // 選択された都道府県コードを取得
        var pref_code = $(this).val();

        // Ajaxで市町村のデータを取得
        $.ajax({
            url: "/getCities",
            type: "GET",
            data: {
                pref_code: pref_code
            },
            dataType: "json",
            success: function (data) {
                // 2つ目のセレクトボックスを初期化
                $('#city').empty();
                // 選択してくださいのオプションを追加
                $('#city').append('<option value="">選択してください</option>');
                // 取得した市町村データをセレクトボックスに追加
                for (var i = 0; i < data.cities.length; i++) {
                    $('#city').append('<option value="' + data.cities[i]['code'] + '">' + data.cities[i]['name'] + '</option>');
                }
            },
            error: function (xhr, status, error) {
                // エラーが発生した場合
                console.error('Ajax request failed. Status:' + status + ', Error:' + error);
            }
        });
    });

    // 市町村選択時のイベント
    $('#city').change(function () {
        // 選択された市町村コードを取得
        var city_code = $(this).val();

        // Ajaxで地域のデータを取得
        $.ajax({
            url: "getRegions",
            type: "GET",
            data: {
                city_code: city_code
            },
            dataType: "json",
            success: function (data) {
                // 3つ目のセレクトボックスを初期化
                $('#region').empty();
                // 選択してくださいのオプションを追加
                $('#region').append('<option value="">選択してください</option>');
                // 取得した地域データをセレクトボックスに追加
            }
        })
    })
});