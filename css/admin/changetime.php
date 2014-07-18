<?php
	session_start();
	if(!isset($_SESSION['user_type'])||($_SESSION['user_type']!=1)) die('0');
	date_default_timezone_set("Asia/Shanghai");
	$s1=strtotime($_POST['start1']);
	$s2=strtotime($_POST['start2']);
	$e1=strtotime($_POST['end1']);
	$e2=strtotime($_POST['end2']);
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {die('0');}//DB error
	if(!($s1<$e1 && $e1<$s2 && $s2<$e2)) die("0");
	$sql = "UPDATE `css_Selection_management` SET `value`='$s1' WHERE `Item`='Time_start1'";
	$rett = mysql_query($sql, $link);
	$sql = "UPDATE `css_Selection_management` SET `value`='$s2' WHERE `Item`='Time_start2'";
	$rett = mysql_query($sql, $link);
	$sql = "UPDATE `css_Selection_management` SET `value`='$e1' WHERE `Item`='Time_end1'";
	$rett = mysql_query($sql, $link);
	$sql = "UPDATE `css_Selection_management` SET `value`='$e2' WHERE `Item`='Time_end2'";
	$rett = mysql_query($sql, $link);
	die("1");
?>
