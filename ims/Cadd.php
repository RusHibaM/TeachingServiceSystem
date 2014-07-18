<?php
	session_start();
	if(!isset($_SESSION["user_name"]))
	{	
		header('Location: ./OperationFail.php');
	}
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	if(!$con)
	echo "no connection";
	mysql_select_db("SEproject");
	if($_GET["acid"]==NULL||$_GET["achour"]==NULL||$_GET["aceh"]==NULL||$_GET["acname"]==NULL||$_GET["cit"]==NULL||$_GET["accc"]==NULL||$_GET["accr"]==NULL||$_GET["acsch"]==NULL)	header('Location: ./OperationFail.html');
	$sql = "INSERT INTO `imsCourse`(`cuz_id`, `cuz_theoryhour`, `cuz_experimentalhour`, `cuz_name`, `cuz_credit`, `cuz_content`, `cuz_requirement`, `cuz_school`) VALUES ('". $_GET["acid"]."', ".$_GET["achour"].", ".$_GET["aceh"].", '".$_GET["acname"]."', ".$_GET["cit"].", '".$_GET["accc"]."', '".$_GET["accr"]."', '".$_GET["acsch"]."')";
	if(mysql_query($sql))
	{
		header('Location: ./OperationSuccessful.php');
	}
	else header('Location: ./OperationFail.php');
?>