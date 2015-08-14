
<?php
$config = fopen("Config.php", "w") or die("Unable to open file!");
$head = "<?php\n";
$host = "define('HOST','$_POST[databasehost]');\n";
$user = "define('USER','$_POST[databaseuser]');\n";
$pass = "define('PASSWD','$_POST[databasepasswd]');\n";
$name = "define('DATABASENAME','$_POST[databasename]');\n";
$detail = "define('DETAILS','$_POST[maildetails]');\n";
$foot = "?>";

fwrite($config,$head);
fwrite($config,$host);
fwrite($config,$user);
fwrite($config,$pass);
fwrite($config,$name);
fwrite($config,$detail);
fwrite($config,$foot);



?>
