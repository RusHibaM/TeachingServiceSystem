<?php require('conn_database.php');
	require('characterCheck.php');
	require('loginCheck.php');

	if ($_GET['query']=='initmyfile')
	{
		if($user_type=='student')
			$strsql="select count(*) from crssResource where reso_uploader=".$stu_id." and reso_uploadertype='student';";
		else
			$strsql="select count(*) from crssResource where reso_uploader=".$teac_id." and reso_uploadertype='teacher';";
		$result=@mysql_db_query($mysql_database, $strsql, $conn);
		$row=mysql_fetch_row($result);
		$count=$row[0];
		$data['myfilenumber']=$count;

		echo json_encode($data);
	}
	if ($_GET['query']=='initmyfilespec')
	{
		if($user_type=='student')
			$strsql="select a.reso_id,a.reso_uploader,a.reso_uploadertype,a.reso_famile,a.reso_name,a.reso_update_date,a.reso_level,a.reso_illustration from crssResource a where a.reso_uploader=".$stu_id." and reso_uploadertype='student';";
		else
			$strsql="select a.reso_id,a.reso_uploader,a.reso_uploadertype,a.reso_famile,a.reso_name,a.reso_update_date,a.reso_level,a.reso_illustration from crssResource a where a.reso_uploader=".$teac_id." and reso_uploadertype='teacher';";

		$result=@mysql_db_query($mysql_database, $strsql, $conn);

		$count=0;

		if($user_type=='student') $user_id=$stu_id;
		if($user_type=='teacher') $user_id=$teac_id;


		while ($row=mysql_fetch_row($result))
		{
			$resource['reso_id']=$row[0];
			$resource['reso_uploader']=$row[1];
			$resource['reso_uploadertype']=$row[2];
			$resource['reso_famile']=$row[3];
			$resource['reso_name']=$row[4];
			$resource['reso_update_date']=$row[5];
			$resource['reso_level']=$row[6];
			$resource['reso_illustration']=$row[7];
			$myfile_info[$count++]=$resource;
		}

		if($count==0)
			$myfile_info=null;

		$user_info['id']=$user_id;
		$user_info['type']=$user_type;
		$data['user_info']=$user_info;
		$data['myfile_info']=$myfile_info;

		echo json_encode($data);
	}
	if ($_GET['query']=='init')
	{
		if($user_type=='student')
			$strsql="select b.cuz_id,b.cuz_name,c.count  from Re_imsStudent_imsCourse a,imsCourse b,V_CountResource c where a.cuz_id=b.cuz_id and a.cuz_id=c.cuz_id and a.stu_id=". $stu_id. ";";
		else
			$strsql="select b.cuz_id,b.cuz_name,c.count from Re_imsTeacher_imsCourse a,imsCourse b,V_CountResource c where a.cuz_id=b.cuz_id and b.cuz_id=c.cuz_id and a.teac_id=". $teac_id. ";";

		$result=@mysql_db_query($mysql_database, $strsql, $conn);
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

		$result=@mysql_db_query($mysql_database, $strsql, $conn);

		echo json_encode($data);
	}

	if ($_GET['query']=='respec')
	{

		$strsql="select a.reso_id,a.reso_uploader,a.reso_uploadertype,a.reso_famile,a.reso_name,a.reso_update_date,a.reso_level,a.reso_illustration from crssResource a, Re_crssResource_imsCourse b where a.reso_id=b.reso_id and b.cuz_id=". $_GET['cuz_id']. ";";
		$result=@mysql_db_query($mysql_database, $strsql, $conn);
		$count=0;

		if($user_type=='student') $user_id=$stu_id;
		if($user_type=='teacher') $user_id=$teac_id;


		while ($row=mysql_fetch_row($result))
		{
			$resource['reso_id']=$row[0];
			$resource['reso_uploader']=$row[1];
			$resource['reso_uploadertype']=$row[2];
			$resource['reso_famile']=$row[3];
			$resource['reso_name']=$row[4];
			$resource['reso_update_date']=$row[5];
			$resource['reso_level']=$row[6];
			$resource['reso_illustration']=$row[7];
			$course_info[$count++]=$resource;
		}

		if($count==0)
			$course_info=null;

		$user_info['id']=$user_id;
		$user_info['type']=$user_type;
		$data['user_info']=$user_info;
		$data['course_info']=$course_info;

		echo json_encode($data);
	}
	mysql_free_result($result);
	mysql_close($conn);  
?>
