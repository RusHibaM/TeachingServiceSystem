<?php
	session_start();
	if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!=3) {echo '0';die();}
	$studentID=$_SESSION['user_id'];
	require_once("../function/sqllink.php");
	$link=sqllink();
	$sql = "SELECT `imsCourse`.cuz_id AS `cid`, `imsTeacher`.teac_name AS `tname`,`imsCourse`.cuz_name AS `cname`,`acaArrange`.class_time AS `ctime`,`acaRoom`.`room_name` AS `rname`,`acaArrange`.class_id AS `clid` FROM `acaArrange`,`imsTeacher`,`imsCourse`,`acaCourseclassteacher`,`acaRoom`,`css_pending_selection` WHERE `imsCourse`.cuz_id=`acaCourseclassteacher`.course_id AND `acaCourseclassteacher`.class_id=`acaArrange`.class_id AND `acaArrange`.teac_id=`imsTeacher`.teac_id AND `acaRoom`.room_id=`acaArrange`.room_id AND `css_pending_selection`.Class_ID=`acaArrange`.class_id AND `css_pending_selection`.Student_ID='$studentID'";
	$result = mysql_query($sql, $link);
	echo "<table><tr><th>Course ID</th><th>Course Name</th><th>Teacher Name</th><th>Class Time</th><th>Class Room</th><th>Operation</th></tr>";
	while ($i = mysql_fetch_array($result)){ //返回查询结果到数组，选了但没结果的课
	echo "<tr style='color:red'><td>".$i['cid']."</td><td>".$i['cname']."</td><td>".$i['tname']."</td><td>".$i['ctime']."</td><td>".$i['rname']."</td><td><button data-id=".$i['clid'].">Delete</button></td></tr>";  //输出数据
	}
	$sql = "SELECT `imsCourse`.cuz_id AS `cid`, `imsTeacher`.teac_name AS `tname`,`imsCourse`.cuz_name AS `cname`,`acaArrange`.class_time AS `ctime`,`acaRoom`.`room_name` AS `rname`,`acaArrange`.class_id AS `clid` FROM `acaArrange`,`imsTeacher`,`imsCourse`,`acaCourseclassteacher`,`acaRoom`,`css_Course_student_list` WHERE `imsCourse`.cuz_id=`acaCourseclassteacher`.course_id AND `acaCourseclassteacher`.class_id=`acaArrange`.class_id AND `acaArrange`.teac_id=`imsTeacher`.teac_id AND `acaRoom`.room_id=`acaArrange`.room_id AND `css_Course_student_list`.Class_ID=`acaArrange`.class_id AND `css_Course_student_list`.Student_ID='$studentID'";
	$result = mysql_query($sql, $link);

	while ($i = mysql_fetch_array($result)){ //返回查询结果到数组，已经选上的课
	echo "<tr><td>".$i['cid']."</td><td>".$i['cname']."</td><td>".$i['tname']."</td><td>".$i['ctime']."</td><td>".$i['rname']."</td></tr>";  //输出数据
	}
	echo"</table>";
?>
