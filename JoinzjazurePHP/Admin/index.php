<?php 
$page_title = "湛江一中IT社网络报名系统 管理后台";
$page_address = "../";
require(dirname(__DIR__)."/header.php");
require(dirname(__DIR__)."/class/member.class.php");
?>
<?php 
    if(!isset($_SESSION["IsLogin"]))
        header("Location: login.php");
?>
<body>
    <div class="container" style="background-color:rgba(255,255,255,0.83)">
<<<<<<< HEAD
<<<<<<< HEAD
        <div class="page-header">
            <h1>湛江一中IT社网络报名系统 管理后台</h1>
        </div>
=======
>>>>>>> origin/PHP-build
=======
>>>>>>> origin/PHP-build
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
                    <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $members = member::get_members();
                    foreach($members as $member)
                    {
                    ?>
                        <tr>
                        <th scope="row"><?php echo($member->name); ?></th>
                        <td><?php echo($member->gender); ?></td>
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
                        <td><?php echo($member->description); ?></td>
                        <td>
                            <?php $id = urlencode($member->get_pk_json()); ?>
                            <a class="btn btn-success" href="index.php?action=edit&id=<?php echo($id);?>" role="button">编辑</a>
                            <a class="btn btn-danger" href="index.php?action=delete&id=<?php echo($id);?>" role="button">删除</a>
                        </td>
                        </tr>                     
                    <?php
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php require(dirname(__DIR__)."/footer.php");?>