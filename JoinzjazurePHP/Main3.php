<body>
<div class="container" style="background-color:rgba(255,255,255,0.83)">
    <div class="page-header">
        <h1>湛江一中IT社 网络报名系统</h1>
    </div>
<div class="alert alert-info">
    <p>IT社设有五个小组，我们什么都玩=  =  。欢迎技术控，技术宅，技术X (●'◡'●)</p>
    <p>除组员外，我们还需要社长一名，副社长两名，小组负责人各两名。</p>
    <p>面试通过率估计值为80%</p>
    <p>招新原则：兴趣第一，基础第二</p>
    <p>加入我们吧！</p>
</div>

<form id="checkHandler" name="checkHandler" method="post" action="SubmitHandler.php">
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
                <option value="2017">高一(2017年入学)</option>
                <option value="2016">高二(2016年入学)</option>
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
        <label>小组</label>
        <span class="label label-info">点击小组名称查看小组介绍</span>
        <input data-val="true" data-val-number="The field 小组 must be a number." data-val-required="请至少选择一个小组" id="Groups" name="Groups" type="hidden" value="0">
        <div class="panel-group">
<?php
            $Groups = simplexml_load_file("XMLData/Groups.xml");
            $VerificationCodes = simplexml_load_file("XMLData/VerificationCodes.xml");
            foreach ($Groups as $GDF)
            {
                echo "<div class='panel panel-primary'>
                <div class='panel-heading'>
                    <h4 class='panel-title'>";
                echo "<input type='checkbox' id='".$GDF->attributes()->id."' name='counter[]' value='".$GDF->attributes()->name."' onclick='handleCheck('#".$GDF->attributes()->name."',1)'>
                        <a data-toggle='collapse' class='info collapsed' data-parent='#accordion' href='#collapse".$GDF->attributes()->name."' aria-expanded='false'>".$GDF->attributes()->name."</a>
                    </h4>
                </div>
                ";
                echo "<div id='collapse".$GDF->attributes()->name."' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>
                    <div class='panel-body'>
                        ";
            foreach ($GDF as $GDS)
            {

                echo $GDS->attributes()."<br>";
            }
   echo "
                    </div>
                </div>
            </div>";
            }
?>

            <span class="field-validation-valid text-warning" data-valmsg-for="Groups" data-valmsg-replace="true"></span>
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
        <?php

        function getQuestion($VerificationCodes,$QuestionCode)
        {
            global $layout;
            $layout = $VerificationCodes->verificationCode[$QuestionCode]->attributes()->question;
            $fp1 = fopen("QuestionAnswer.txt", "w+");
            $CorrectAnswer = $VerificationCodes->verificationCode[$QuestionCode]->attributes()->answer;
            fwrite($fp1,$CorrectAnswer);
            fclose($fp1);
        }
        $QuestionCode = rand(0,26);
        getQuestion($VerificationCodes,$QuestionCode);
        echo "<p id='question'>".$GLOBALS['layout']."</p>";


        ?>

        <input class="form-control text-box single-line" data-val="true" data-val-remote="验证码错误" data-val-remote-url="AnswerHandler.php" data-val-required="怎么可以不填验证码呢" id="VerificationCodeAnswer" name="VerificationCodeAnswer" type="text" value="">
        <input class="form-control text-box single-line" data-val="true" data-val-remote-url="AnswerHandler.php" id="VerificationPost" name="VerificationPost" type="text" value="<?php echo $QuestionCode;?>" style="display: none">
        <span class="field-validation-valid text-warning" data-valmsg-for="VerificationCodeAnswer" data-valmsg-replace="true"></span>
        <button id="RefreshQ" type="button" class="btn btn-sm btn-link">换个问题</button>
        <p id="ValQ"></p>


        <button type="submit" class="btn btn-info">提交报名表</button>
        <button type="reset" class="btn btn-link">重新填写</button>


    </div>
</form>

