<?php error_reporting(0); require('conn_database.php');
	require('characterCheck.php');
	require('loginCheck.php');

	if ($_GET['query']=='search')
	{
		$searchkeyword=$_GET['searchkeyword'];
		if($user_type=='student'||$user_type=='teacher'){
			$strsql="select a.reso_id,a.reso_uploader,a.reso_uploadertype,a.reso_famile,a.reso_name,a.reso_update_date,a.reso_level,a.reso_illustration from crssResource a where a.reso_name like '%".$searchkeyword."%' and a.reso_level='public';";
		}

		$result=@mysql_db_query($mysql_database, $strsql, $conn);


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

		$data['course_info']=$course_info;
		echo json_encode($data);
	}
	mysql_free_result($result);
	mysql_close($conn);  
?>
