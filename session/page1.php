<?php
// see : http://phpspot.net/php/man/php/function.session-start.html
// page1.php

session_start();

echo 'Welcome to page #1';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();

// セッションクッキーが有効なら動作します
echo '<br /><a href="page2.php">page 2</a>';

// あるいは必要に応じてセッション ID を渡します
echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
?>