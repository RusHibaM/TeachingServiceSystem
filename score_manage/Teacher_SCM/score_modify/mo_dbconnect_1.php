<?php
  session_start();
	$count=$_POST["stu_count"];
	$clsid=$_SESSION["clsid"];
	$teacid=$_POST["teac_id"];
	$teac_name=$_POST["teac_name"];
	$coursename=$_POST["coursename"];
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	$stu_count=0;
	if(!$con)
			echo "no connection";
	mysql_select_db("SEproject");

	while($count>0)
	{
		$sid=$_POST["stu".$count];	
		$sname=$_POST[$count."_name"];
		$o_score=$_POST[$count."_osc"];
		if($score=$_POST[$sid]){
		
		$sql1 = "UPDATE smScore SET score = $score WHERE studentid = $sid AND courseid = $clsid";
		
		if(!mysql_query($sql1))
			{	
				die("<h1>Error in updating table smScore!</h1>");
			
			}
		
		}
		$count=$count-1;

	}
	
	
	print("<script>alert('Succeess in score record!')</script>");
	    Print  ("<script language='javascript'>location.replace('./score_modify.php')</script>"); 
	exit;

?>