<?php
	$con=mysql_connect("218.244.137.223","ddpse","zjuddpse2014");
    mysql_select_db("SEproject");
    // Check connection
    if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysql_connect_error();
    }
	$ID=$_POST["ID"];
	$type=$_POST["add_type"];
	if($type=="Student")
		$add = "INSERT INTO `$type` (`stu_id`) VALUES ('$ID')";
	if($type=="Teacher")
		$add = "INSERT INTO `$type` (`teac_id`) VALUES ('$ID')";
	if($type=="Manager")
		$add = "INSERT INTO `$type` (`mgr_id`) VALUES ('$ID')";
	$result = mysql_query($add,$con);
	echo $add;
	mysql_close($con);
	header('Location: ./updatedata.php');
?>