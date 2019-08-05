<html>
  <body>
  <?php
    //
    // see : https://www.marineroad.com/staff-blog/18954.html
    // 

    // 東京の天気
    $url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=130010";
    //$url = "https://qiita.com/api/v2/items";

    // cURLセッションを初期化
    $ch = curl_init();

    // オプションを設定
    curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

    // URLの情報を取得
    $response =  curl_exec($ch);

    // 取得結果を表示
    //echo $response;
    $result = json_decode($response, true);
    foreach($result as $key => $value) {
      if (gettype($value) == 'array') {
        foreach($value as $key2 => $value2) {
          if (gettype($value2) == 'array') {
            foreach($value2 as $key3 => $value3) {
              echo "{$key3} => {$value3} ";
              echo '<br>';
            }
          } else {
            echo "{$key2} => {$value2} ";
            echo '<br>';
          }
        }
      } else {
        echo "{$key} => {$value} ";
        echo '<br>';
      }
    }

    // セッションを終了
    curl_close($ch);
  ?>
  </body>
</html>