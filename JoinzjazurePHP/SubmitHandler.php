<?php require("header.php");?>
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

$db_host = 'localhost';
$db_name = 'joinzjazure';
$db_user = 'root';
$db_pwd = 'root';

$mysqli = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);
if (!$mysqli)
{
    echo mysqli_connect_error();
}
$mysqli->set_charset("utf8");
if($_POST['counter'])
{
    $fpGroup = fopen("GroupTemp.txt","a+");
    foreach ($_POST['counter'] as $stringcounter)
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

$sql = "INSERT INTO newmembers (Name,Gender,Grade,Class,GroupName,Email,Phone,QQ,Weibo,Description) VALUE ('$_POST[Name]','$_POST[Gender]','$_POST[Grade]','$_POST[Class]','$TotalGroup','$_POST[Email]','$_POST[Phone]','$_POST[QQ]','$_POST[Weibo]','$_POST[Description]')";
$result = $mysqli->query($sql);
$mysqli->close();
unlink("QuestionAnswer.txt");
unlink("GroupTemp.txt");
require("footer.php");
?>
</div> 
</body>