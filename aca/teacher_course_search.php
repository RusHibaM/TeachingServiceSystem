<?php

session_start();
if($_SESSION['user_name']=="")
{
  echo "<script> alert('Please login first!'); window.location.href='../Login.php'; </script>";
  exit(0);
}

if($_SESSION['user_type']!=2)
{
  echo "<script>alert('You do not have the right!'); window.location.href='main.html'; </script>";
  exit(0);
}



$con = mysql_connect("218.244.137.223","ddpse","zjuddpse2014");//存放数据的DataBase
if(!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("SEproject", $con);

$t_id=$_POST['teacher_id'];

if($t_id!=$_SESSION['user_id'])
{
  echo "<script>alert('You do not have the right!'); window.location.href='4.html'; </script>";
  exit(0);
}


$check="select * from imsTeacher where teac_id='".$t_id."'" ;//用于错误信息指示
$test = mysql_query($check,$con);
if(!mysql_fetch_array($test)){
   echo "<script> alert(\"Wrong Teacher ID!Please check again.\"); window.location.href='4.html';</script>";

}
	for($i=1;$i<=25;$i++)
	$array[$i]=array();
	$sql="select * from acaArrange where teac_id='".$t_id."' order by class_time" ;
    $test = mysql_query($sql,$con);
    while($row = mysql_fetch_array($test))
	{
	$class_id=$row['class_id'];
	$room_id=$row['room_id'];
	$class_time=$row['class_time'];
	$teac_id=$row['teac_id'];
	$pro_time=$row['pro_time'];
	//echo $class_id.$room_id.$class_time.$teac_id.$pro_time;
	$sql1="select room_name,campus from acaRoom where room_id='".$room_id."'" ;
	$result = mysql_query($sql1,$con);
	$room = mysql_fetch_array($result);
	$classroom=$room['room_name'].", ".$room['campus'];
	$sql1="select cuz_id from Re_imsCourse_acaClass_imsTeacher where class_id='".$class_id."'" ;
	$result = mysql_query($sql1,$con);
	$cuz = mysql_fetch_array($result);
	$sql1="select cuz_Name from imsCourse where cuz_id='".$cuz['cuz_id']."'" ;
	$result = mysql_query($sql1,$con);
	$cname = mysql_fetch_array($result);
	$cuz_name=$cname['cuz_Name'];
	$sql1="select teac_name from imsTeacher where teac_id='".$teac_id."'" ;
	$result = mysql_query($sql1,$con);
	$tname = mysql_fetch_array($result);
	$teac_name=$tname['teac_name'];
	$array[$class_time]=array('classroom'=>$classroom, 'cuz_name'=>$cuz_name, 'teac_name'=>$teac_name, 'pro_time'=>$pro_time);
	}
	/*for($i=1;$i<=25;$i++)
	{
		if(empty($array[$i]))
		echo " ";
		else
		echo $array[$i]['classroom'].$array[$i]['cuz_name'].$array[$i]['teac_name'].$array[$i]['pro_time'];
		echo "<hr>";
	}*/
	mysql_close($con);  
function show($a)
{
		global $array;
		if(empty($array[$a]))
		echo "";
		else
		echo $array[$a]['classroom']."<br/>".$array[$a]['cuz_name']."<br/>".$array[$a]['teac_name']."<br/>".$array[$a]['pro_time'];
}
?>

<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/starter-template/# -->
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico"-->

    <title>Automatic Course Arrangement Subsystem</title>
	

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="http://getbootstrap.com/csshide1.css">
<link rel="stylesheet" href="http://getbootstrap.com/csshide2.css">
<link rel="stylesheet" href="http://getbootstrap.com/csshide3.css">
<link rel="stylesheet" href="http://getbootstrap.com/csshide4.css">
<style></style>
<link rel="stylesheet" href="http://getbootstrap.com/abprule.css">
<style></style>
<style></style>
<link href="css_2/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css_2/aboutus.css">
    <!-- Bootstrap theme -->
    <link href="css_2/bootstrap-theme.min.css" rel="stylesheet">
    <script src="js_2/jquery.min.js"></script>
    <script src="js_2/bootstrap.min.js"></script>
    <script src="js_2/scripts.js"></script>

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
</head>

  <body>

           <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../welcome.php">Teaching Service Subsystem</a>
      </div><!--navbar-header-->
      
      <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Other Subsystem<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header" style="font-size:18px">The portals:</li>
                  <li style="height:3px"><br/></li>
                  <li><a href="">Information Management System</a></li>
                  <li class="divider"></li>
                  <li><a href="">Automatic Course Arrangement Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Course Selection Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Discussion Forum Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Online Testing Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Score Management Subsystem</a></li>
                </ul>
              </li>
            </ul><!--nav navbar-nav-->
      <a href="../logout.php"><button id="logout" type="button" class="btn btn-success navbar-btn navbar-right">Log out</button> </a>
      <button  id="logout" style="#8A2BE2" class="btn navbar-btn navbar-right" ><?php echo $_SESSION["user_name"]; ?></button><!--User's name is here-->
          </div><!--/.nav-collapse -->
        </div><!--container-fluid-->
        </div><!--navbar navbar-inverse navbar-fixed-top-->

 <hr>
        <div class="col-lg-12">
            <h1 style="margin:10px;text-align:center;">Teacher Course Search</h1>
        </div>


    <div class="container">
	
        <div class="row">
        <div class="col-md-2">

      

        <a href="1.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-default" style="font-size: 1em"><b>Teaching Resource<br> Management</b></button>
        </a>

        <a href="2.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-primary" style="font-size: 1em"><b>Automatically Course<br> Scheduling</b></button>
        </a>

        <a href="3.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-success" style="font-size: 1em"><b>Manually Course<br> Adjustment</b></button>
        </a>

        <a href="4.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-info" style="font-size: 1em"><b>Teacher Course<br>Search</b></button>
        </a>

        <a href="5.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-warning" style="font-size: 1em"><b>Classroom <br>Inquiry</b></button>
        </a>
        </div>

 <div class="col-lg-10" style="background-color: #fafafa;  min-width:800px;">
        
    <div class="col-md-10 column">
      <div class="tabbable" id="tabs-12518">
      <div style="width:350px; height:50px;">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#panel-303742" data-toggle="tab">Result</a>
          </li>
        </ul>
      </div>
        <div class="tab-content">
          <div class="tab-pane active" id="panel-303742">
            <br/>
            <div class="jumbotron well">
              <table border="1">
	<thead>
		<tr>
		<th>Time</th>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<th>1,2</br>8:00-9:35</th>
		<td>
		<?php
		show(1);
	    ?>
		</td>
		<td>
		<?php
		show(6);
	    ?>
		</td>
		<td>
		<?php
		show(11);
	    ?>
		</td>
		<td>
		<?php
		show(16);
	    ?>
		</td>
		<td>
		<?php
		show(21);
	    ?>
		</td>
		</tr>
		<tr>
		<th>3,4,5</br>9:50-12:15</th>
		<td>
		<?php
		show(2);
	    ?>
		</td>
		<td>
		<?php
		show(7);
	    ?>
		</td>
		<td>
		<?php
		show(12);
	    ?>
		</td>
		<td>
		<?php
		show(17);
	    ?>
		</td>
		<td>
		<?php
		show(22);
	    ?>
		</td>
		</tr>
		<tr>
		<th>6,7,8</br>1:15-3:40</th>
		<td>
		<?php
		show(3);
	    ?>
		</td>
		<td>
		<?php
		show(8);
	    ?>
		</td>
		<td>
		<?php
		show(13);
	    ?>
		</td>
		<td>
		<?php
		show(18);
	    ?>
		</td>
		<td>
		<?php
		show(23);
	    ?>
		</td>
		</tr>
		<tr>
		<th>9,10</br>3:55-5:30</th>
		<td>
		<?php
		show(4);
	    ?>
		</td>
		<td>
		<?php
		show(9);
	    ?>
		</td>
		<td>
		<?php
		show(14);
	    ?>
		</td>
		<td>
		<?php
		show(19);
	    ?>
		</td>
		<td>
		<?php
		show(24);
	    ?>
		</td>
		</tr>
		<tr>
		<th>11,12,13</br>6:30-8:55</th>
		<td>
		<?php
		show(5);
	    ?>
		</td>
		<td>
		<?php
		show(10);
	    ?>
		</td>
		<td>
		<?php
		show(15);
	    ?>
		</td>
		<td>
		<?php
		show(20);
	    ?>
		</td>
		<td>
		<?php
		show(25);
	    ?>
		</td>
		</tr>
	<tbody>
	</table>
            </div><!--jumbotron well-->
          </div><!--tab-pane-->
        </div><!--tab content-->
      </div><!--tabbable-->
    </div><!--col-md-10 column-->
  </div><!--col-lg-10-->
  </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./Starter Template for Bootstrap_files/bootstrap.min.js"></script>
  

</body>
</html>


