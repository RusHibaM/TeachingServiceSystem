<?php
$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
if(!$con)
    echo "no connection";
mysql_select_db("SEproject");

$temp = $_POST['date'];
$date = mysql_real_escape_string($temp); 
mysql_query("UPDATE smDeadline SET deadline = '$date' WHERE ID = 1");

mysql_close($con);

echo "<script>location.href='deadline_set.php';</script>";

?>