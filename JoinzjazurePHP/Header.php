<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="baidu-site-verification" content="GE3bEPSpwX" />
    <meta name="keywords" content="湛江一中,湛江一中IT社,IT社,湛江,社团" />
    <title>湛江一中IT社 网络报名系统</title>

</head>
    <?php
    require("RenderScripts.php");
    require("xmlparser.php");
    require("Main3.php");
    ?>

<script type="text/javascript">
    (function(){
        $("#checkHandler").validate( {
            rules: {

                VerificationCodeAnswer: {
                    required: true,
                    remote: {
                        url: "AnswerHandler.php",
                        type: "post",
                        data: {
                            VerificationCodeAnswer: function () {
                                return $("#VerificationCodeAnswer").val();
                            }
                        }
                    }

                },

                messages: {
                    VerificationCodeAnswer: {
                        required: "请输入VerificationCodeAnswer",
                        remote: "请输入VerificationCodeAnswer，remote",
                    }
                }
            },
            submitHandler:function(form)
            {
                alert("提交");
                form.submit();
            }
        }

        );
        })


    $("#RefreshQ").click(
        function rs()
    {
        <?php $QuestionCode = rand(0,26);
        unlink("QuestionAnswer.txt");
        getQuestion($VerificationCodes,$QuestionCode);
        ?>
        document.getElementById('question').innerHTML = "<?php echo'<p id=\'question\'>'.$layout.'</p>';?>"
    }
    )





</script>

<footer>
    <p>&copy; 2013 - <?php echo date('Y')?> 湛江一中IT社 保留所有权利 PHP重制版 By:Nemesiss</p>
</footer>
</html>