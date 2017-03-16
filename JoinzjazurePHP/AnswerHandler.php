<?php
session_start();
$Groups = simplexml_load_file("XMLData/Groups.xml");
$VerificationCodes = simplexml_load_file("XMLData/VerificationCodes.xml");
$CodeAnswer = $VerificationCodes->verificationCode[$_SESSION['vericode']]->attributes()->answer;
if($CodeAnswer == $_REQUEST['VerificationCodeAnswer'])
{
    echo "true";
}else
{
    echo "false";
}