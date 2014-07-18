<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/starter-template/# -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico"-->

        <title>Arrange subsystem</title>
    <script src="js_2/jquery.min.js"></script>
    <script src="js_2/bootstrap.min.js"></script>
    <script src="js_2/scripts.js"></script>
  

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

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
</head>

  <body>
     <!--topbar-->
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
            <h1 style="margin:10px;text-align:center;">Manually Course Adjustment</h1>
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
            <a href="#panel-303742" data-toggle="tab">Check</a>
          </li>
          <li>
            <a href="#panel-393776" data-toggle="tab">Add</a>
          </li>
          <li>
            <a href="#panel-303748" data-toggle="tab">Delete</a>
          </li>
        </ul>
      </div>
        <div class="tab-content">
          <div class="tab-pane active" id="panel-303742">
            <br/>
            <div class="jumbotron well">
              <form action="check.php" method="post" class="form-signin" role="form" target="_top">
                 <h2 class="form-signin-heading">Basic information</h2><br>
                   <input name="cr_ID" type="text" class="form-control" placeholder="Classroom ID" required autofocus>
                   <input name="teac_ID" type="text" class="form-control" placeholder="Teacher ID" required>
                   <button class="btn btn-lg btn-primary btn-block" type="submit">Check</button>
               </form>

            </div><!--jumbotron well-->
          </div><!--tab-pane-->
          <div class="tab-pane" id="panel-393776">
            <br/>
            <div class="jumbotron well">
              <form action="add_cl.php" method="post" class="form-signin" role="form">
                 <h2 class="form-signin-heading">Basic information</h2><br>
                   <input name="cuz_ID" type="text" class="form-control" placeholder="Course ID" required autofocus>
                   <input name="cl_ID" type="text" class="form-control" placeholder="Class ID" required >
                   <input name="cl_Time" type="text" class="form-control" placeholder="Class Time" required>
                   <input name="cl_Hour" type="text" class="form-control" placeholder="Class Hour" required>
                   <input name="cl_Capa" type="text" class="form-control" placeholder="Class Capacity" required>
                   <select name="cl_Term" class="form-control" required>
                       <option value="2014-2015 Fall-Winter" selected="selected">2014-2015 Fall-Winter</option>
                     </select>
                   <hr> 
                   <input name="cr_ID" type="text" class="form-control" placeholder="Classroom ID" required>
                   <input name="teac_ID" type="text" class="form-control" placeholder="Teacher ID" required>
                   <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
               </form>
            </div><!--jumbotron well-->
          </div><!--tabpane active class-->
          <div class="tab-pane" id="panel-303748">
            <br/>
            <div class="jumbotron well">
              <form  action="del_cl.php" method="post" class="form-signin" role="form">
                   <h2 class="form-signin-heading">Basic information</h2><br>
                     <input name="cl_ID" type="text" class="form-control" placeholder="class ID" required autofocus>
                     
                     <hr>
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Delete</button>
              </form>
            </div><!--jumbotron well-->
          </div><!--tab-pane-->
        </div><!--tab content-->
      </div><!--tabbable-->
    </div><!--col-md-10 column-->
  </div><!--col-lg-10-->


     
    
    </div>
    </div>
  </body>
  </html>
<?php
session_start();
if($_SESSION['user_name']=="")
{
  echo "<script> alert('Please login first!'); window.location.href='../Login.php'; </script>";
  exit(0);
}

if($_SESSION['user_type']!=1)
{
  echo "<script>alert('You do not have the right!'); window.location.href='main.html'; </script>";
  exit(0);
}
  @ $cuz_ID=$_POST['cuz_ID'];
  @ $cl_ID=$_POST['cl_ID'];
  @ $cl_Time=$_POST['cl_Time'];
  @ $cl_Hour=$_POST['cl_Hour'];
  @ $cl_Capa=$_POST['cl_Capa'];
  @ $cr_ID=$_POST['cr_ID'];
  @ $teac_ID=$_POST['teac_ID'];
  @ $cl_Term=$_POST['cl_Term'];


  if (!$cuz_ID||!$cl_ID||!$cl_Time||!$cl_Hour||!$cl_Capa||!$cr_ID||!$teac_ID||!$cl_Term) {
       echo "<p><center>输入出错, 请重新输入<center><br /></p>";
       exit();
    }

    if (!get_magic_quotes_gpc()){
        $cuz_ID=addslashes($cuz_ID);
        $cl_ID=addslashes($cl_ID);
        $cl_Time=addslashes($cl_Time);
        $cl_Hour=addslashes($cl_Hour);
        $cl_Capa=addslashes($cl_Capa);
        $cr_ID=addslashes($cr_ID);
        $teac_ID=addslashes($teac_ID);
        $cl_Term=addslashes($cl_Term);
    }
 @ $con = new mysqli("218.244.137.223","ddpse","zjuddpse2014","SEproject");
