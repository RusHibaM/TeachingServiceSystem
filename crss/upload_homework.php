<?php error_reporting(0); require('conn_database.php');
	require('loginCheck.php');

	date_default_timezone_set("Asia/Shanghai");
	//$user_type='teacher';
	$hw_id=$_POST['hw_id'];
	if ($_FILES["file"]["error"] <= 0 and $user_type=='student')
	{
		
		$strsql="select a.file_id,a.file_tmpname from crssFile a,Re_crssFile_crssHomework b where a.file_uploader=". $stu_id. " and a.file_id=b.file_id and b.hw_id=". $hw_id. ";";
		$result=mysql_db_query($mysql_database,$strsql,$conn);

		
		if($row=mysql_fetch_row($result))
		{
	
			
			$file_tmpname=$row[1];
			$file_id=$row[0];
			unlink("./upload/". $file_tmpname);
			$strsql="delete from crssFile where file_id=". $file_id. ";";
			mysql_db_query($mysql_database, $strsql, $conn);
			$strsql="delete from Re_crssFile_crssHomework where file_id=". $file_id. " and hw_id=". $hw_id. ";";
			mysql_db_query($mysql_database, $strsql, $conn);
		}
		$file_size=$_FILES["file"]["size"]/1048576;
		$strsql="insert into crssFile (file_date,file_name,file_type,file_size,file_uploader,file_level) values('". date("Y-m-d"). "','". $_FILES["file"]["name"]. "','homework',". $file_size. ",". $stu_id. ",". "'private'".  ");";

	
		
		if($result=mysql_db_query($mysql_database, $strsql, $conn))
		{

			$file_id=mysql_insert_id();
			$file_tmpname=$_FILES["file"]["name"]. ".". $file_id;
			$strsql="update crssFile set file_tmpname='". $file_tmpname. "' where file_id=". $file_id. ";";
			mysql_db_query($mysql_database, $strsql, $conn);
			$strsql="insert into Re_crssFile_crssHomework (file_id,hw_id) values(". $file_id. ",". $hw_id. ");";
			mysql_db_query($mysql_database, $strsql, $conn);
			move_uploaded_file($_FILES["file"]["tmp_name"],
					"./upload/" . $file_tmpname);
		}
	}
?>
