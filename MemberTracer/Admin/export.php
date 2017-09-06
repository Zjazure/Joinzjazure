<?php
if(session_status()!=PHP_SESSION_ACTIVE)session_start();
require_once(dirname(__DIR__)."/class/member.class.php");
header("content-type:application/json;charset=utf8");
if(!isset($_SESSION["IsLogin"]))
{
    header("HTTP/1.1 401 Unauthorized",true,401);
    echo(json_encode(array("error"=>"Access Denied")));
    exit();
}
echo(json_encode(member::get_members(),JSON_UNESCAPED_UNICODE));