if (mysqli_connect_error())
{
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}
else{

	$sql="select *from Re_imsCourse_acaClass_imsTeacher where class_id='".$cl_ID."'";
  $res=mysqli_query($con,$sql);

  $sql2="select * from imsCourse where cuz_id='".$cuz_ID."'";
  $res2=mysqli_query($con,$sql2);

  if($res == True)
  {
    $flag=0;
    if($newArray2= mysqli_fetch_array($res2, MYSQLI_ASSOC)){
         if (!$newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
              $flag=1;
              $sql1="insert into Re_imsCourse_acaClass_imsTeacher
               values ('".$cuz_ID."','".$cl_ID."','".$teac_ID."','".$cl_Capa."',0,'".$cl_Term."')";
              $res1=mysqli_query($con,$sql1);
         }
    
    $i=0;
    $sql3="select * from acaArrange where room_id='".$cr_ID."'";
    $res3=mysqli_query($con,$sql3);
    $sql4="select * from acaArrange where teac_id='".$teac_ID."'";
    $res4=mysqli_query($con,$sql4);
    while ( $newArray3 = mysqli_fetch_array($res3, MYSQLI_ASSOC)) {
      if ($cl_Time==$newArray3['class_time']) {$i=1;}
    }
    while ( $newArray4 = mysqli_fetch_array($res4, MYSQLI_ASSOC)) {
      if ($cl_Time==$newArray4['class_time']) {$i=2;}
    }
    if ($i==0) {
      $sql6="select * from acaRoom where room_id='".$cr_ID."'";
      $res6=mysqli_query($con,$sql6);
      $newArray6 = mysqli_fetch_array($res6, MYSQLI_ASSOC);

      $sql7="select * from imsTeacher where teac_id='".$teac_ID."'";
      $res7=mysqli_query($con,$sql7);
      $newArray7 = mysqli_fetch_array($res7, MYSQLI_ASSOC);

      if($newArray6&&$newArray7)
      {
        $i1=0;
      if(($cuz_ID-$cl_ID*10>-100)&&($cuz_ID-$cl_ID*10<100)){$i1=1;}
      if ($i1==1)
      {
      if ($cl_Capa>$newArray6['room_cap']) {
        echo "<script>alert('The classroom is not big enough for this class, Please try again')</script>";
      }
      else if($cl_Hour==3&&($cl_Time%5==1||$cl_Time%5==4))
      {
        echo "<script>alert('The classtime do not have enough time for this class, Please try again')</script>";
      }
      else
      {
      $sql5="insert into acaArrange
      values ('".$cl_ID."','".$cr_ID."','".$cl_Time."','".$teac_ID."','".$cl_Hour."')";
      $res5=mysqli_query($con,$sql5);
      if($flag&&$res1&&$res5 || !$flag&&$res5)
      {
         echo "<script>alert('Add Sucessfully')</script>";
      }
      else
      {
        echo "<script>alert('Add Failed')</script>";
      }
      }
      }
      else
      {
        echo "<script>alert('The class_id is unreasonable, Please try again')</script>";
      }
      }
      else
      {
        echo "<script>alert('We do not have this classroom or this teacher, Please try again')</script>";
      }
    } 
    else if ($i==1) {
      echo "<script>alert('The classromm already have a class this time')</script>";
    }
    
    else if ($i==2) {
      echo "<script>alert('The teacher already have a class this time')</script>";
    }
    }
    else
    {
      echo "<script>alert('We do not have this course, Please try again')</script>";
    }
  }
  else
  {
    echo "<script>alert('Add Failed, Please try again')</script>";

  }
  Mysqli_close($con);
}
?>

