<?php 
	session_start();
	$_SESSION["return"]="add";
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


		<!--Begin page content-->
		<div class="alert alert-success">
      <strong>Welcome to user basic information add</strong><br>Please input the new ID and choose user type.
	  <br><br><strong>Caution:</strong> Mind that the items don't accept NULL values. You may be required to input again if the values are illegal.
    </div>

    <div class="container">
		<!--add a student-->
        <div class="page-header">
            <h1>Add a Student</h1>
        </div>

		<form class="form-search" action="add2.php" method="post">
		<table class="table table-bordered" >
			<thead>
			<tr>
				<th>Data type</th>
				<th>Value</th>
			</tr>
			</thead>
			<tbody>
		    <tr class="warning">
				<td>Student ID</td>
				<td><input type="text" placeholder="input id" name="id" /></td>
			</tr>
			<tr class="warning">
				<td>Name</td>
				<td><input type="text" placeholder="input name" name="name" /></td>
			</tr>					 
			<tr class="warning">
				<td>Password</td>
				<td><input type="password" placeholder="input password" name="password" /></a></td>
			</tr>						
			<tr class="warning">
				<td>Password Confirm</td>
				<td><input type="password" placeholder="confirm password" name="password2" /></a></td>
			</tr>
			<tr class="warning">
				<td>Phone</td>
				<td><input type="text" placeholder="input phone number" name="phone" /></td>
			</tr>
			<tr class="warning">
				<td>School</td>
				<td><input type="text" placeholder="input school" name="school" /></td>
			</tr>
			<tr class="warning">
				<td>Major</td>
				<td><input type="text" placeholder="input major" name="major" /></td>
			</tr>
			<tr class="warning">
				<td>Grade</td>
				<td><select name="grade">
						<option selected="selected" name="grade"></option>
						<option value="1">Fresh man</option>
						<option value="2">Sophomore</option>
						<option value="3">Junior</option>
						<option value="4">Senior</option>
						<option value="5">Graduate Fresh man</option>
						<option value="6">Graduate Sophomore</option>
						<option value="7">Graduate Junior</option>
						<option value="8">Graduate Senior</option>
					</select></td>
			</tr>
			<tr class="warning">
				<td>Address</td>
				<td><input type="text" placeholder="input address" name="address" /></td>
			</tr>
			<tr class="warning">
				<td>GPA</td>
				<td><input type="text" placeholder="input GPA" name="GPA" /></td>
			</tr>
			<tr class="warning">
				<td>Credit</td>
				<td><input type="text" placeholder="input credit" name="credit" /></td>
			</tr>
			<tr class="warning">
				<td>Email</td>
				<td><input type="text" placeholder="input email" name="email" /></td>
			</tr>
			</tbody>
		</table>
		<p><input class="btn btn-primary btn-lg" type="submit" role="button" value="submit" /></p>
		</form>
		
		<br>
		<!--add a teacher-->
		<div class="page-header">
            <h1>Add a Teacher</h1>
        </div>

		<form class="form-search" action="add2.php" method="post">
		<table class="table table-bordered" >
			<thead>
			<tr>
				<th>Data type</th>
				<th>Value</th>
			</tr>
			</thead>
			<tbody>
		    <tr class="warning">
				<td>Teacher ID</td>
				<td><input type="text" placeholder="input id" name="id" /></td>
			</tr>
			<tr class="warning">
				<td>Name</td>
				<td><input type="text" placeholder="input name" name="name" /></td>
			</tr>
			<tr class="warning">
				<td>Password</td>
				<td><input type="password" placeholder="input password" name="password" /></a></td>
			</tr>						
			<tr class="warning">
				<td>Password Confirm</td>
				<td><input type="password" placeholder="confirm password" name="password2" /></a></td>
			</tr>
			<tr class="warning">
				<td>Phone</td>
				<td><input type="text" placeholder="input phone number" name="phone" /></td>
			</tr>
			<tr class="warning">
				<td>Dept</td>
				<td><input type="text" placeholder="input department" name="dept" /></td>
			</tr>
			<tr class="warning">
				<td>Professional title</td>
				<td><input type="text" placeholder="input professional title" name="title" /></td>
			</tr>
			<tr class="warning">
				<td>Address</td>
				<td><input type="text" placeholder="input address" name="address" /></td>
			</tr>
			<tr class="warning">
				<td>Email</td>
				<td><input type="text" placeholder="input email" name="email" /></td>
			</tr>			
			<tr class="warning">
				<td>Resume</td>
				<td><textarea name="resume" cols ="50" rows="5"></textarea></td>
			</tr>
			</tbody>
		</table>
		<p><input class="btn btn-primary btn-lg" type="submit" role="button" value="submit" /></p>
		</form>

		<br>
		<!--add a manager-->
		<div class="page-header">
            <h1>Add a manager</h1>
        </div>

		<form class="form-search" action="add2.php" method="post">
		<table class="table table-bordered" >
			<thead>
			<tr>
				<th>Data type</th>
				<th>Value</th>
			</tr>
			</thead>
			<tbody>
		    <tr class="warning">
				<td>Manager ID</td>
				<td><input type="text" placeholder="input id" name="id" /></td>
			</tr>
			<tr class="warning">
				<td>Name</td>
				<td><input type="text" placeholder="input name" name="name" /></td>
			</tr>
			<tr class="warning">
				<td>Password</td>
				<td><input type="password" placeholder="input password" name="password" /></a></td>
			</tr>						
			<tr class="warning">
				<td>Password Confirm</td>
				<td><input type="password" placeholder="confirm password" name="password2" /></a></td>
			</tr>
			<tr class="warning">
				<td>Phone</td>
				<td><input type="text" placeholder="input phone number" name="phone" /></td>
			</tr>
			<tr class="warning">
				<td>Dept</td>
				<td><input type="text" placeholder="input department" name="dept" /></td>
			</tr>
			<tr class="warning">
				<td>Address</td>
				<td><input type="text" placeholder="input address" name="address" /></td>
			</tr>
			<tr class="warning">
				<td>Email</td>
				<td><input type="text" placeholder="input email" name="email" /></td>
			</tr>
			</tbody>
		</table>
		<p><input class="btn btn-primary btn-lg" type="submit" role="button" value="submit" /></p>
		</form>

	</div>
	<script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>



