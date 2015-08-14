<!DOCTYPE html>

<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <title>Automatic Mail Sender GUI</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://v3.bootcss.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sendmail").hide();
			$("#set").hide();
			$("#status").show();
        });
		function viewstatus()
		{
			$("#sendmail").hide();
			$("#set").hide();
			$("#status").show();
		}
		function sendmail()
		{
			$("#status").hide();
			$("#set").hide();
			$("#sendmail").show();
		}
		function set()
		{
			$("#sendmail").hide();
			$("#status").hide();
			$("#set").show();
		}
    </script>
    </head>
<style>
    body
    {
       overflow-x: hidden;
       overflow-y: hidden;
    }
</style>

<body>


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="cursor:pointer">Automatic Mail Sender</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a onclick="viewstatus();" style="cursor: pointer;">View Status</a></li>
                <li><a onClick="sendmail();" style="cursor: pointer;">Send Mail</a></li>
                <li><a href="Settings.php">Settings</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="">© 2015 Zjazure</a></li>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div id="status" class="container">
<div class="jumbotron" id="status"">

    <?php
    include ("Status.php");
    ?>

</div>
</div>

<div id="sendmail" class="container">
    <div class="jumbotron" id="sendmail">
        <?php
        include ("SendMail.php");
        ?>

    </div>
</div>


</body>
</html>