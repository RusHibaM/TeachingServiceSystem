<?php
 session_start();
 $teacher=$_SESSION["user_id"];
 $con = mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
 if(!$con)
 { $respon['result']="no";
	//echo json_encode($respon);
 }
 else 
 { $respon['result']="yes";
   //echo json_encode($respon);
 }
 mysql_select_db("SEproject");
 $arr=$_GET;
 if($arr['cmd']=="class")
 {
   $sql="select * from Re_imsCourse_acaClass_imsTeacher,imsCourse where teac_id=".$teacher." and is_graded=1 and Re_imsCourse_acaClass_imsTeacher.cuz_id=imsCourse.cuz_id";
  // print($sql);
   if($result=mysql_query($sql,$con))
    {
	 $index=0;
	  while($row = mysql_fetch_array($result))
	  {
	    $respon['classid'][$index]=$row['class_id'];
		$respon['classname'][$index]=$row['cuz_name'];
		$index=$index+1;
	  }
	}
	
	
 }
 
 if ($arr['cmd']=="score")
 {
    $sql="select  * from smScore where classid='$arr[classid]' order by score desc";
	if($result=mysql_query($sql,$con))
	{ 
	$index=0;$total=0;
	 while($row = mysql_fetch_array($result))
	  {
	    $respon['sid'][$index]=$row['studentid'];
		$respon['name'][$index]=$row['student_name'];
		$respon['score'][$index]=$row['score'];
		$respon['term']=$row['term'];
		$respon['coursename']=$row['coursename'];
		$index=$index+1;
		$total=$total+$row['score'];
	  }
	}
	$respon['average']=$total/$index;
 }
  echo json_encode($respon);
   mysql_close($con);
?>