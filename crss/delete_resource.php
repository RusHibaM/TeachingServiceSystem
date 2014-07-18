<?php error_reporting(0); require('conn_database.php');
	require('characterCheck.php');
	require('loginCheck.php');

	$reso_id=$_GET['reso_id'];
	$strsql="select file_id from Re_crssFile_crssResource where reso_id=". $reso_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	$row=mysql_fetch_row($result);
	$file_id=$row[0];

	$strsql="select file_tmpname  from crssFile where file_id=". $file_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	if($row=mysql_fetch_row($result))   {   //检查文件是否存在  
		$file_tmpname=$row[0];
	}
	$file_dir="./upload/".$file_tmpname."";
	unlink($file_dir);

	$strsql="delete from crssFile where file_id=". $file_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	$strsql="delete from crssResource where reso_id=". $reso_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	$strsql="delete from Re_crssFile_crssResource where file_id=". $file_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	$strsql="delete from Re_crssResource_imsCourse where reso_id=". $reso_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);

	header("location: ./resource.html");

?> 
