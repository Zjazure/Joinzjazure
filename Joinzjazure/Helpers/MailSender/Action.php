<!DOCTYPE html>
<head>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <title>Automatic Mail Sender GUI</title>

</head>

<body>

<?php

include ("ConnectDatabase.php");
include ("class.phpmailer.php");
include ("class.smtp.php");
$mail = new PHPMailer();
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->Host = 'smtp.qq.com';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->FromName = 'Zjazure';
$mail->Username ='1546998232';
$mail->Password = 'LSY040343';
$mail->From = '1546998232@qq.com';
$mail->isHTML(true);
foreach ($_POST['sub'] as $result)
{
    $mailaddress = mysql_fetch_array(mysql_query("SELECT * FROM tbl_name WHERE COL1 = '$result'"));

    if ($mailaddress['item'] == "")
    {
        $mail->addAddress($mailaddress['COL2'],'$mailaddress[COL2]');
        $mail->Subject = '湛江一中IT社面试通知';
        $mail->Body = $result.constant("DETAILS");
        $status = $mail->send();
        if($status)
        {
            echo '发送邮件成功，发给了  '.$result.'  邮件地址为:'.$mailaddress['COL2']. "<br />";
            mysql_query("UPDATE tbl_name SET item='Yes' WHERE COL1 ='$result'");

        }else{
            echo '发送邮件失败，错误信息为：'.$mail->ErrorInfo;

        }
    }else
    {
        echo "The Person ".$result."  ".$mailaddress['COL2']." exists something wrong.Please check your select.";

    }

sleep(2);
}



?>

</body>
</html>
