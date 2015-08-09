<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MailSenderActionBody</title>
</head>
<?php

$mail = new PHPMailer();
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->Host = 'smtp.qq.com';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->FromName = 'Zjazure';
$mail->Username ='[Your QQ Number]';
$mail->Password = '[Your QQ Password / Mail independent Password]';
$mail->From = '[Your QQMail Address]';
$mail->isHTML(true); 
$mail->addAddress($arrayout['COL2'],'123');
$mail->Subject = '[Your Mail Subject]';
$mail->Body = "[Your Mail Body]";
$status = $mail->send();

if($status) {
 echo '发送邮件成功，邮件地址为:'.$arrayout['COL2']. "<br />";
 $finish++;
 $con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_query('SET NAMES utf8');
mysql_select_db("csv_db",$con);
mysql_query("UPDATE tbl_name SET item='Yes'
WHERE COL1='$arrayout[COL1]' AND COL2='$arrayout[COL2]'");
$count = mysql_fetch_array(mysql_query('SELECT COUNT(*) FROM tbl_name'));
echo "总共有".$count['COUNT(*)']."个人";
}else{
 echo '发送邮件失败，错误信息为：'.$mail->ErrorInfo;}
 
?>
<body>
</body>
</html>