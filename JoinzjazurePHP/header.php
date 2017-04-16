<?php if(session_status()!=PHP_SESSION_ACTIVE)session_start();?>
<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="baidu-site-verification" content="GE3bEPSpwX" />
    <meta name="keywords" content="湛江一中,湛江一中IT社,IT社,湛江,社团" />
    <!--css files-->
	<link rel="stylesheet" href="<?php if(isset($page_address)) echo($page_address); ?>Content/bootstrap.css">
	<link rel="stylesheet" href="<?php if(isset($page_address)) echo($page_address); ?>Content/bootstrap.cosmo.css">
	<link rel="stylesheet" href="<?php if(isset($page_address)) echo($page_address); ?>Content/site.css">
	<title><?php echo($page_title);?></title>
</head>
<body>