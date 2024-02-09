<?php
unset($_SESSION['steamid']);
unset($_SESSION['steam_uptodate']);
setcookie('PHPSESSID', null, -1, '/');

header("Location: ../index.php");
?>