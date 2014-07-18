<?php 	session_start(); ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Teaching Service System">
    <meta name="author" content="Godlike">

    <link rel="shortcut icon" href="">

    <title>Information Management Subsystem -- Course Basic Information Search Result</title>

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
                  <li><a href="./viewdata.php">View My Information</a></li>
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
                  <li><a href="CourseBasicInformationModify.php">Course Basic Information Modify</a></li>
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
<a href="logout.php"><button id="logout" type="button" class="btn btn-success navbar-btn navbar-right">Log out</button></a> 
      <button  id="logout" style="#8A2BE2" class="btn navbar-btn navbar-right" ><?php echo $_SESSION["user_name"]; ?></button><!--User's name is here-->

          </div><!--/.nav-collapse -->
        </div><!--container-fluid-->
        </div><!--navbar navbar-inverse navbar-fixed-top-->
        
    <div class="alert alert-success">
      <strong>The results of your search operation is as follows</strong><p>You could see the details
      <br>Click the "detail" button to see the detail information . 
      <br><br>Caution: Some information might not be available in the result if you haven't got enough privilege.
	  <br>Only the first 5 Results will be shown here
    </div>
    <ul class="thumbnails">
	<li class="span4">
	<div class="thumbnail">
	<div class="caption" contenteditable="false">
	<h3><?php if($_SESSION["cname_0"]==NULL)echo "NO RECOURD"; else echo $_SESSION["cname_0"]; ?></h3>
	<p><?php if($_SESSION["cname_0"]==NULL)echo "NO RECOURD"; else echo $_SESSION["content_0"]; ?></p>	
	</div>
	</div>
	</li>
	
	<p><a class="btn btn-info" href="./details/d1.php">Details</a></p>
	
	<li class="span4">
	<div class="thumbnail">
	<div class="caption" contenteditable="false">
	<h3><?php if($_SESSION["cname_1"]==NULL)echo "NO RECOURD"; else echo $_SESSION["cname_1"]; ?></h3>
	<p><?php if($_SESSION["cname_1"]==NULL)echo "NO RECOURD"; else echo $_SESSION["content_1"]; ?></p>
	</div>
	</div>
	</li>
	
	<p><a class="btn btn-info" href="./details/d2.php">Details</a></p>
	
	<li class="span4">
	<div class="thumbnail">
	<div class="caption" contenteditable="false">
	<h3><?php if($_SESSION["cname_2"]==NULL)echo "NO RECOURD"; else echo $_SESSION["cname_2"]; ?></h3>
	<p><?php if($_SESSION["cname_2"]==NULL)echo "NO RECOURD"; else echo $_SESSION["content_2"]; ?></p>
	</div>
	</div>
	</li>
	
	<p><a class="btn btn-info" href="./details/d3.php">Details</a></p>
	
	<li class="span4">
	<div class="thumbnail">
	<div class="caption" contenteditable="false">
	<h3><?php if($_SESSION["cname_3"]==NULL)echo "NO RECOURD"; else echo $_SESSION["cname_3"]; ?></h3>
	<p><?php if($_SESSION["cname_3"]==NULL)echo "NO RECOURD"; else echo $_SESSION["content_3"]; ?></p>
	</div>
	</div>
	</li>
	
	<p><a class="btn btn-info" href="./details/d4.php">Details</a></p>
	
	<li class="span4">
	<div class="thumbnail">
	<div class="caption" contenteditable="false">
	<h3><?php if($_SESSION["cname_4"]==NULL)echo "NO RECOURD"; else echo $_SESSION["cname_4"]; ?></h3>
	<p><?php if($_SESSION["cname_4"]==NULL)echo "NO RECOURD"; else echo $_SESSION["content_4"]; ?></p>	
	</div>
	</div>
	</li>
	
	<p><a class="btn btn-info" href="./details/d5.php">Details</a></p>
	
</ul>

	
	</div>
	
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body></html>