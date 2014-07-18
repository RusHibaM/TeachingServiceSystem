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
		 <?php 			
            $con=mysql_connect("218.244.137.223","ddpse","zjuddpse2014");
            mysql_select_db("SEproject");
            // Check connection
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysql_connect_error();
            }
			if($_SESSION["view_type"]=="Student")
			{
				if(Isset($_POST["id"])$id=$_POST["id"];
					else $id=0;
				if(Isset($_POST["name"])$name=$_POST["name"];
					else $name=0;
				if(Isset($_POST["school"])$school=$_POST["school"];
					else $school=0;
				if(Isset($_POST["email"])$email=$_POST["email"];
					else $email=0;
				$query="SELECT stu_id, stu_name, stu_school, stu_phone, stu_email, stu_address
					    FROM imsStudent WHERE stu_id = '$id' or stu_name like '$name'
						or stu_school = '$school' or stu_email = '$email";
			}
			if($_SESSION["view_type"]=="Teacher")
			{	
				if(Isset($_POST["id"])$id=$_POST["id"];
					else $id=0;
				if(Isset($_POST["name"])$name=$_POST["name"];
					else $name=0;
				if(Isset($_POST["school"])$school=$_POST["school"];
					else $school=0;
				if(Isset($_POST["email"])$email=$_POST["email"];
					else $email=0;
				$query="SELECT teac_id, teac_name, teac_school, teac_phone, teac_email, teac_address
					    FROM imsTeacher WHERE teac_id = '$id' or teac_name like '$name'
						or teac_school = '$school' or teac_email = '$email";
			}
			if($_SESSION["view_type"]=="Manager")
			{	
				if(Isset($_POST["id"])$id=$_POST["id"];
					else $id=0;
				if(Isset($_POST["name"])$name=$_POST["name"];
					else $name=0;
				if(Isset($_POST["school"])$school=$_POST["school"];
					else $school=0;
				if(Isset($_POST["email"])$email=$_POST["email"];
					else $email=0;
				$query="SELECT mgr_id, mgr_name, mgr_school, mgr_phone, mgr_email, mgr_address
					    FROM imsManager WHERE mgr_id = '$id' or mgr_name like '$name'
						or mgr_school = '$school' or mgr_email = '$email";
			}
			$result=mysql_query($query,$con);
			
			if($result)
			{
				echo "<div class=\"container\">";
				echo "<div class=\"page-header\">";
				echo	"<h1>Look up Result</h1>";
				echo "</div>";
				echo "<table class=\"table table-bordered\">";
				echo	"<thead>";
				echo		"<tr>";
				echo            "<th>User ID</th>";
				echo            "<th>User Name</th>";
				echo            "<th>School/Dept</th>";
				echo            "<th>Phone</th>";
				echo            "<th>Email</th>";
				echo            "<th>Address</th>";
				echo        "</tr>";
				echo    "</thead>";
				echo    "<tbody>";
					
				if($row = mysql_fetch_array($result)) 
				{
					echo    "<tr class=\"error\">";
						echo    "<td>Student ID</td>";
						echo    "<td>" . $row['stu_id'] . "</td>";
					echo    "</tr>";
					echo    "<tr class=\"error\">";
						echo    "<td>Student ID</td>";
						echo    "<td>" . $row['stu_id'] . "</td>";
					echo    "</tr>";
					echo    "<tr class=\"error\">";
						echo    "<td>Student ID</td>";
						echo    "<td>" . $row['stu_id'] . "</td>";
					echo    "</tr>";
					echo    "<tr class=\"error\">";
						echo    "<td>Student ID</td>";
						echo    "<td>" . $row['stu_id'] . "</td>";
					echo    "</tr>";
					echo    "<tr class=\"error\">";
						echo    "<td>Student ID</td>";
						echo    "<td>" . $row['stu_id'] . "</td>";
					echo    "</tr>";
					echo    "<tr class=\"error\">";
						echo    "<td>Student ID</td>";
						echo    "<td>" . $row['stu_id'] . "</td>";
					echo    "</tr>";
				}





    
    
	
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body></html>