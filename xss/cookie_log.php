<?php
foreach( $_GET as $key => $value ) {
  echo htmlspecialchars($key) . "=" . htmlspecialchars($value) . "<BR>";
  $s = serialize($value);
  file_put_contents('./cookie_log/' . md5($s), $s);
}