<?php
	session_start();
	$_SESSION['role']="student";
	$_SESSION['id']=$_POST['stuid'];
	$user_id=$_SESSION['id'];
	echo "<script>location.href='stuscore.php';</script>";
?>