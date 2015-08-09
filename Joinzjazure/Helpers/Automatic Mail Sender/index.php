<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JoinZjazureAutomaticMailSender</title>
<script type="text/javascript">
 function formSubmit(){
	 document.getElementById("send").submit();
	 }
</script>
</head>
<?PHP
include("class.phpmailer.php"); 
include("class.smtp.php");
$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_query('SET NAMES utf8');
mysql_select_db("csv_db",$con);
$out=mysql_query("SELECT * FROM tbl_name");

do
{   
	Sender:
	$arrayout = mysql_fetch_array($out);
	if ($arrayout['item'] != "Yes")
	{
	include("Sender.php");
	sleep(4);
	$nokori = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbl_name WHERE item != 'Yes'"));
	}else 
	{
		goto Sender;
	}
}while ($nokori['COUNT(*)'] != 0)






?>
<body>
</body>
</html>