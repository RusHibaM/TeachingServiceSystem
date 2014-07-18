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

    <title>Information Management Subsystem -- Course Basic Information</title>

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
      <strong>Here comes the details of the Basic Information of the Course</strong>
      <br><br>Caution: Some information might not be available in the result if you haven't got enough privilege.
      <br>Basic information contains: course ID, course name, class hour, credit, school, course content and course requirement.
    </div>

    <div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<table class="table">
				<thead>
					<tr>
						<th>
							Field
						</th>
						<th>
							Values
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							Course ID
						</td>
						<td>
							<?php echo $_SESSION['reid'] ?>
						</td>
					
					</tr>
					<tr class="success">
						<td>
							Course Name
						</td>
						<td>
							<?php echo $_SESSION['rename'] ?>
						</td>
					
					</tr>
					<tr class="error">
						<td>
							Class Hour
						</td>
						<td>
							<?php echo $_SESSION['rech'] ?>
						</td>
					
					</tr>
					<tr class="error">
						<td>
							Experiment Hour
						</td>
						<td>
							<?php echo $_SESSION['reeh'] ?>
						</td>
					
					</tr>
					<tr class="warning">
						<td>
							Credit
						</td>
						<td>
							<?php echo $_SESSION['recre'] ?>
						</td>
						
					</tr>
					<tr class="info">
						<td>
							School
						</td>
						<td>
							<?php echo $_SESSION['resch'] ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div><br><br>
		<h1>Course Content</h1>
		<div class="jumbotron">
      <div class="container">
        <p><?php echo $_SESSION['recc'] ?></p>
      </div>
    </div>
    <br><br>
		<h1>Course Requirement</h1>
		<div class="jumbotron">
      <div class="container">
        <p><?php echo $_SESSION['recr'] ?></p>
      </div>
    </div>
	</div>
	</div>
	<a class="btn btn-large btn-warning btn-block" href="CourseBasicInformationModify.php">I am going to modify the Course Basic Information</a>
	</div>
	
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body></html>