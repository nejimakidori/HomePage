<?php
$s = serialize(@$_GET['cookie']);
echo $s . "\n";
echo md5($s) . "\n";
$ret = file_put_contents('./cookie_log/' . md5($s), $s);
echo $ret;