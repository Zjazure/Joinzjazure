<?php require("Header.php");?>
<body>
    <div class="container" style="background-color:rgba(255,255,255,0.83)">
        <div class="page-header">
            <h1>湛江一中IT社 网络报名系统</h1>
        </div>
		<h2 class="alert alert-success">谢谢！报名信息已成功提交</h2>
		<h3>湛江一中IT社QQ群: 294013796</h3>
		<p>加入时请注明班级，姓名，防止被拒绝</p>
		<h3>湛江一中IT社微博: <a href="http://weibo.com/zjazure" target="_blank">@湛江一中IT社</a></h3>
		<h3>2014年社团招新由湛江一中社团部统一进行</h3>
		<h3>面试与活动的通知请密切关注社团部通知以及我们的微博</h3>
    

<?php
function table_exist_or_create($tablename,$dbname,$mysqli)
{
    $sql = "select * from information_schema.TABLES where table_schema='$dbname' and table_name='$tablename'";
    $result = $mysqli->query($sql);
    if($result->num_rows==0)
    {
        $sql = "
        CREATE TABLE `$dbname`.`$tablename` (
        `Name` VARCHAR(45) NOT NULL,
        `Gender` VARCHAR(45) NOT NULL,
        `Grade` VARCHAR(45) NOT NULL,
        `Class` VARCHAR(45) NOT NULL,
        `GroupName` VARCHAR(45) NOT NULL,
        `Email` VARCHAR(45) NOT NULL,
        `Phone` VARCHAR(45) NOT NULL,
        `QQ` VARCHAR(45) NOT NULL,
        `Weibo` VARCHAR(45) NOT NULL,
        `Description` VARCHAR(45) NOT NULL);
        ";
        return $mysqli->query($sql);
    }
    else
        return true;
}
function load_json_config()
{
    if(file_exists("config.json")){ 
        $content = file_get_contents("config.json"); 
        $json = json_decode($content,true); 
    }
    return $json;
}
if(session_status()!=PHP_SESSION_ACTIVE)session_start();

$conf = load_json_config();
$db_host = $conf["database_host"];
$db_name = $conf["database_name"];
$db_user = $conf["database_user"];
$db_pwd = $conf["database_pass"];
$db_tbl = $conf["database_table"];


$mysqli = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);
if (!$mysqli)
{
    echo mysqli_connect_error();
}
$mysqli->set_charset("utf8");
if(!table_exist_or_create($db_tbl,$db_name,$mysqli)) die("Failed to connect to specified table");


if($_POST['counter'])
{
    $GroupNameCounter = '';
    foreach ($_POST['counter'] as $stringcounter)
    {
        $GroupNameCounter = $GroupNameCounter.' '.$stringcounter;

    }
$TotalGroup = $GroupNameCounter;
}
else{
    $TotalGroup = "None";
}

$sql = "INSERT INTO $db_tbl (Name,Gender,Grade,Class,GroupName,Email,Phone,QQ,Weibo,Description) VALUES ('$_POST[Name]','$_POST[Gender]','$_POST[Grade]','$_POST[Class]','$TotalGroup','$_POST[Email]','$_POST[Phone]','$_POST[QQ]','$_POST[Weibo]','$_POST[Description]')";
$result = $mysqli->query($sql);
if(!$result) die("Failed to insert");
$mysqli->close();
session_destroy();
require("footer.php");
?>
</div> 
</body>
