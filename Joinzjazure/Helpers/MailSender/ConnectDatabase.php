<?php
include ("Config.php");
$con = mysql_connect(constant("HOST"),constant("USER"),constant("PASSWD"));

if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_query('SET NAMES utf8');

mysql_select_db(constant("DATABASENAME"),$con);

?>