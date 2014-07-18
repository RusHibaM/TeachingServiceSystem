<?php
	session_start();
	$_SESSION["return"]=="lookup";
?>
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


	<!--content begin-->
    <div class="alert alert-success">
      <strong>Welcome to user basic information search</strong><p>Please input the key word.
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
						<a href="#panel-name" data-toggle="tab">Search by Name</a>
					</li>
					<li>
						<a href="#panel-school" data-toggle="tab">Search by School/Dept</a>
					</li>
					<li>
						<a href="#panel-email" data-toggle="tab">Search by Email</a>
					</li>
				</ul>
				<center>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-id">
						<h2>Search by User ID:</h2>
          				<h4>(User ID is made up by numbers)</h4>
          				<p>
									Please input the user ID.
									</p>
            			<form class="form-search" action="viewdata.php" method="post">
									<input class="input-medium" type="text" name="view_id"/><br>
									Please Choose User Type <br><select name="view_type" id="d">
									<option selected="selected" name="view_type"></option>
									<option value="3">Student</option>
									<option value="2">Teacher</option>
									<option value="1">Manager</option>
									</select><br><br>
									<button type="submit" class="btn btn-info">search</button>
						</form>
					</div>
					<div class="tab-pane" id="panel-name">
						<h2>Search by User Name:</h2>
						<h4>(User's Name, support fuzzy search)</h4>
          				<p>
									Please input the user name.
									</p>
            			<form class="form-search" action="viewdata.php" method="post">
									<input class="input-medium" type="text" name="name"/><br>
									Please Choose User Type <br><select name="view_type" id="d">
									<option selected="selected" name="view_type"></option>
									<option value="Student">Student</option>
									<option value="Teacher">Teacher</option>
									<option value="Manager">Manager</option>
									</select><br><br>
									<button type="submit" class="btn btn-info">search</button>
								</form>
					</div>
					<div class="tab-pane" id="panel-school">
						<h2>Search by School/Dept:</h2>
						<h4>(The School/Dept the user belongs to)</h4>
          				<p>
									Please input the school/dept.
									</p>
            			<form class="form-search" action="viewdata.php" method="post">
									<input class="input-medium" type="text" name="school"/><br>
									Please Choose User Type <br><select name="view_type" id="d">
									<option selected="selected" name="view_type"></option>
									<option value="Student">Student</option>
									<option value="Teacher">Teacher</option>
									<option value="Manager">Manager</option>
									</select><br><br>
									<button type="submit" class="btn btn-info">search</button>
								</form>
					</div>
					<div class="tab-pane" id="panel-email">
						<h2>Search by User Email:</h2>
						<h4>(The User's Email)</h4>
          				<p>
									Please input the email.
									</p>
            			<form class="form-search" action="viewdata.php" method="post">
									<input class="input-medium" type="text" name="email"/><br>
									Please Choose User Type <br><select name="view_type" id="d">
									<option selected="selected" name="view_type"></option>
									<option value="Student">Student</option>
									<option value="Teacher">Teacher</option>
									<option value="Manager">Manager</option>
									</select><br><br>
									<button type="submit" class="btn btn-info">search</button>
								</form>
					</div>
				</div>
				</center>
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