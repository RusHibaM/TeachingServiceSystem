<?php
	session_start();
	if(!isset($_SESSION['user_type'])||($_SESSION['user_type']!=1)) {echo '4';die();}
	date_default_timezone_set("Asia/Shanghai");
	$studentID=addslashes($_POST['studentID']);
	$classID=addslashes($_POST['classID']);
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {echo '3';die();}//DB error
	$sql = "SELECT * FROM `css_Course_student_list` WHERE `Student_ID`='$studentID' AND `Class_ID`='$classID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num!=0){echo '2';die();}
	$year=date("Y",time());
	$sql = "SELECT * FROM `css_Selection_management` WHERE `Item`='Adjust_SN'";
	$rett = mysql_query($sql, $link);
	$row=mysql_fetch_row($rett);
	$i=$row['value'];
	$i=$i+1;
	$sql = "UPDATE `css_Selection_management` SET `value`=$i WHERE `Item`='Adjust_SN'";
	$rett = mysql_query($sql, $link);
	$sn=$year.'-'.$studentID.'-'.$classID.'-admin-'.$i;
	$sql = "INSERT INTO `css_Course_student_list` values ('$sn','$classID','$studentID')";
	$rett = mysql_query($sql, $link);
	echo '1';
?>
