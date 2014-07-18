<?php
	ob_start();
	session_start();
	ob_end_flush();
	if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!=3) {echo '0';die();}
	$studentID=$_SESSION['user_id'];
	require_once("../function/sqllink.php");
	$link=sqllink();
	$sql = "SELECT * FROM `css_majorcultivation` WHERE `Student_ID`='$studentID'";
	$result = mysql_query($sql, $link);
	echo "<table><tr><th>Course ID</th><th>Course Name</th><th>Operation</th></tr>";
	while ($i = mysql_fetch_array($result)){ //返回查询结果到数组
	$courseid=$i['Course_ID'];
	$sql = "SELECT * FROM `imsCourse` WHERE `cuz_id`='$courseid'";
	$rett = mysql_query($sql, $link);
	$row= mysql_fetch_array($rett);
	$coursename=$row['cuz_name'];
	echo "<tr><td>".$courseid."</td><td>".$coursename."</td><td><button data-id=".$courseid.">Delete</button></td></tr>";  //输出数据
	}
	echo"</table>";
?>
