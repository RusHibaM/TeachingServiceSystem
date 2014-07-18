<?php
	session_start();
	if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!=3) {echo '1';die();}
	$studentID=$_SESSION['user_id'];
	$courseID=addslashes($_POST['courseId']);
	if($courseID=='') {echo '1';die();}
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {echo '1';die();}//DB error
	$sql = "SELECT * FROM `imsCourse` WHERE `cuz_id`='$courseID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num==0){echo '2';die();}
	$sql = "SELECT * FROM `css_majorcultivation` WHERE `Student_ID`='$studentID' AND `Course_ID`='$courseID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num!=0){echo '1';die();} //has been in major cultivation
	$sql = "INSERT INTO `css_majorcultivation` values ('$studentID','$courseID')";
	$rett = mysql_query($sql, $link);
	echo '0';
?>
