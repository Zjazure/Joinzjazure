<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="baidu-site-verification" content="GE3bEPSpwX" />
    <meta name="keywords" content="湛江一中,湛江一中IT社,IT社,湛江,社团" />
    <!--css files-->
	<link rel="stylesheet" href="Content/bootstrap.css">
	<link rel="stylesheet" href="Content/bootstrap.cosmo.css">
	<link rel="stylesheet" href="Content/site.css">
	<title>湛江一中IT社 网络报名系统</title>
</head>
<?php
$thisMonth = date("n");
echo $thisMonth;
if($thisMonth < 7){
	$grade1 = date("Y",strtotime("-1 year"));
	$grade2 = date("Y",strtotime("-2 year"));
}else{
	$grade1 = date("Y");
	$grade2 = date("Y",strtotime("-1 year"));
}
?>