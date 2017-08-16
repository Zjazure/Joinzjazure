<?php
if(session_status()!=PHP_SESSION_ACTIVE)session_start();
require_once(dirname(__DIR__)."/class/member.class.php");

if(!isset($_SESSION["IsLogin"]))
    header("Location: login.php");

$action = $_GET["action"];
switch ($action)
{
    case "delete":delete($_GET["name"],$_GET["gender"],$_GET["grade"],$_GET["class"]);break;
}
header("Location: index.php");


function delete($name,$gender,$grade,$class)
{
    $mb = new member();
    $mb->name = $name;
    $mb->gender = $gender;
    $mb->grade = $grade;
    $mb->class = $class;
    return member::delete_member($mb);
}

?>
