<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>天気予報</title>
  </head>
  <body>
  <?php
    //
    // see : https://www.marineroad.com/staff-blog/18954.html
    // 

    // Get Tokyo weather
    // see:http://weather.livedoor.com/weather_hacks/webservice
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

    // セッションを終了
    curl_close($ch);
  ?>
  <table border="1">
    <tr>
      <td>時刻</td>
      <td><?php echo substr($result['description']['publicTime'], 0, 10) . ' ' . substr($result['description']['publicTime'], 11, 8) ?></td>
    </tr>
    <tr>
      <td>地域</td>
      <td><?php echo $result['title'] ?></td>
    </tr>
    <tr>
      <td>内容</td>
      <td><?php echo $result['description']['text'] ?></td>
    </tr>
    <tr>
      <td>copyright</td>
      <td><?php echo $result['copyright']['link'] ?></td>
    </tr>
    <tr>
      <td>copyright</td>
      <td><?php echo $result['copyright']['title'] ?></td>
    </tr>
  </table>
  </body>
</html>