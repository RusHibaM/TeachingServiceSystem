<?php
	session_start();
//	$_SESSION['role']="teacher";
//	$_SESSION['id']=1;
	$user_id=$_SESSION["user_id"];
?>
<?php
$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
if(!$con)
    echo "no connection";
mysql_select_db("SEproject");

$temp = $_GET['t'];
$a = mysql_real_escape_string($temp); 
$temp1 = $_GET['p'];
$tag = mysql_real_escape_string($temp1); 
$temp2 = $_GET['q'];
$score = mysql_real_escape_string($temp2); 
$temp3 = $_GET['r'];
$stuid = mysql_real_escape_string($temp3); 
$temp4 = $_GET['s'];
$clsid = mysql_real_escape_string($temp4); 
if($a){
    mysql_query("UPDATE smModifyrequest SET valid = 0 WHERE tag = $tag");
    mysql_query("UPDATE smScore SET score = $score WHERE studentid = $stuid AND classid = $clsid");
}
else
    mysql_query("UPDATE smModifyrequest SET valid = 0 WHERE tag = $tag");
    
mysql_close($con);

echo "<script>location.href='modify_process.php';</script>";
?>