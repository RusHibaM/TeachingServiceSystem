
<?php
session_start();
$ID=$_SESSION['ID'];
if($_SESSION['ID']=="")
{
  echo "<script> alert('Please login first'); window.location.href='login.html'; </script>";
}
require_once("conn.php");			//连接数据库
date_default_timezone_set('Asia/Shanghai');	//设置本地时间

$testid = $_GET['testid'];
$result=mysql_query("SELECT *
					FROM otstaketest WHERE otstaketest.ots_PaperID=$testid AND ots_StudentID=$ID" );
		$exsit=mysql_fetch_array($result);
		if($exsit!=NULL)
		{
		     echo "<script> alert('You have take that test'); window.location.href='oltest.php'; </script>";
		}
        $_SESSION['TID']=$testid ;
		echo "<script> alert('test start'); window.location.href='dotest.php'; </script>";
	mysql_close($con);
	?>
