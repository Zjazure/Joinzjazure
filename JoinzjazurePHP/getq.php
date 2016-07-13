<?php 
require("xmlparser.php");
function getQuestion($VerificationCodes,$QuestionCode)
        {

            global $layout;
            $layout = $VerificationCodes->verificationCode[$QuestionCode]->attributes()->question;
            $fp1 = fopen("QuestionAnswer.txt", "w+");
            $CorrectAnswer = $VerificationCodes->verificationCode[$QuestionCode]->attributes()->answer;
            fwrite($fp1,$CorrectAnswer);
            fclose($fp1);
			return $layout;
        };
if(isset($_GET['rand'])) {
$QuestionCode = rand(0,26);
unlink("QuestionAnswer.txt");
    $fpReadLastCode = fopen("Code.txt","w+");
    $lastcode = fgets($fpReadLastCode);
    check:
    $Newcode = rand(0,26);
    if ($Newcode == $lastcode)
    {
        goto check;
    }else
    {
        $getq = getQuestion($VerificationCodes,$Newcode);
        fwrite($fpReadLastCode,$Newcode);
        fclose($fpReadLastCode);

    }
echo $getq;
}