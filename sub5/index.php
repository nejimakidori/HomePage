<html>
  <body>
  <?php
    //
    // see : https://www.marineroad.com/staff-blog/18954.html
    // 

    // 東京の天気
    $url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=130010";

    // cURLセッションを初期化
    $ch = curl_init();

    // オプションを設定
    curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

    // URLの情報を取得
    $response =  curl_exec($ch);
    $result = json_decode($response, true);

    // Get Tokyo weather
    // see:http://weather.livedoor.com/weather_hacks/webservice
    echo $result['title'];
    echo '<br>';
    echo $result['description']['text'];
    echo '<br>';
    echo $result['copyright']['link'];
    echo '<br>';
    echo $result['copyright']['title'];
    echo '<br>';

    // セッションを終了
    curl_close($ch);
  ?>
  </body>
</html>