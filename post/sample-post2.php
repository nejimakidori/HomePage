<!-- see:https://www.sejuku.net/blog/27843 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>POST_SAMPLE</title>
</head>
<body>

<?php
 echo "あなたの好きなものは「".$_POST["data"] ."」です。";
?>

<?php
require_once dirname(__FILE__) . '/../../DSN.php';

try {
  $pdo = new PDO("mysql:dbname=$dsn[dbname]; charset=utf8", $dsn['user'], $dsn['pass']);
  print '接続に成功しました。';
} catch(PDOException $e) {
  print "接続エラー:{$e->getMessage()}";
}
?>

<?php
  // INSERT文を変数に格納
  $sql = "insert into things (name) values (:name)";

  // 挿入する値は空のまま、SQL実行の準備をする
  $stmt = $pdo->prepare($sql);
  // 挿入する値を配列に格納する
  $params = array(':name' => $_POST["data"]);

  // 挿入する値が入った変数をexecuteにセットしてSQLを実行
  $stmt->execute($params);
?>

</form>
</body>
</html>