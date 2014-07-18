<?php	
	session_start();
	$con=mysql_connect("218.244.137.223","ddpse","zjuddpse2014");
    mysql_select_db("SEproject");
	
	$_SESSION["id_back"]=$_SESSION["view_id"];
	$_SESSION["type_back"]=$_SESSION["view_type"];
	$_SESSION["view_id"]=$_POST["id"];
	
    // Check connection
    if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysql_connect_error();
    }
	if($_POST["password"]!=$_POST["password2"])
	{
		$_SESSION["view_id"]=$_SESSION["id_back"];
		$_SESSION["view_type"]=$_SESSION["type_back"];
		header('Location: ./OperationFail2.php');
	}
	else
		$password = $_POST["password"];
	$id=$_POST["id"];
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	if(Isset($_POST["major"]))
	{
		$_SESSION["view_type"]='3';
		$major=$_POST["major"];
		$credit=$_POST["credit"];
		$grade=$_POST["grade"];
		$school=$_POST["school"];
		$GPA=$_POST["GPA"];
		$sql = "INSERT INTO `SEproject`.`imsStudent` (`stu_id`, `stu_pwd`, `stu_name`, `stu_phone`, `stu_school`, `stu_major`, `stu_grade`, `stu_address`, `stu_GPA`, `stu_credit`, `stu_email`) VALUES ('$id', '$password', '$name', '$phone', '$school', '$major', '$grade', '$address', '$GPA', '$credit', '$email');";
	}
	else if(Isset($_POST["resume"]))
	{
		$_SESSION["view_type"]='2';
		$dept=$_POST["dept"];
		$resume=$_POST["resume"];
		$title=$_POST["title"];
		$sql = "INSERT INTO `SEproject`.`imsTeacher` (`teac_id`, `teac_pwd`, `teac_right`, `teac_name`, `teac_phone`, `teac_dept`, `teac_prof_title`, `teac_resume`, `teac_address`, `teac_email`) VALUES ('$id', '$password', '$name', '$phone', '$dept', '$title', '$resume', '$address', '$email', '123');";
	}
	else
	{
		$_SESSION["view_type"]='1';
		$dept=$_POST["dept"];
		$sql = "INSERT INTO `SEproject`.`imsManager` (`mgr_id`, `mgr_pwd`, `mgr_name`, `mgr_phone`, `mgr_dept`, `mgr_address`, `mgr_email`) VALUES ('$id', '$password', '$name', '$phone', '$dept', '$address', '$email');";

	}
	
	echo $_SESSION["view_id"];
	echo "<br>";
	echo $_SESSION["view_type"];
	echo "<br>";
	echo $_POST["password"];
	echo "<br>";
	echo $_POST["password2"];
	$result = mysql_query($sql,$con);
	mysql_close($con);
	if($result==NULL)
		header('Location: ./OperationFail2.php');
	if($result=="true")
		header('Location: ./OperationSuccessful2.php');
?>