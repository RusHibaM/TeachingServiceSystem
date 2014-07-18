<?php
	session_start();
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	if(!$con)
	{
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("SEproject",$con);
	$ID = $_SESSION["view_id"];
	if($_POST["mname"]!=NULL&&$_POST["mname"]=="on")$Name = $_POST["Name"];
	else $Name = $_SESSION["view_name"];
	if($_POST["mphone"]!=NULL&&$_POST["mphone"]=="on")$Phone = $_POST["Phone"];
	else $Phone = $_SESSION["Phone"];
	if($_POST["memail"]!=NULL&&$_POST["memail"]=="on")$Email = $_POST["Email"];
	else $Email = $_SESSION["Email"];
	if($_POST["maddress"]!=NULL&&$_POST["maddress"]=="on")$Address = $_POST["Address"];
	else $Address = $_SESSION["Address"];
	if($_POST["mpass"]!=NULL&&$_POST["mpass"]=="on")$Password = $_POST["Password"];
	else $Password = $_SESSION["Password"];
	if($_SESSION["view_type"]=="3")
	{		
		if($_POST["mprivlg"]!=NULL&&$_POST["mprivlg"]=="on")$Privlg = $_POST["Privlg"];
			else $Privlg = $_SESSION["Privlg"];
		if($_POST["mgrade"]!=NULL&&$_POST["mgrade"]=="on")$Grade = $_POST["Grade"];
			else $Grade = $_SESSION["Grade"];
		if($_POST["mmajor"]!=NULL&&$_POST["mmajor"]=="on")$Major = $_POST["Major"];
			else $Major = $_SESSION["Major"];
		if($_POST["mschool"]!=NULL&&$_POST["mschool"]=="on")$School = $_POST["School"];
			else $School = $_SESSION["School"];
		if($_POST["mgpa"]!=NULL&&$_POST["mgpa"]=="on")$GPA = $_POST["GPA"];
			else $GPA = $_SESSION["GPA"];
		if($_POST["mcredit"]!=NULL&&$_POST["mcredit"]=="on")$Credit = $_POST["Credit"];
			else $Credit = $_SESSION["Credit"];
		$query="UPDATE imsStudent SET 
			stu_name = '$Name',stu_pwd = '$Password',stu_right = '$Privlg',
			stu_grade = '$Grade',stu_phone = '$Phone',stu_address = '$Address',
			stu_email = '$Email',stu_major = '$Major',stu_school = '$School',
			stu_GPA = '$GPA',stu_credit = '$Credit'
			WHERE stu_id = '$ID'";
	}
	else
	{
		if($_POST["mdept"]!=NULL&&$_POST["mdept"]=="on")$Resume = $_POST["Dept"];
			else $Dept = $_SESSION["Dept"];

		if($_SESSION["view_type"]=="2")
		{
			if($_POST["mresume"]!=NULL&&$_POST["mresume"]=="on")$Resume = $_POST["Resume"];
				else $Resume = $_SESSION["Resume"];
				
			if($_SESSION["user_type"]=="2")
			{				
				$Privlg = $_SESSION["Privlg"];
				$Title = $_SESSION["Title"];
				$Dept = $_SESSION["Dept"];
			}
			else
			{
				if($_POST["mprivlg"]!=NULL&&$_POST["mprivlg"]=="on")$Privlg = $_POST["Privlg"];
				else $Privlg = $_SESSION["Privlg"];
				if($_POST["mtitle"]!=NULL&&$_POST["mtitle"]=="on")$Title = $_POST["Title"];
				else $Title = $_SESSION["Title"];
			}
			$query="UPDATE imsTeacher SET 
			teac_name = '$Name',teac_pwd = '$Password',teac_right = '$Privlg',
			teac_title = '$Title',teac_phone = '$Phone',teac_address = '$Address',
			teac_email = '$Email',teac_resume = '$Resume',teac_dept = '$Dept'
			WHERE teac_id = '$ID'";
		}
		else
		{
			$query="UPDATE imsManager SET 
			mgr_name = '$Name',mgr_pwd = '$Password',
			mgr_phone = '$Phone',mgr_address = '$Address',
			mgr_email = '$Email',mgr_dept = '$Dept'
			WHERE mgr_id = '$ID'";
		}
	}
	echo $query;
	$result = mysql_query($query);
	echo $result;
	mysql_close($con);	
	$_SESSION["return"]="update";
	if($result)
		header('Location: ./OperationSuccessful2.php');
	else
	{
		header('Location: ./OperationFail2.php');
	}
?>