<?php
	session_start();
	if($_SESSION["islogin"]!=1||$_SESSION["user_type"]!=2)
	{

		print("<script>alert('Please Log in!')</script>");
	    Print  ("<script language='javascript'>location.replace('../../Login.php')</script>"); 
	exit;
	}
?>

<?php
	$count=$_POST["stu_count"];
	$clsid=$_POST["clsid"];
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	$stu_count=0;
	if(!$con)
			echo "no connection";
	mysql_select_db("SEproject");

	while($count>0)
	{
		$sid=$_POST["stu".$count];	
		$score=$_POST[$sid];
		//update MyClass set name='Mary' where id=1;
		$sql1 = "UPDATE smScore SET score = ".$score." WHERE classid =".$clsid." AND studentid =".$sid;
		
		$sql2 = "UPDATE Re_imsCourse_acaClass_imsTeacher SET is_graded=1 WHERE class_id=".$clsid;
 		
		if(!mysql_query($sql1))
			{	
				die("<h1>Error in updating table smScore!</h1>");
			
			}
		else
			if(!mysql_query($sql2))
			{
			die("<h1>Error in updating table smcourseclass!</h1>");
			}
		
		$count=$count-1;
	}
	
	
	print("<script>alert('Succeess in score record!')</script>");
	    Print  ("<script language='javascript'>location.replace('./score_record.php')</script>"); 
	exit;

?>