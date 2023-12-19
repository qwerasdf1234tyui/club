<?php
$_SESSION = array();
session_destroy();
header("Location: ../saruul/login.php");
exit();
?>