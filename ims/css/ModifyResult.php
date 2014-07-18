<?php
	session_start();//session start
	//Get connection to database
	if(!isset($_SESSION["user_name"]))
	{	
		header('Location: ./OperationFail.php');
	}
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	if(!$con)
	echo "no connection";
	mysql_select_db("SEproject");
	
	if($_POST['mid_status']=="on"&&$_POST['mid']!=NULL)$nid = $_POST['mid'];
	else $nid = $_SESSION['reid'];
	
	if($_POST['mcn_status']=="on")$nname = $_POST['mcn'];
	else $nname = $_SESSION['rename'];
	
	if($_POST['mch_status']=="on")$nch = $_POST['mch'];
	else $nch = $_SESSION['rech'];
	
	if($_POST['meh_status']=="on")$neh = $_POST['meh'];
	else $neh = $_SESSION['reeh'];
	
	if($_POST['mit_status']=="on")$nit = $_POST['mit'];
	else $nit = $_SESSION['recre'];
	
	if($_POST['moo_status']=="on")$noo = $_POST['moo'];
	else $noo = $_SESSION['resch'];
	
	if($_POST['mcc_status']=="on")$ncc = $_POST['mcc'];
	else $ncc = $_SESSION['recc'];
	
	if($_POST['mcr_status']=="on")$ncr = $_POST['mcr'];
	else $ncr = $_SESSION['recr'];
	
	$sql = "UPDATE `imsCourse` SET `cuz_id`=".$nid.",`cuz_theoryhour`=".$nch.",`cuz_experimentalhour`=".$neh.",`cuz_name`='".$nname."',`cuz_credit`=".$nit.",`cuz_content`='".$ncc."',`cuz_requirement`='".$ncr."',`cuz_school`='".$noo."' WHERE `cuz_id`=".$_SESSION['reid'];
	if(!mysql_query($sql))
	{
		header('Location: ./OperationFail.html'); 
	}
	else header('Location: ./OperationSuccessful.html');
?>