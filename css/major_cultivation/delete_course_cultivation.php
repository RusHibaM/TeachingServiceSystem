<?php
	session_start();
	if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!=3) {echo '{ "status":1 }';die();}
	$studentID=$_SESSION['user_id'];
	$courseID=addslashes($_POST['courseID']);
	if($courseID=='') {echo '{ "status":1 }';die();}
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {echo '{ "status":1 }';die();}//DB error
	$sql = "SELECT * FROM `css_majorcultivation` WHERE `Student_ID`='$studentID' AND `Course_ID`='$courseID'";
	$rett = mysql_query($sql, $link);
	$num= mysql_num_rows($rett);
	if($num==0){echo '{ "status":1 }';die();} //hasn't been in major cultivation
	$sql = "DELETE FROM `css_majorcultivation` WHERE `Student_ID`='$studentID' AND `Course_ID`='$courseID'";
	$rett = mysql_query($sql, $link);
	echo '{ "status":0 }';
?>
