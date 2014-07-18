<?php
	session_start();
	if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!=2) die('You are not a teacher.');
	$tid=$_SESSION['user_id'];
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {die('0');}//DB error
	$sql = "SELECT * FROM `acaArrange` WHERE `teac_id`='$tid'";
	$rett = mysql_query($sql, $link);
	echo '<table><tr><th>Class ID</th><th>Course Name</th><th>Course Time</th><th>Course Room</th><th>View student list</th></tr>';
	while ($i = mysql_fetch_array($rett)){ //返回查询结果
	$cid=$i['class_id'];
	$sql= "SELECT `imsCourse`.`cuz_name` AS cname FROM `imsCourse`,`acaCourseclassteacher` WHERE `acaCourseclassteacher`.class_id='$cid' AND `imsCourse`.cuz_id=`acaCourseclassteacher`.course_id";
	$res = mysql_query($sql, $link);
	$p=mysql_fetch_array($res);
echo "<tr><td>".$i['class_id'].'</td><td>'.$p['cname'].'</td><td>'.$i['class_time'].'</td><td>'.$i['room_id'].'</td><td><a href="javascript: golist(\''.$i['class_id'].'\')">'.'View</a></td></tr>';
	}
	echo "</table>";
?>
