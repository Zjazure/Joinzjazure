<?php
session_start();
$Groups = simplexml_load_file("XMLData/Groups.xml");
$VerificationCodes = simplexml_load_file("XMLData/VerificationCodes.xml");
function getQuestion($VerificationCodes,$QuestionCode)
        {

            global $layout;

            $layout = $VerificationCodes->verificationCode[$QuestionCode]->attributes()->question;
            $CorrectAnswer = $VerificationCodes->verificationCode[$QuestionCode]->attributes()->answer;
			return $layout;
        };
if(isset($_GET['rand'])) {
    $lastcode = $_SESSION['vericode'];
    check:
    $Newcode = rand(0,26);
    if ($Newcode == $lastcode)
    {
        goto check;
    }else
    {
        $getq = getQuestion($VerificationCodes,$Newcode);
        unset($_SESSION['vericode']);
        $_SESSION['vericode'] = $Newcode;

    }
echo $getq;
}