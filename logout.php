<?php
session_start();
session_unset();
$_SESSION['logged_in'] =false;
session_destroy();
header("location:index.php");
exit;
?>