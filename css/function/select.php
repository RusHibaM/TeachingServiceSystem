<?php
require_once('sqllink.php');
//此版本暂未考虑priority
function goselect()
{
	$link=sqllink();
	$sql = "SELECT distinct `Class_ID` FROM `css_pending_selection`";
	$res1=mysql_query($sql, $link);
	$sns=0;
	while ($i = mysql_fetch_array($res1)){
		$id=$i['Class_ID'];
		$sql="SELECT  count(*) as num FROM `css_pending_selection` where `Class_ID`='$id'";
		$res2=mysql_query($sql, $link);
		$ret=mysql_fetch_array($res2);
		$penlen=$ret['num'];
		$sql="SELECT  * FROM `Re_imsCourse_acaClass_imsTeacher` where `class_id`='$id'";
		$res2=mysql_query($sql, $link);
		$ret=mysql_fetch_array($res2);
		$classcap=$ret['class_cap'];
		$sql="SELECT  `Student_ID` FROM `css_pending_selection` where `Class_ID`='$id'";
		$res2=mysql_query($sql, $link);
		$select = array();
		while($j= mysql_fetch_array($res2))
		{
			$select[]=$j['Student_ID'];
		}
		$unsetnum=$penlen-$classcap;
		for($k=0;$k<$unsetnum;$k++)
		{
			$len = sizeof($select);
  			$j = rand(0,$len);
  			unset($select[$j]);
		}
		$sql="DELETE FROM `css_pending_selection` where `Class_ID`='$id'";
		$res2=mysql_query($sql, $link);
		$len=sizeof($select);
		$year=date("Y",time());
		for($k=0;$k<$len;$k++)
		{
			$sid=$select[$k];
			$sn=$year.'-'.$sid.'-'.$id.'-system-'.$sns;
			$sql="INSERT INTO `css_Course_student_list` values ('$sn','$id','$sid')";
			$res2=mysql_query($sql, $link);	
		}
		
	}
	//把pending_selection表的信息筛选到course_student_list表
}
?>