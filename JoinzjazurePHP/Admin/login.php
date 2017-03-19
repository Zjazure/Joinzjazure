<?php 
$page_title = "湛江一中IT社网络报名系统 管理后台 - 登录";
$page_address = "../";
require(dirname(__DIR__)."/header.php");
require(dirname(__DIR__)."/class/config.class.php");
$conf = config::get_configs();
?>
<?php 
    //if(isset($_SESSION["IsLogin"]))
        //header("Location: index.php");
?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        //if password not set
        if(!isset($conf["manage_pass_md5"])&&isset($_POST["Password"])&&($_POST["Password"]!=""))
        {
            config::set_config("manage_pass_md5",md5($_POST["Password"]));
            header("Location: login.php");
        }
        if((isset($_POST["Password"]))&&(md5($_POST["Password"])==$conf["manage_pass_md5"]))
        {
            $_SESSION["IsLogin"] = "yes";
            header("Location: index.php");
        }
        else
            $is_pass_error = true;
    }
?>
<body>
    <div class="container" style="background-color:rgba(255,255,255,0.83)">
        <div class="page-header">
            <h1>湛江一中IT社网络报名系统 管理后台 - 登录</h1>
        </div>
        <?php if(isset($is_pass_error)&&$is_pass_error==true) echo("<div class=\"alert alert-danger\">管理密码错误</div>");?>
        <div class="row">           
                <form method="POST">
                <div class="col-md-offset-2 col-md-6">
                    <div class="form-group">
                        <input type="password" class="form-control" Name="Password" id="Password" placeholder="<?php echo(isset($conf["manage_pass_md5"])?"管理密码":"设置管理密码"); ?>">
                    </div>
                </div>
                <div class="col-md-md-2">
                    <button type="submit" class="btn btn-info"><?php echo(isset($conf["manage_pass_md5"])?"登录":"设置密码"); ?></button>
                </div>
                </form>
        </div>
        <?php require(dirname(__DIR__)."/footer.php");?>
    </div>
</body>
