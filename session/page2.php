<?php
// see : http://phpspot.net/php/man/php/function.session-start.html
// page2.php

session_start();

echo 'Welcome to page #2<br />';

echo $_SESSION['favcolor']; // green
echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);

// page1.php と同様に、ここで SID を使うこともできます
echo '<br /><a href="page1.php">page 1</a>';
?>