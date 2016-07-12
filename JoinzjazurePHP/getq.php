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
$getq = getQuestion($VerificationCodes,$QuestionCode);
echo $getq;
}