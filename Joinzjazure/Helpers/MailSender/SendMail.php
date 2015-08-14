<?php

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbl_name"));
echo "<form method='post' action='Action.php'>";
echo "

<table border='0'>
<tr>
<th>Check</th>
<th>Name</th>
<th>Mail</th>
<th>Status</th>
</tr>
";
$out = mysql_query("SELECT * FROM tbl_name");
for ($i = 1;$i <= $count['COUNT(*)'];$i++)
{   $status = mysql_fetch_array($out);

    echo "<tr>";
    echo "<td>". "<input type='checkbox' name='sub[]' value='$status[COL1]'>" . "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>";
    echo "<td>" . "  " .$status['COL1'] ." &nbsp; &nbsp;". "</td>";
    echo "<td>" . "  " .$status['COL2'] . "   &nbsp; &nbsp;  "."</td>";
    echo "<td>" . "  " .$status['item'] ."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br><br>";
echo "<button type='submit' class='btn btn-success' name='submit'>Submit</button>"."<br>";
echo "</form>";
$waiting = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbl_name WHERE item != 'Yes'"));
echo "Total " . $count['COUNT(*)'] . " People. <br>";
echo "Still have " . $waiting['COUNT(*)'] . " people haven't reveived Email.";
?>