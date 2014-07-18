<?php
	session_start();
	if(!isset($_SESSION['user_type'])||($_SESSION['user_type']!=1)) die('{"status":-1}');
	date_default_timezone_set("Asia/Shanghai");
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {die('{"status":0}');}//DB error
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_start1'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_assoc($rett);
	$s1=$row['value'];
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_start2'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_assoc($rett);
	$s2=$row['value'];
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_end1'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_assoc($rett);
	$e1=$row['value'];
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_end2'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_assoc($rett);
	$e2=$row['value'];
	$ar = array(
		"status" => 1,
		"start_time1" => date("Y-m-d H:i:s",$s1),
		"start_time2"=> date("Y-m-d H:i:s",$s2),
		"end_time1"=> date("Y-m-d H:i:s",$e1),
		"end_time2"=> date("Y-m-d H:i:s",$e2),
	);
	echo json_encode($ar);
?>
