<?php error_reporting(0); require('conn_database.php');
	require('characterCheck.php');
	require('loginCheck.php');

	$reso_id=$_GET['reso_id'];
	$strsql="select file_id from Re_crssFile_crssResource where reso_id=". $reso_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	$row=mysql_fetch_row($result);
	$file_id=$row[0];

	$strsql="select file_name,file_tmpname  from crssFile where file_id=". $file_id.";";
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	$file_dir='./upload';
	$file_dir = $file_dir."/";
	if(!$row=mysql_fetch_row($result))   {   //检查文件是否存在  
	  echo   "File not exist";  
	  exit;    
	}
	else   
	{  
		$file_name=$row[0];
		$file_tmpname=$row[1];
		$file = fopen($file_dir . $file_tmpname,"r"); // 打开文件
		// 输入文件标签
		Header("Content-type: application/octet-stream");
		Header("Accept-Ranges: bytes");
		Header("Accept-Length: ".filesize($file_dir . $file_tmpname));
		Header("Content-Disposition: attachment; filename=".$file_name);
		// 输出文件内容
		echo fread($file,filesize($file_dir . $file_tmpname));
		fclose($file);
		exit();
	}
?> 
