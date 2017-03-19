<?php 
$page_title = "湛江一中IT社网络报名系统 管理后台";
$page_address = "../";
require(dirname(__DIR__)."/header.php");
?>
<body style="background-color:rgba(255,255,255,0.83)">
<?php 
    if(!isset($_SESSION["IsLogin"]))
        header("Location: login.php");
?>
</body>
<?php require(dirname(__DIR__)."/footer.php");?>