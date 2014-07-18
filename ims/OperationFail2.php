<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Subsystem for resource sharing">
    <meta name="author" content="Syntax_Error">
    <link rel="shortcut icon" href="">

    <title>Information Management Subsystem -- Add a Course</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="./css/mainstyle.css" rel="stylesheet">

    <script src="./js/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

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
            <a class="navbar-brand" href="IMSwelcome.php">Information Management Subsystem</a>
      </div><!--navbar-header-->
      
      <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">User Information<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header" style="font-size:18px">The portals:</li>
                  <li style="height:3px"><br/></li>
                  <li><a href="view.php">View My Information</a></li>
                  <li class="divider"></li>
                  <li><a href="lookup.php">User Information Query</a></li>
				  <?php
					if($_SESSION["user_type"]=="1")
					{
					  echo  "<li class=\"divider\"></li>";
					  echo	"<li><a href=\"add.php\">User Information Add</a></li>";
					}
				  ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Course Basic Information<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header" style="font-size:18px">The portals:</li>
                  <li style="height:3px"><br/></li>
                  <li><a href="CourseBasicInformationQuery.php">Course Basic Information Search</a></li>
                  <li class="divider"></li>
                  <li><a href="CourseBasicInformationQuery.php">Course Basic Information Modify</a></li>
                  <li class="divider"></li>
                  <li><a href="CourseAdd.php">Course Basic Information Add</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Other Subsystem<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header" style="font-size:18px">The portals:</li>
                  <li style="height:3px"><br/></li>
                  <li><a href="">Resource Sharing Management System</a></li>
                  <li class="divider"></li>
                  <li><a href="../aca/main.html">Automatic Course Arrangement Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Course Selection Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Discussion Forum Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Online Testing Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="../Score_Manage/index.php">Score Management Subsystem</a></li>
                </ul>
              </li>
            </ul><!--nav navbar-nav-->
<a href="logout.php"><button id="logout" type="button" class="btn btn-success navbar-btn navbar-right">Log out</button></a> 
      <button  id="logout" style="#8A2BE2" class="btn navbar-btn navbar-right" ><?php echo $_SESSION["user_name"]; ?></button><!--User's name is here-->

          </div><!--/.nav-collapse -->
        </div><!--container-fluid-->
        </div><!--navbar navbar-inverse navbar-fixed-top-->

    <div class="alert alert-success">
      <h1><strong>Sorry!</strong></h1>
      <br><br><h3>Operation Failed</h3> 
      <h3>Please check whatever you input just now and make sure the contents are of the right form</h3>
      <br><h4>The possible problems:</h2>
	  <?php
	  if($_SESSION["return"]=="update")
	  {	  
		echo "<h5>The information you inputed is illegal. Please check the data format.</h5>";
	  }
		else if($_SESSION["return"]=="pwdchange")
		{
			if($_SESSION["user_type"]!="1")
			{
				echo "<h5>The old password is wrong.</h5>";
			}
			echo "<h5>The confirm password is not consistent to the new password.</h5>";
		}
		else if($_SESSION["return"]=="lookup")
		{
			echo "<h5>Records satisfy the conditions don't exist.</h5>";
		}
		else if($_SESSION["return"]=="add")
		{
			echo "<h5>User with the same ID already exists in the database.</h5>";
			echo "<h5>You have set some NULL values.</h5>";
			echo "<h5>You have input strings as User ID, phone number.</h5>";
			if($_SESSION["view_type"]=='3')
				echo "<h5>You have input strings as credit, GPA for a student.</h5>";
		}
	 ?>
    </div>

      <hr>
	  <?php
		if($_SESSION["return"]=="update")
			echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"updatedata.php\">Return</a></p>";
		else if($_SESSION["return"]=="pwdchange")
			echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"ChangePassword.php\">Return</a></p>";
		else if($_SESSION["return"]=="lookup")
			echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"lookup.php\">Return</a></p>";
		else if($_SESSION["return"]=="add")
			echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"add.php\">Return</a></p>";
	   ?>

      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body></html>