<?php
	require_once('select.php');
	$link=sqllink();
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_start1'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_row($rett);
	$s1=$row['value'];
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_start2'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_row($rett);
	$s2=$row['value'];
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_end1'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_row($rett);
	$e1=$row['value'];
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Time_end2'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_row($rett);
	$e2=$row['value'];
	$t=time();
	if(($t>$s1 && $t<$e1)||($t>$s2 && $t<$e2)) 
	{
		$sql = "UPDATE `css_Selection_management` SET `value`=1 WHERE `Item`='selectCourseEn'";
	$rett = mysql_query($sql, $link);
	} else 
	{
		$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='selectCourseEn'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_row($rett);
	$en=$row['value'];
	if($en==1) goselect();
	$sql = "UPDATE `css_Selection_management` SET `value`=0 WHERE `Item`='selectCourseEn'";
	$rett = mysql_query($sql, $link);
	}
?>