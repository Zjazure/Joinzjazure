<?php
require(__DIR__."/class/verification-code.class.php");
if(session_status()!=PHP_SESSION_ACTIVE)session_start();

//simple route
$query = isset($_GET["func"])?$_GET["func"]:"";
if(strcasecmp($query,"")==0) check_anwser();
if(strcasecmp($query,"question")==0) rand_question();

function check_anwser()
{
    $code = verification_code::get_verification_code_by_id($_SESSION["VerificationCodeId"]);
    if($code->answer == $_REQUEST["VerificationCodeAnswer"])
        echo "true";
    else
        echo "false";
}

function rand_question()
{
    $codes = verification_code::get_verification_codes();
    //if(isset($_SESSION["VerificationCodeId"])) $oldCode = $_SESSION["VerificationCodeId"]; else $oldCode = 1;
    //while(($randCode = rand(0,count($codes))) == ($oldCode-1));
    $randCode = rand(1,count($codes));
    $code = verification_code::get_verification_code_by_id($randCode);
    $_SESSION["VerificationCodeId"] = $randCode;
    echo($code->question);
}
