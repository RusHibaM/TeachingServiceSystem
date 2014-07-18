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
		$reason=$_POST[$count."_reason"];
		$result = mysql_query("SELECT MAX(tag) AS max FROM smModifyrequest");
		$row = mysql_fetch_array($result);
		$tag = $row['max'] + 1;
		if($score=$_POST[$sid]){
		$sql1 = "INSERT INTO smModifyrequest VALUES('$clsid','$coursename','$teacid','$teac_name','$sid','$sname','$o_score','$score','$reason',1,$tag)";
		print($sql1);
		if(!mysql_query($sql1))
			{	
				die("<h1>Error in updating table smScore!</h1>");
			}
		}
		$count=$count-1;
	}
	print("<script>alert('Succeess in score record!')</script>");
	Print("<script language='javascript'>location.replace('./score_modify_app.php')</script>"); 
	exit;
?>