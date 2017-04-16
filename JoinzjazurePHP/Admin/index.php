<?php 
$page_title = "湛江一中IT社网络报名系统 管理后台";
$page_address = "../";
require(dirname(__DIR__)."/header.php");
require_once(dirname(__DIR__)."/class/member.class.php");
?>
<?php 
    if(!isset($_SESSION["IsLogin"]))
        header("Location: login.php");
?>
<body>
    <div class="container" style="background-color:rgba(255,255,255,0.83)">
        <div class="page-header">
            <h1>湛江一中IT社网络报名系统 管理后台<a href="logout.php" class="btn btn-info" style="float:right;margin-left:5px;">注销</a><a class="btn btn-info" style="float:right;" data-toggle="modal" data-target="#editDBModel">配置</a></h1>
        </div>
        <!--Dialog-->
        <div class="modal fade" id="editDBModel" tabindex="-1" role="dialog" aria-labelledby="editDBModel">
            <?php $conf = config::get_configs();?>
            <div class="modal-dialog" role="document">
                <form method="POST" action="editconfig.php">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="EditDatabaseTitle">配置</h4>
                    </div>
                    <div class="modal-body">
                        <h3>网站配置</h3>
                        <div class="form-group">
                            <label for="website-enable" class="control-label">是否启动网站</label>
                            <select class="form-control" id="website-enable" name="website-enable">
                            <option value ="Enabled" <?php if(isset($conf["website_enable"])&&($conf["website_enable"]=="Enabled"))echo("selected=\"selected\"");?>>启动</option>
                            <option value ="Disabled" <?php if(isset($conf["website_enable"])&&($conf["website_enable"]=="Disabled"))echo("selected=\"selected\"");?>>关闭</option>
                            </select>
                        </div>
                        <h3>数据库配置</h3>
                        <div class="form-group">
                            <label for="database-host" class="control-label">数据库主机</label>
                            <input type="text" class="form-control" id="database-host" name="database-host" value="<?php if(isset($conf["database_host"]))echo($conf["database_host"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="database-name" class="control-label">数据库名称</label>
                            <input type="text" class="form-control" id="database-name" name="database-name" value="<?php if(isset($conf["database_name"]))echo($conf["database_name"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="database-table" class="control-label">数据表名</label>
                            <input type="text" class="form-control" id="database-table" name="database-table" value="<?php if(isset($conf["database_table"]))echo($conf["database_table"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="database-user" class="control-label">用户名</label>
                            <input type="text" class="form-control" id="database-user" name="database-user" value="<?php if(isset($conf["database_user"]))echo($conf["database_user"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="database-pass" class="control-label">密码</label>
                            <input type="text" class="form-control" id="database-pass" name="database-pass" value="<?php if(isset($conf["database_pass"]))echo($conf["database_pass"]);?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        <!--visible-->
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年级</th>
                    <th>班级</th>
                    <th>小组</th>
                    <th>邮箱</th>
                    <th>手机</th>
                    <th>QQ</th>
                    <th>微博</th>
                    <th>简介</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $members = member::get_members();
                    if(isset($members))
                    {
                        foreach($members as $member)
                        {
                        ?>
                            <tr>
                            <th scope="row"><?php echo($member->name); ?></th>
                            <td><?php echo(($member->gender==1)?"男":"女"); ?></td>
                            <td><?php echo($member->grade); ?></td>
                            <td><?php echo($member->class); ?></td>
                            <td>
                            <?php
                                foreach($member->groups as $group)
                                    echo($group."<br/>");
                            ?>
                            </td>
                            <td><?php echo($member->email); ?></td>
                            <td><?php echo($member->phone); ?></td>
                            <td><?php echo($member->QQ); ?></td>
                            <td><?php echo($member->weibo); ?></td>
                            <td>
                            <?php
                                if(strlen($member->description)>100)
                                {
                                    ?><textarea class="form-control" id="message-text" style="resize:none;width:300px;height:100px;" readonly="readonly"><?php echo($member->description); ?></textarea><?php
                                }
                                else
                                    echo($member->description);
                            ?>                  
                            </td>
                            </tr>                     
                        <?php
                        }
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
        <?php require(dirname(__DIR__)."/footer.php");?>
    </div>
</body>
</html>