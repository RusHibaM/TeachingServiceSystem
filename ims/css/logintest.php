<?php 
//require "../include/DBClass.php"; 


session_start();
$user_id=$_POST['user_id']; 
$password=$_POST['password']; 
$user_type = $_POST['user_type'];
//echo "test"; 
//echo $user_type;
//echo $user_id;
//mgr_id mgr_pwd  stu_id stu_pwd teac_id teac_pwd
//islogin 
//connect to databased

$con=mysql_connect("218.244.137.223","ddpse","zjuddpse2014");
mysql_select_db("SEproject",$con);
            // Check connection
 if (!$con) {
    echo "Failed to connect to MySQL: " ;
	}

//$username = $username;
//$password=$password; 
//$user_type = $user_type

if ($user_type == "Student"){
	//echo"inside if";
	$SQL = "Select stu_id, stu_name From imsStudent where stu_id =  $user_id and stu_pwd = $password";
	}
elseif($user_type == "Teacher"){
	$SQL = "Select teac_id, teac_name From imsStudent where teac_id =  $user_id and teac_pwd = $password";
	}
else {
	$SQL = "Select mgr_id, mgr_name From imsStudent where mgr_id =  $user_id and mgr_pwd = $password";
 }

//echo $SQL; 
//echo "end of selecting from database";

$result = mysql_query($SQL); 
//echo "end of input to result  ";
//echo $result;
//echo $con;
$total=mysql_num_rows($result); 
//echo "result to total";
 if($total==0){ 
   //mysql_close($con);
   //echo "The user id is not registered yet or still needs to be confirmed";
   //header("Location: ./login33.html"); 
  //Go_Msg("The user id is not registered yet or still needs to be confirmed","login.html"); 
   echo '<script language = "JavaScript">; alert("The user id is not registered yet or still needs to be confirmed"); location.href = "Login.php";</script>;';
  exit; 
 }
 //echo "end of testing user find";
// echo "before into other things";
 
  
  $Rs = mysql_fetch_array($result);
  //$_SESSION["user_name"] = $Rs["stu_name"];
  //附值，并登录 
  
 
  if($user_type == "Student"){
		$_SESSION["user_type"]=3;
		$_SESSION["view_id"]=3;
		$_SESSION["view_type"]=3;
		$_SESSION["user_name"] = $Rs["stu_name"];
		//echo $_SESSION["user_name"];
		}
  elseif($user_type == "Teacher"){
        $_SESSION["user_type"]=2;
        $_SESSION["view_id"]=2;
        $_SESSION["view_type"]=2;
		$_SESSION["user_name"] = $Rs["teac_name"];}
  else {
        $_SESSION["user_type"]=1;
        $_SESSION["view_id"]=1;
        $_SESSION["view_type"]=1;
		$_SESSION["user_name"] = $Rs["mgr_name"];}  
  $_SESSION["user_id"]=$user_id;
  $_SESSION["view_id"]=$_SESSION["user_id"];

 // echo "    after input to session   before login successful";
  
  $islogin = 0;
 // echo $_SESSION["user_type"];
  
  
  //echo $_SESSION["username"]; 
  if ($_SESSION["user_type"]==3){ 
    //echo "Login Successful！"; 
	header("Location: welcome.php");
	//$SQL = "Select stu_id, stu_pwd From imsStudent where stu_id = '". $username ."' and stu_pass = '". $password . "'";
    $islogin = 1;
  } 
  if ($_SESSION["user_type"]==2){ 
     //echo "Login Successful！";
	 //header('Location: ./OperationSuccessful.html');
	 header("Location: ./welcome.php"); 
	// $SQL = "Select teac_id, teac_pwd From imsTeacher where teac_id = '". $username ."' and teac_pass = '". $password . "'";
	$islogin = 1;
  } 
  if ($_SESSION["user_type"]==1){ 

     //echo "Login Successful！"; 
	 header("Location: ./welcome.php");
	 $islogin = 1;
	// $SQL = "Select mgr_id, mgr_pwd From imsManager where mgr_id = '". $username ."' and mgr_pass = '". $password . "'";
 
  } 
  $_SESSION["islogin"]=$islogin;
  // header('Location:default.php'); 
 
//echo "out of else";

 mysql_close($con); 


?>  