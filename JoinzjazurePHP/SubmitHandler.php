
<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php

define('HOST','localhost');
define('USER','root');
define('PASSWD','');
define('DATABASENAME','joinzjazure');

$con = mysql_connect(constant("HOST"),constant("USER"),constant("PASSWD"));
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_query('SET NAMES utf8');
mysql_select_db(constant("DATABASENAME"),$con);
if(@$_POST['counter'])
{
    $fpGroup = fopen("GroupTemp.txt","a+");
    foreach (@$_POST['counter'] as $stringcounter)
    {
        fwrite($fpGroup,$stringcounter.",");

    }
    fclose($fpGroup);
    $getcontent = fopen("GroupTemp.txt","r");
    $TotalGroup = fgets($getcontent);
}
else{
    $TotalGroup = "None";
}

mysql_query("INSERT INTO newmembers (Name,Gender,Grade,Class,GroupName,Email,Phone,QQ,Weibo,Description) VALUE ('$_POST[Name]','$_POST[Gender]','$_POST[Grade]','$_POST[Class]','$TotalGroup','$_POST[Email]','$_POST[Phone]','$_POST[QQ]','$_POST[Weibo]','$_POST[Description]')");

?>
</body>
</html>