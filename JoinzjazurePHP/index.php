<?php
$page_title = "湛江一中IT社 网络报名系统";
require("header.php");
require_once(__DIR__."/class/verification-code.class.php");
require_once(__DIR__."/class/groups.class.php");
require_once(__DIR__."/class/config.class.php");
$conf = config::get_configs();
$anouncements = json_decode(file_get_contents(__DIR__."/JsonData/Anouncement.json"),true);

?>
<div class="container" style="background-color:rgba(255,255,255,0.83)">
    <div class="page-header">
        <h1>湛江一中IT社 网络报名系统</h1>
    </div>
<?php
if((!isset($conf["website_enable"]))||$conf["website_enable"]!="Enabled")
    if(isset($anouncements["DisabledSubmit"])) echo($anouncements["DisabledSubmit"]);
?>
<?php if(isset($anouncements["Index"])&&$anouncements["Index"]!="")
{
    echo("<div class=\"alert alert-info\">");
    echo($anouncements["Index"]);
    echo("</div>");
}
?>
    <form id="checkHandler" name="checkHandler" method="post" action="submit.php">
        <div class="row">
            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="Name">姓名</label>
                <span class="label label-info">必填</span>
                <input class="form-control text-box single-line" data-val="true" data-val-maxlength="名字不要这么长好吗" data-val-maxlength-max="10" data-val-regex="你填的是真实姓名吗" data-val-regex-pattern="^[\u4e00-\u9fa5]{2,}$" data-val-required="什么？你是无名氏？" id="Name" name="Name" type="text" value="">
                <span class="field-validation-valid text-warning" data-valmsg-for="Name" data-valmsg-replace="true"></span>
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="Gender">性别</label>
                <span class="label label-info">必填</span>
                <select class="form-control valid" data-val="true" data-val-required="The 性别 field is required." id="Gender" name="Gender" aria-required="true" aria-invalid="false" aria-describedby="Gender-error">
                    <option value="True">汉子</option>
                    <option value="False">妹纸</option>
                </select>
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="Grade">年级</label>
                <span class="label label-info">必填</span>
                <select class="form-control valid" data-val="true" data-val-number="The field 年级 must be a number." data-val-required="The 年级 field is required." id="Grade" name="Grade" aria-required="true" aria-invalid="false" aria-describedby="Grade-error">
                    <?php       
                    if(date("n") < 7){
                        $grade1 = date("Y",strtotime("-1 year"));
                        $grade2 = date("Y",strtotime("-2 year"));
                    }else{
                        $grade1 = date("Y");
                        $grade2 = date("Y",strtotime("-1 year"));
                    }
                    ?>
                    <option value="<?php echo $grade1?>">高一(<?php echo $grade1?>年入学)</option>
                    <option value="<?php echo $grade2?>">高二(<?php echo $grade2?>年入学)</option>
                </select>
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="Class">班级</label>
                <span class="label label-info">必填</span>
                <input class="form-control text-box single-line" data-val="true" data-val-number="The field 班级 must be a number." data-val-range="同学你走错班了" data-val-range-max="42" data-val-range-min="1" data-val-required="填写班级，福利送上门哦" id="Class" name="Class" placeholder="1 - 42" type="number" value="">
                <span class="field-validation-valid text-warning" data-valmsg-for="Class" data-valmsg-replace="true"></span>
            </div>


        </div>

        <div class="form-group">
            <label>兴趣与方向</label>
            <span class="label label-info">选择你的兴趣</span>
            <input data-val="true" data-val-number="The field 小组 must be a number." data-val-required="请至少选择一个小组" id="Groups" name="Groups" type="hidden" value="0">
            <div class="container">
                <div class="row show-grid">
                <?php
                foreach(group::get_groups() as $group)
                {
                    ?>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                        <input type='checkbox' id='<?php echo($group->id); ?>' name='counter[]' value='<?php echo($group->id); ?>'/>
                        <?php echo($group->name)?>
                    </div>
                    <?php
                }

                ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="Email">邮箱</label>
                <span class="label label-info">必填</span>
                <input class="form-control text-box single-line" data-val="true" data-val-email="你确定你填的是邮箱地址？" data-val-required="填个邮箱，方便联系" id="Email" name="Email" type="email" value="">
                <span class="field-validation-valid text-warning" data-valmsg-for="Email" data-valmsg-replace="true"></span>
            </div>


            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="Phone">手机</label>
                <input class="form-control text-box single-line" data-val="true" data-val-phone="The 手机 field is not a valid phone number." data-val-regex="你填的是中国的手机号码？" data-val-regex-pattern="^(\+86)?1(3|5|8)[0-9]{9}$" id="Phone" name="Phone" type="tel" value="">
                <span class="field-validation-valid text-warning" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="QQ">QQ</label>
                <input class="form-control text-box single-line" data-val="true" data-val-maxlength="呃，我第一次见过这么长的QQ号" data-val-maxlength-max="30" id="QQ" name="QQ" type="text" value="">
                <span class="field-validation-valid text-warning" data-valmsg-for="QQ" data-valmsg-replace="true"></span>
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <label for="Weibo">微博</label>
                <input class="form-control text-box single-line" data-val="true" data-val-maxlength="你在微博这么屌，家里知道吗" data-val-maxlength-max="50" id="Weibo" name="Weibo" type="text" value="">
                <span class="field-validation-valid text-warning" data-valmsg-for="Weibo" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="Description">其他信息</label>
            <textarea class="form-control" cols="20" data-val="true" data-val-maxlength="同学，这不是写作文，500字已经很多了好不好" data-val-maxlength-max="1000" id="Description" name="Description" rows="5"></textarea>
            <span class="field-validation-valid text-warning" data-valmsg-for="Description" data-valmsg-replace="true"></span>
        </div>

        <div class="form-group">
            <label>验证码</label>         
            <p id='question'></p>
            <input class="form-control text-box single-line" data-val="true" data-val-remote="验证码错误" data-val-remote-url="verification-code.php" data-val-required="怎么可以不填验证码呢" id="VerificationCodeAnswer" name="VerificationCodeAnswer" type="text" value="">
            <input class="form-control text-box single-line" data-val="true" data-val-remote-url="AnswerHandler.php" id="VerificationPost" name="VerificationPost" type="text" value="<?php echo $QuestionCode;?>" style="display: none">
            <span class="field-validation-valid text-warning" data-valmsg-for="VerificationCodeAnswer" data-valmsg-replace="true"></span>
            <button id="RefreshQ" type="button" class="btn btn-sm btn-link">换个问题</button>
            <button type="submit" class="btn btn-info">提交报名表</button>
            <button type="reset" class="btn btn-link">重新填写</button>
        </div>
    </form>
    <p>&copy; 2013 - <?php echo date('Y')?> 湛江一中IT社 保留所有权利</p>
</div>
<?php require("footer.php");?>