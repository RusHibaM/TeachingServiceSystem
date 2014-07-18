<?php
	session_start();
	$_SESSION['role']="teacher";
	$_SESSION['id']=$_POST['teaid'];
	$user_id=$_SESSION['id'];
	echo "<script>location.href='teascore.php';</script>";
?>
