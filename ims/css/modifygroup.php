<?php
	session_start();
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	if(!$con)
	{
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("SEproject",$con);
	$stu_privlg = $_POST["stu_privlg"];
	$teac_privlg = $_POST["teac_privlg"];
	echo $stu_privlg;
	echo $teac_privlg;
	$sql1 = "UPDATE imsStudent SET stu_right = '$stu_privlg' WHERE 1";
	$sql2 = "UPDATE imsTeacher SET teac_right = '$teac_privlg' WHERE 1";
	
	mysql_query($sql1,$con);
	mysql_query($sql2,$con);
	mysql_close($con);
	header('Location: ./welcome.html');
?>
