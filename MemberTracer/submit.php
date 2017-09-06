<?php if(!isset($_SESSION["Verify_Stage"])||$_SESSION["Verify_Stage"]!="Verified") header("Location: verify.php"); ?>
<?php if($_SERVER['REQUEST_METHOD']=="POST"){?>
<?php 
$page_title = "湛江一中IT社 社员补登系统";
require("header.php");
?>
<?php require_once(__DIR__."/class/member.class.php");?>
<?php require_once(__DIR__."/class/config.class.php");?>
<div class="container" style="background-color:rgba(255,255,255,0.83)">
    <div class="page-header">
        <h1>湛江一中IT社 社员补登系统</h1>
    </div>
<?php 
$conf = config::get_configs();
$anouncements = json_decode(file_get_contents(__DIR__."/JsonData/Anouncement.json"),true);
if(isset($conf["website_enable"])&&$conf["website_enable"]=="Enabled")
    {if(isset($anouncements["Submit"])) echo($anouncements["Submit"]);}
else
    {if(isset($anouncements["DisabledSubmit"])) echo($anouncements["DisabledSubmit"]);}
?>

<?php
    if(isset($conf["website_enable"])&&$conf["website_enable"]=="Enabled")
    {
        $date = date_create($_POST["JoinYear"]."-".$_POST["JoinMonth"]."-".$_POST["JoinDate"]);
        $dt = date_timestamp_get($date);
        $member = new member();
        $member->name = $_POST["Name"];
        $member->gender = $_POST["Gender"]=="True"?true:false;
        $member->grade = $_POST["Grade"];
        $member->class = $_POST["Class"];
        $member->joindate = $dt;
        $member->groups = $_POST["Groups"];
        $member->email = $_POST["Email"];
        $member->phone = $_POST["Phone"];
        $member->QQ = $_POST["QQ"];
        $member->weibo = $_POST["Weibo"];
        $member->description = $_POST["Description"];
        $result = member::add_member($member);
        if(!$result) die("Failed to add data");
    }
    unset($_SESSION["VerificationCodeId"]);  
?>
    <p>&copy; 2013 - <?php echo date('Y')?> 湛江一中IT社 保留所有权利</p>
</div>
<?php require("footer.php"); ?>
<?php } ?>
