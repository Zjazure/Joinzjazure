<?php if(session_status()!=PHP_SESSION_ACTIVE)session_start();?>
<?php
unset($_SESSION["IsLogin"]);
session_destroy();
header("Location: login.php");