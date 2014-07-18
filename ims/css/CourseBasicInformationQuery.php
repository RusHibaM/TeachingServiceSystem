<?php session_start(); ?>
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

    <title>Information Management Subsystem -- Course Basic Information Search</title>

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
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.js"></script>

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
      <strong>Welcome to course basic information search</strong><p>Please input the key word.
      <br>You could search for the information you want by using different types of key words. 
      <br><br>Caution: Some information might not be available in the result if you haven't got enough privilege.
    </div>
    
    <div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="tabbable" id="tabs-467921">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-id" data-toggle="tab">Search by ID</a>
					</li>
					<li>
						<a href="#panel-hour" data-toggle="tab">Search by class hour</a>
					</li>
					<li>
						<a href="#panel-name" data-toggle="tab">Search by name</a>
					</li>
					<li>
						<a href="#panel-credit" data-toggle="tab">Search by credit</a>
					</li>
					<li>
						<a href="#panel-school" data-toggle="tab">Search by school</a>
					</li>
					<li>
						<a href="#panel-content" data-toggle="tab">Search by content</a>
					</li>
					<li>
						<a href="#panel-req" data-toggle="tab">Search by requirement</a>
					</li>
				</ul>		
				<div class="tab-content">
					<div class="tab-pane active" id="panel-id">
						<center><h2>Search by Course ID:</h2></center>
          				<center><h4>(Course ID is made up by numbers)</h4></center>
          				<center><p>
									Please input the course ID.
									</p></center>
            			<center><form class="form-search" action="coursesearch.php" method="post">
									<input class="input-medium" type="text" name="cid"/> <button type="submit" class="btn btn-info">search</button>
								</form></center>
					</div>
					<div class="tab-pane" id="panel-hour">
						<center><h2>Search by Class Hour:</h2>
          				<h4>(Class hour shows how many hours a course will take in one week)</h4>
          				<p>
									Please input the class hour.
									</p>
            			<form class="form-search" action="coursesearch.php" method="post">
									<input class="input-medium" type="text" name="cch"/> <button type="submit" class="btn btn-info">search</button>
								</form></center>
					</div>
					<div class="tab-pane" id="panel-name">
						<center><h2>Search by Course Name:</h2>
          				<p>
									Please input the course name.
									</p>
            			<form class="form-search" action="coursesearch.php" method="post">
									<input class="input-medium" type="text" name="cname"/> <button type="submit" class="btn btn-info">search</button>
								</form></center>
					</div>
					<div class="tab-pane" id="panel-credit">
						<center><h2>Search by Course Experimental Hour:</h2>
          				<p>
									Please input the course experimental hour.
									</p>
            			<form class="form-search" action="coursesearch.php" method="post">
									<input class="input-medium" type="text" name="ceh"/> <button type="submit" class="btn btn-info">search</button>
								</form></center>
					</div>
					<div class="tab-pane" id="panel-school">
						<center><h2>Search by School:</h2>
						<h4>(School responsible for the course)</h4>
          				<p>
									Please input the school.
									</p>
            			<form class="form-search" action="coursesearch.php" method="post">
									<input class="input-medium" type="text" name="csc"/> <button type="submit" class="btn btn-info">search</button>
								</form></center>
					</div>
					<div class="tab-pane" id="panel-content">
						<center><h2>Search by Course Content:</h2>
						<h4>(Course content is the introduction to the course)</h4>
          				<p>
									Please input the course content.
									</p>
            			<form class="form-search" action="coursesearch.php" method="post">
									<input class="input-medium" type="text" name="ccc"/> <button type="submit" class="btn btn-info">search</button>
								</form></center>
					</div>
					<div class="tab-pane" id="panel-req">
						<center><h2>Search by Course Requirement:</h2>
						<h4>(Course requirement is a brief introduction to the requirement of the course)</h4>
          				<p>
									Please input the course requirement.
									</p>
            			<form class="form-search" action="coursesearch.php" method="post">
									<input class="input-medium" type="text" name="ccr"/> <button type="submit" class="btn btn-info">search</button>
								</form></center>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</div>
	
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body></html>