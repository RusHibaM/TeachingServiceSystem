<?php
	session_start();
	if(!isset($_SESSION["user_name"]))
	{	
		header('Location: ./OperationFail.php');
	}
	$_SESSION['count']=0;
	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	if(!$con)
	echo "no connection";
	mysql_select_db("SEproject");
	$cid = $_POST["cid"];
	$cch = $_POST["cch"];
	$cname = $_POST["cname"];
	$ceh = $_POST["ceh"];
	$csc = $_POST["csc"];
	$ccc = $_POST["ccc"];
	$ccr = $_POST["ccr"];
	if($_POST["cid"]==NULL) $cid = -1;
	if($_POST["cch"]==NULL) $cch = -1;
	if($_POST["ceh"]==NULL) $ceh = -1;
	if($_POST["ccc"]==NULL) $ccc = "-1";
	if($_POST["ccr"]==NULL) $ccr = "-1";
	if($_POST["cname"]==NULL) $cname = "-1";
	$sql = "select cuz_name,cuz_content,cuz_id from `imsCourse` where `cuz_id`=".$cid." or `cuz_theoryhour` =".$cch." or `cuz_experimentalhour`=".$ceh." or `cuz_name` like '%".$cname."%' or `cuz_content` like'%".$ccc."%' or `cuz_requirement` like'%".$ccr."%' or `cuz_school`='".$csc."'";
	$res = mysql_query($sql);
	if($res==NULL)
		header('Location: ./SearchNoR.html');
    else
	{
		$_SESSION['count']=0;
		$_SESSION['cname_0']=NULL;
		$_SESSION['cname_1']=NULL;
		$_SESSION['cname_2']=NULL;
		$_SESSION['cname_3']=NULL;
		$_SESSION['cname_4']=NULL;
		$_SESSION['content_0']="-123";
		$_SESSION['content_1']="-123";
		$_SESSION['content_2']="-123";
		$_SESSION['content_3']="-123";
		$_SESSION['content_4']="-123";
		while($row = mysql_fetch_array($res))
  		{
 			//echo $row['cuz_name'] . " " . $row['cuz_content'];
  			//echo "<br />";
  			if($_SESSION['count']==0)
  			{
  				$_SESSION['cname_0']=$row['cuz_name'];
  				$_SESSION['cid_0']=$row['cuz_id'];
  				$_SESSION['content_0']=$row['cuz_content'];
  				$_SESSION['count']=$_SESSION['count']+1;
  			}
  			else if($_SESSION['count']==1)
  			{
  				$_SESSION['cname_1']=$row['cuz_name'];
  				$_SESSION['cid_1']=$row['cuz_id'];
  				$_SESSION['content_1']=$row['cuz_content'];
  				$_SESSION['count']=$_SESSION['count']+1;
  			}
  			else if($_SESSION['count']==2)
  			{
  				$_SESSION['cname_2']=$row['cuz_name'];
  				$_SESSION['cid_2']=$row['cuz_id'];
  				$_SESSION['content_2']=$row['cuz_content'];
  				$_SESSION['count']=$_SESSION['count']+1;
  			}
  			else if($_SESSION['count']==3)
  			{
  				$_SESSION['cname_3']=$row['cuz_name'];
  				$_SESSION['cid_3']=$row['cuz_id'];
  				$_SESSION['content_3']=$row['cuz_content'];
  				$_SESSION['count']=$_SESSION['count']+1;
  			}
  			else if($_SESSION['count']==4)
  			{
  				$_SESSION['cname_4']=$row['cuz_name'];
  				$_SESSION['cid_4']=$row['cuz_id'];
  				$_SESSION['content_4']=$row['cuz_content'];
  				$_SESSION['count']=$_SESSION['count']+1;
  			}
  			else break;
  		}
  		if($_SESSION['count']!=0)
  		header('Location: ./CourseSearchResultPresent.php');
		//echo $sql;
  		else header('Location: ./SearchNoR.php');

	}
?>
