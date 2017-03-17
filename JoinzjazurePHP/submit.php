

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
        `GroupValue` VARCHAR(45) NOT NULL,
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

$groupValue = 0;
if($_POST['counter'])
{
    foreach ($_POST['counter'] as $value)
        $groupValue+=$value;
}

$sql = "INSERT INTO $db_tbl (Name,Gender,Grade,Class,GroupValue,Email,Phone,QQ,Weibo,Description) VALUES ('$_POST[Name]','$_POST[Gender]','$_POST[Grade]','$_POST[Class]','$groupValue','$_POST[Email]','$_POST[Phone]','$_POST[QQ]','$_POST[Weibo]','$_POST[Description]')";
$result = $mysqli->query($sql);
if(!$result) die("Failed to insert");
$mysqli->close();
