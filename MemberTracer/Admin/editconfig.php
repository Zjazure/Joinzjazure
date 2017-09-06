<?php if(session_status()!=PHP_SESSION_ACTIVE)session_start();?>
<?php require_once(dirname(__DIR__)."/class/config.class.php");?>
<?php
if(!isset($_SESSION["IsLogin"]))
     header("Location: login.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    config::set_config("database_host",isset($_POST["database-host"])?$_POST["database-host"]:"");
    config::set_config("database_name",isset($_POST["database-name"])?$_POST["database-name"]:"");
    config::set_config("database_pass",isset($_POST["database-pass"])?$_POST["database-pass"]:"");
    config::set_config("database_user",isset($_POST["database-user"])?$_POST["database-user"]:"");
    config::set_config("database_table",isset($_POST["database-table"])?$_POST["database-table"]:"");
    config::set_config("website_enable",isset($_POST["website-enable"])?$_POST["website-enable"]:"");
}
header("Location: index.php");