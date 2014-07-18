<?php
	session_start();
	$_SESSION["return"]="viewself";
	$_SESSION["view_type"]=$_SESSION["user_type"];
	$_SESSION["view_id"]=$_SESSION["user_id"];
	header('Location: ./viewdata.php');
?>