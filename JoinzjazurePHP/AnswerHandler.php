<?php
$Groups = simplexml_load_file("XMLData/Groups.xml");
$VerificationCodes = simplexml_load_file("XMLData/VerificationCodes.xml");
$Answer = fopen("QuestionAnswer.txt", "r");
$CodeAnswer = fgets($Answer);
if($CodeAnswer == $_REQUEST['VerificationCodeAnswer'])
{
    echo "true";
}else
{
    echo "false";
}