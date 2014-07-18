<?php
	$USERID=$_GET['userid'];
	$USERPASSWORD=$_GET['userpassword'];

	session_start();
	$_SESSION['userid']=$USERID;

	$data['test']=123;
	echo json_encode($data);
?>