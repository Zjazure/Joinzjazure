<?php

include ("ConnectDatabase.php");

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbl_name"));

echo "

<table border='0' id='ta'>
<tr>
<th>Name</th>
<th>Mail</th>
<th>Status</th>
</tr>
";
$out = mysql_query("SELECT * FROM tbl_name");
for ($i = 1;$i <= $count['COUNT(*)'];$i++)
{   $status = mysql_fetch_array($out);
    $waiting = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbl_name WHERE item != 'Yes'"));
    echo "<tr>";
    echo "<td>" . "  " .$status['COL1'] ." &nbsp; &nbsp;". "</td>";
    echo "<td>" . "  " .$status['COL2'] . "   &nbsp; &nbsp;  "."</td>";
    echo "<td>" . "  " .$status['item'] ."</td>";
    echo "</tr>";
}


echo "
</table>
<br><br>
";
echo "Total " . $count['COUNT(*)'] . " People. <br>";
echo "Still have " . $waiting['COUNT(*)'] . " people haven't reveived Email.";
?>