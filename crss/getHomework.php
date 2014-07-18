<?php error_reporting(0); require('conn_database.php');
	require('characterCheck.php');
	require('loginCheck.php');
	date_default_timezone_set("Asia/Shanghai");

	if ($_GET['query']=='init')
	{
		if($user_type=='student')
			$strsql="select b.cuz_id,b.cuz_name,c.count  from Re_imsStudent_imsCourse a,imsCourse b,V_CountHomework c where a.cuz_id=b.cuz_id and a.cuz_id=c.cuz_id and a.stu_id=". $stu_id. ";";
		else if($user_type=='teacher')
			$strsql="select b.cuz_id,b.cuz_name,c.count from Re_imsTeacher_imsCourse a,imsCourse b,V_CountHomework c where a.cuz_id=b.cuz_id and b.cuz_id=c.cuz_id and a.teac_id=". $teac_id. ";";
		$result=mysql_db_query($mysql_database, $strsql, $conn);
		$count=0;
		while ($row=mysql_fetch_row($result))
		{
			$course['id']=$row[0];
			$course['name']=$row[1];
			$course['count']=$row[2];
			$course_info[$count++]=$course;
		}
		if($count==0)
			$course_info=null;
		$user_info['type']=$user_type;
		$data['user_info']=$user_info;
		$data['course_info']=$course_info;

		mysql_free_result($result);
		echo json_encode($data);
	}

	if ($_GET['query']=='homespec')
	{
		$strsql="select a.hw_id,a.hw_title,a.hw_deadline,a.hw_assign_date,hw_requirement  from crssHomework a,Re_crssHomework_imsCourse b where a.hw_id=b.hw_id and b.cuz_id=". $_GET['cuz_id']. ";";
		$result=mysql_db_query($mysql_database, $strsql, $conn);
		$count=0;
		while ($row=mysql_fetch_row($result))
		{
			$homework['id']=$row[0];
			$homework['title']=$row[1];
			$homework['deadline']=$row[2];
			$homework['assigndate']=$row[3];
			$homework['requirement']=$row[4];
			$data[$count++]=$homework;
		}

		mysql_free_result($result);
		if($count==0)
			$data=null;
		echo json_encode($data);
	}

	if ($_GET['query']=='stulist' and $user_type=='teacher')
	{
		$hw_id=$_GET['hw_id'];
		$data=null;
		$count=0;
		$strsql="select cuz_id from Re_crssHomework_imsCourse where hw_id=". $hw_id . ";";
		$result=mysql_db_query($mysql_database, $strsql, $conn);
		$row=mysql_fetch_row($result);
		$cuz_id=$row[0];
		$strsql="select a.stu_id,a.stu_name from imsStudent a,Re_imsStudent_imsCourse b where a.stu_id=b.stu_id and b.cuz_id=". $cuz_id. ";";
		$result=mysql_db_query($mysql_database, $strsql, $conn);
		while($row=mysql_fetch_row($result))
		{
			$data[$count]['id']=$row[0];
			$data[$count++]['name']=$row[1];
		}
		mysql_free_result($result);
		for($i=0;$i<$count;$i++)
		{
			$strsql="select a.file_id from  crssFile a,Re_crssFile_crssHomework b where a.file_type='homework' and a.file_uploader=". $data[$i]['id']. " and a.file_id=b.file_id and b.hw_id=". $hw_id. ";";
			$result=mysql_db_query($mysql_database, $strsql, $conn);
			if($row=mysql_fetch_row($result))
			{
				$data[$i]['submit']=true;
				$data[$i]['file_id']=$row[0];
			}
			else
				$data[$i]['submit']=false;
			mysql_free_result($result);
		}
		echo json_encode($data);
	}
	if ($_GET['query']=='assign' and $user_type=='teacher')
	{
		echo 'ok';
		$deadline=$_GET['deadline'];
		$title=$_GET['title'];
		$require=$_GET['require'];
		$cuz_id=$_GET['cuz_id'];
		$assign_date=date("Y-m-d");
		$strsql="insert into crssHomework (hw_title,hw_assign_date,hw_deadline,hw_requirement) values('". $title. "','". $assign_date. "','". $deadline. "','". $require ."');";
		if($result=mysql_db_query($mysql_database, $strsql, $conn))
		{
			$hw_id=mysql_insert_id();
			$strsql="insert into Re_crssHomework_imsCourse (hw_id,cuz_id) values(". $hw_id.",". $cuz_id. ");";
			$result=mysql_db_query($mysql_database, $strsql, $conn);
			echo $strsql;
		}
	}

	mysql_close($conn);  
?>
