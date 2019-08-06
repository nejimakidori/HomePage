<?php
try {
  $sql = new PDO ('mysql:dbname=mf; charset=utf8', 'root', 'yoro12');
  print '接続に成功しました。';
} catch (PDOException $e) {
  print "接続エラー:{$e->getMessage()}";
}
?>

<?php
  foreach($pdo->query('select name,description,score from favorites') as $row) {
    echo '<p>';
    echo $row ['name'], ':';
    echo $row ['description'], ':';
    echo $row ['score'];
    echo '</p>';
}
?>