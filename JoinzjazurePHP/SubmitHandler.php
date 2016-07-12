
<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="baidu-site-verification" content="GE3bEPSpwX" />
    <meta name="keywords" content="湛江一中,湛江一中IT社,IT社,湛江,社团" />
    <title>提交成功</title>
	<?php require("RenderScripts.php");?>
</head>
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
        <hr />
        <footer>
            <p>&copy; 2013 - 2016 湛江一中IT社 保留所有权利</p>
        </footer>
    </div> 
</body>

<?php

define('HOST','localhost');
define('USER','root');
define('PASSWD','root');
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
unlink("QuestionAnswer.txt");
unlink("GroupTemp.txt");
?>
</html>