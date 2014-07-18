<?php
	session_start();
	if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!=2) die('0');
	$tid=$_SESSION['user_id'];
	$classid=$_POST['classID'];
	require_once("../function/sqllink.php");
	$link=sqllink();
	if(!$link) {die('0');}//DB error
	$sql = "SELECT * FROM `css_Course_student_list` WHERE `Class_ID`='$classid'";
	$rett = mysql_query($sql, $link);
	echo '<table><tr><th>Student ID</th><th>Student Name</th></tr>';
	while ($i = mysql_fetch_array($rett)){ //返回查询结果
	$sid=$i['Student_ID'];
	$sql= "SELECT `stu_name` AS sname FROM `imsStudent` WHERE `stu_id`=$sid";
	$res = mysql_query($sql, $link);
	$p=mysql_fetch_row($res);
echo "<tr><td>".$sid.'</td><td>'.$p['sname'].'</td></tr>';
	}
	echo "</table>";
?>
