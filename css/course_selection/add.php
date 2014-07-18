<?php
	session_start();
	if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!=3) {echo '{ "status":1 }';die();}
	$studentID=$_SESSION['user_id'];
	$classID=addslashes($_POST['classid']);
	if($classID=='') {echo '{ "status":1 }';die();}
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {echo '{ "status":2 }';die();}//DB error
	$sql = "SELECT * FROM `acaArrange` WHERE `class_id`='$classID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num==0){echo '{ "status":2 }';die();}
	$sql = "SELECT * FROM `css_pending_selection` WHERE `Student_ID`='$studentID' AND `Class_ID`='$classID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num!=0){echo '{ "status":1 }';die();} //has been in major cultivation
	$sql = "SELECT * FROM `css_Course_student_list` WHERE `Student_ID`='$studentID' AND `Class_ID`='$classID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num!=0){echo '{ "status":1 }';die();} //has been in major cultivation
	$sql = "INSERT INTO `css_pending_selection` values ('$classID', '$studentID', 1)";
	$rett = mysql_query($sql, $link);
	echo '{ "status":0 }';
?>
