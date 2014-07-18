<?php
//查询模块，返回一个table;
//POST接收 data=单个的时候 data1,data2=区间形式 type=区分查询类型
require_once("../function/sqllink.php");
$data=addslashes($_POST['data']);
switch ($_POST['type'])
{
	case '0'://ID
	    //论表记录名乱改的后果。。。。。
	$sql="SELECT `imsCourse`.cuz_id AS `cid`, `imsTeacher`.teac_name AS `tname`,`imsCourse`.cuz_name AS `cname`,`acaArrange`.class_time AS `ctime`,`acaRoom`.`room_name` AS `rname`,`acaArrange`.class_id AS `clid` FROM `acaArrange`,`imsTeacher`,`imsCourse`,`acaCourseclassteacher`,`acaRoom` WHERE `imsCourse`.cuz_id=`acaCourseclassteacher`.course_id AND`acaCourseclassteacher`.class_id=`acaArrange`.class_id AND `acaArrange`.teac_id=`imsTeacher`.teac_id AND `acaRoom`.room_id=`acaArrange`.room_id AND `imsCourse`.cuz_id = $data";

		break;

	case '1'://name
		$sql="SELECT `imsCourse`.cuz_id AS `cid`, `imsTeacher`.teac_name AS `tname`,`imsCourse`.cuz_name AS `cname`,`acaArrange`.class_time AS `ctime`,`acaRoom`.`room_name` AS `rname`,`acaArrange`.class_id AS `clid` FROM `acaArrange`,`imsTeacher`,`imsCourse`,`acaCourseclassteacher`,`acaRoom` WHERE `imsCourse`.cuz_id=`acaCourseclassteacher`.course_id AND`acaCourseclassteacher`.class_id=`acaArrange`.class_id AND `acaArrange`.teac_id=`imsTeacher`.teac_id AND `acaRoom`.room_id=`acaArrange`.room_id AND `imsCourse`.cuz_name LIKE '%$data%'";

		break;

	case '2'://teacher name
		$sql="SELECT `imsCourse`.cuz_id AS `cid`, `imsTeacher`.teac_name AS `tname`,`imsCourse`.cuz_name AS `cname`,`acaArrange`.class_time AS `ctime`,`acaRoom`.`room_name` AS `rname`,`acaArrange`.class_id AS `clid` FROM `acaArrange`,`imsTeacher`,`imsCourse`,`acaCourseclassteacher`,`acaRoom` WHERE `imsCourse`.cuz_id=`acaCourseclassteacher`.course_id AND`acaCourseclassteacher`.class_id=`acaArrange`.class_id AND `acaArrange`.teac_id=`imsTeacher`.teac_id AND `acaRoom`.room_id=`acaArrange`.room_id AND `imsTeacher`.teac_name LIKE '%$data%'";
		break;
}

$link=sqllink();
if(!$link) die("0");
$res=mysql_query($sql, $link);
echo "<table><tr><th>Course ID</th><th>Course Name</th><th>Teacher Name</th><th>Class Room</th><th>Time</th><th>Add to major cultivation</th><th>Select</th></tr>";
while ($i = mysql_fetch_array($res)){ //返回查询结果

echo "<tr><td>".$i['cid'].'</td><td>'.$i['cname'].'</td><td>'.$i['tname'].'</td><td>'.$i['rname'].'</td><td>'.$i['ctime']."</td><td><button id='major' data-id=".$i['cid'].">Add to major cultivation</button></td><td><button id='select' data-id=".$i['clid'].'>Select</button></td></tr>';
 //两个BUTTON参数，SELECT用class_id, class_id在$i['clid']; ADD major 用course id,在$i['cid']
}

echo '</table>';
?>
