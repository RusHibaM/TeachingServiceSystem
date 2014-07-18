<?php
	session_start();
	if(!isset($_SESSION['user_type'])||($_SESSION['user_type']!=1)) {echo '4'; die('0');}
	$studentID=addslashes($_POST['studentID']);
	$classID=addslashes($_POST['classID']);
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {echo'3'; die('0');}//DB error
	$sql = "SELECT * FROM `css_Course_student_list` WHERE `Student_ID`='$studentID' AND `Class_ID`='$classID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num==0){echo '2';die();}
	$sql = "DELETE FROM `css_Course_student_list` WHERE `Student_ID`='$studentID' AND `Class_ID`='$classID'";
	$rett = mysql_query($sql, $link);
	echo '1';
?>
