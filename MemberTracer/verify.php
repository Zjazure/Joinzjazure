<?php
$page_title = "湛江一中IT社 失散社员补登系统";
require("header.php");
require_once(__DIR__."/class/verification-code.class.php");
require_once(__DIR__."/class/groups.class.php");
$vf_codes = verification_code::get_verification_codes();
?>
<?php
function generate_questions()
{
    $vf_codes = verification_code::get_verification_codes();
    //rand two questions
    $rands = array_rand($vf_codes,2);
    $v1 = $vf_codes[$rands[0]];
    $v2 = $vf_codes[$rands[1]];
    $_SESSION["Verify_Stage"]="Verifying";
    $_SESSION["Verify_Q1"]=$v1->id;
    $_SESSION["Verify_Q2"]=$v2->id;
}

//verify
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_SESSION["Verify_Stage"]))
        switch($_SESSION["Verify_Stage"])
        {
            case"Verifying":
                $q1 = isset($_SESSION["Verify_Q1"]) ? $_SESSION["Verify_Q1"] : "";
                $q2 = isset($_SESSION["Verify_Q2"]) ? $_SESSION["Verify_Q2"] : "";
                if ($q1 != "" && $q2 != "" && verification_code::get_verification_code_by_id($q1)->answer == $_POST["answer1"] && verification_code::get_verification_code_by_id($q2)->answer == $_POST["answer2"])
                {
                    $_SESSION["Verify_Stage"] = "Verified";
                    header("Location: index.php");
                }
                else
                    generate_questions();
                break;
            case"Verified":header("Location: index.php");break;
            default:generate_questions();break;
        }
}
else{generate_questions();}
?>
<div class="modal show" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
            $v1 = verification_code::get_verification_code_by_id($_SESSION["Verify_Q1"]);
            $v2 = verification_code::get_verification_code_by_id($_SESSION["Verify_Q2"]);
            ?>
            <div class="modal-header"><h4 class="modal-title text-center text-primary">湛江一中IT社 社员补登系统</h4></div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <span class="label label-info">问题1</span>
                            <label><?php echo($v1->question); ?></label>
                            <input class="form-control text-box single-line" data-val="true" data-val-required="请填写问题1" id="answer1" name="answer1" type="text" value="">
                        </div>
                        <div class="form-group col-md-12">
                            <span class="label label-info">问题2</span>
                            <label><?php echo($v2->question); ?></label>
                            <input class="form-control text-box single-line" data-val="true" data-val-required="请填写问题2" id="answer2" name="answer2" type="text" value="">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-info btn-block">进入系统</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require("footer.php");?>