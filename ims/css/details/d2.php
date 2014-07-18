<?php
	session_start();
	if($_SESSION['cname_1']==NULL) header('Location: ../CourseSearchResultPresent.php');
	//Get the connection to the database
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	if(!$con)
	echo "no connection";
	mysql_select_db("SEproject");
	
	//Prepare for the datails present
	$name = $_SESSION['cname_1'];
	$sql = "select * from `imsCourse` where `cuz_name`='".$name."'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$_SESSION['rename']=$_SESSION['cname_1'];
	$_SESSION['reid']=$row['cuz_id'];
	$_SESSION['rech']=$row['cuz_theoryhour'];
	$_SESSION['reeh']=$row['cuz_experimentalhour'];
	$_SESSION['recre']=$row['cuz_credit'];
	$_SESSION['resch']=$row['cuz_school'];
	$_SESSION['recc']=$row['cuz_content'];
	$_SESSION['recr']=$row['cuz_requirement'];
	header('Location: ../CourseInformationpresent.php');
?>