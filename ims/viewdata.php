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

    <title>Information Management Subsystem -- View User Basic Information</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="./css/mainstyle.css" rel="stylesheet">
	<link href="http://getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <?php
	//for test
	//$_SESSION["view_id"]= "3110000000";
	//$_SESSION["view_type"]= "Student";
	//$_SESSION["user_type"]= "Student";
	//$_SESSION["user_id"]="3110000000";
	//$_SESSION["return"]="viewdata";


	//used for failed search
	$modify='0';//modify a user's info
	$_SESSION["id_back"]=$_SESSION["view_id"];
	$_SESSION["type_back"]=$_SESSION["view_type"];
	if($_SESSION["return"]=="lookup")
	{
		if(Isset($_POST["view_id"]))
		{
			$_SESSION["view_id"]=$_POST["view_id"];
			$viewID=$_SESSION["view_id"];
			$modify='1';
			//echo "here1";
		}
		else
			$viewID='0';
	}
	else if($_SESSION["return"]=="add"||$_SESSION["return"]=="pwdchange"||$_SESSION["return"]=="update")
	{
		$viewID=$_SESSION["view_id"];
		$modify='1';
				//echo "here2";
	}
	else//($_SESSION["return"]=="viewself")
	{
		$viewID=$_SESSION["user_id"];
		$modify='1';
				//echo "here3";
	}

	if(Isset($_POST["view_type"]))$_SESSION["view_type"]=$_POST["view_type"];
	if(Isset($_POST["name"]))$view_name=$_POST["name"];
	else $view_name = '0';
	if(Isset($_POST["school"])&&$_POST["view_type"]=="3")$view_school=$_POST["school"];
	else $view_school = '0';
	if(Isset($_POST["school"])&&($_POST["view_type"]=="2"||$_POST["view_type"]=="1"))
		$view_dept=$_POST["school"];
	else $view_dept = '0';
	if(Isset($_POST["email"]))
	{
		$view_email=$_POST["email"];
				$modify='1';
						//echo "here4";

	}
	else $view_email = '0';	

  ?>
  
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
    <div class="container" >
        <div class="page-header">
            <h1>User Information</h1>
        </div>

        <?php
            $con=mysql_connect("218.244.137.223","ddpse","zjuddpse2014");
            mysql_select_db("SEproject");
            // Check connection
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysql_connect_error();
            }
			
            if($_SESSION["view_type"]=="3")
			{
				$sql = "select * from `imsStudent` where `stu_id` = $viewID
				or `stu_school` = '".$view_school."' or `stu_email` = '".$view_email."' or `stu_name` like '%".$view_name."%'";
				$dbNames = array("stu_id","stu_name","stu_phone","stu_school","stu_major",
					 "stu_pwd","stu_grade","stu_address","stu_GPA","stu_credit","stu_email");
			}
			else if($_SESSION["view_type"]=="2")
				 {
					$sql = "select * from `imsTeacher` where `teac_id` = $viewID
					or `teac_dept` = '".$view_school."' or `teac_email` = '".$view_email."' or `teac_name` like '%".$view_name."%'";
					$dbNames = array("teac_id","teach_pwd","teac_name","teac_phone","teac_dept",
						"teac_prof_title","teac_resume","teac_addr","teac_email");
				 }
				 else
				 {
					$sql = "select * from `imsManager` where `mgr_id` = $viewID
						or `mgr_dept` = '".$view_school."' or `mgr_email` = '".$view_email."' or `mgr_name` like '%".$view_name."%'";
					$dbNames = array("mgr_id","mgr_pwd","mgr_phone","mgr_address","mgr_name","mgr_dept","mgr_email");
				 }
            $result = mysql_query($sql);
			//for test
			//echo $sql;
			//echo $result;
			$count = '0';
            $i = 0; //array index
			while($row = mysql_fetch_array($result))
				if($_SESSION["view_type"]=="3")
				{       
						//print table
						$count=$count+'1';
						echo "<h2>Result #"."$count</h2>";
						//echo "<br>";
						echo "<table class=\"table table-bordered\"  id=\"$count\" value=\"$count\">";
						echo    "<thead>";
						echo        "<tr>";
						echo            "<th>Data type</th>";
						echo            "<th>Value</th>";
						echo        "</tr>";
						echo    "</thead>";
						echo    "<tbody>";
		   
						 echo    "<tr class=\"error\">";
							echo    "<td>Student ID</td>";
							echo    "<td>" . $row['stu_id'] . "</td>";
						 echo    "</tr>";
						 echo    "<tr class=\"error\">";
							echo    "<td>Name</td>";
							echo    "<td>" . $row['stu_name'] . "</td>";
						 echo    "</tr>";
						 /*echo   "<tr class=\"error\">";
							echo    "<td>Privileges</td>";
							echo   "<td>" . $row['stu_right'] . "</td>";				                    
						 echo     "</tr>";*/
						 if($modify=='1')
							 if (($_SESSION["user_id"]==$row['stu_id'])||($_SESSION["user_type"]=='1'))
							 {
								 echo    "<tr class=\"error\">";
									echo    "<td>Password</td>";
									echo   " <td><a href=\"ChangePassword.php\">Change Password</a></td>";
								 echo    "</tr>";
							 }
						 echo    "<tr class=\"error\">";
							echo    "<td>Phone</td>";
							echo "<td>" . $row['stu_phone'] . "</td>";
						 echo    "</tr>";
						 echo    "<tr class=\"error\">";
							echo "<td>School</td>";
							echo "<td>" . $row['stu_school'] . "</td>";
						 echo    "</tr>";
						 echo    "<tr class=\"error\">";
							echo    "<td>Major</td>";
							echo   "<td>" . $row['stu_major'] . "</td>";
						 echo    "</tr>";
						 
						 echo    "<tr class=\"error\">";
							echo    "<td>Grade</td>";
							echo   "<td>";
							switch ($row['stu_grade'])
							{
								case '1':echo "Fresh man";
								  break; 
								case '2':echo "Sophomore";
								  break;
								case '3':echo "Junior";
								  break;
								case '4':echo "Senior";
								  break;
								case '5':echo "Graduate Fresh man";
								  break;
								case '6':echo "Graduate Sophomore";
								  break;
								case '7':echo "Graduate Junior";
								  break;
								case '8':echo "Graduate Senior";
								  break;
								default:echo "not set yet";
							}
							echo "</td>";
						 echo    "</tr>";
						 echo    "<tr class=\"error\">";
							echo    "<td>Address</td>";
							echo   "<td>" . $row['stu_address'] . "</td>";
						 echo    "</tr>";
						 if (($_SESSION["user_id"] == $row['stu_id'])||($_SESSION["user_type"]!='3'))
						 {
							 echo    "<tr class=\"error\">";
								echo    "<td>GPA</td>";
								echo   "<td>" . $row['stu_GPA'] . "</td>";
							 echo    "</tr>";
						 }
						 echo    "<tr class=\"error\">";
							echo    "<td>Credit</td>";
							echo   "<td>" . $row['stu_credit'] . "</td>";
						 echo    "</tr>";
						 echo    "<tr class=\"error\">";
							echo    "<td>Email</td>";
							echo   "<td>" . $row['stu_email'] . "</td>";
						 echo    "</tr>";
						echo   "</tbody>";
						echo "</table>";
						//echo $_SESSION["user_id"];
						//echo $_SESSION["view_id"];
						if($modify=='1')
							if($_SESSION["user_id"]==$row['stu_id']||$_SESSION["user_type"]=='1'
								||(($_SESSION["user_type"]=="2")&&($_SESSION["view_type"]=="3")))
							echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" 
									href=\"updatedata.php\">Update Information</a></p>";
						//end of table
						
						$_SESSION["view_name"] = $row['stu_name'];
					    $_SESSION["Password"] = $row['stu_pwd'];
						$_SESSION["Address"] = $row['stu_address'];
						$_SESSION["Phone"] = $row['stu_phone'];
						//$_SESSION["Privlg"] = $row['stu_right'];
						$_SESSION["Email"] = $row['stu_email'];
						$_SESSION["Grade"] = $row['stu_grade'];
						$_SESSION["Major"] = $row['stu_major'];
						$_SESSION["School"] = $row['stu_school'];
						$_SESSION["GPA"] = $row['stu_GPA'];
						$_SESSION["Credit"] = $row['stu_credit'];						
					    
				}
				else if($_SESSION["view_type"]=="2")
				{			
							//print table
							$count=$count+'1';
							echo "<h2>Result #"."$count</h2>";
							//echo "<br>";
							echo "<table class=\"table table-bordered\" id=\"$count\" value=\"$count\">";
							echo    "<thead>";
							echo        "<tr>";
							echo            "<th>Data type</th>";
							echo            "<th>Value</th>";
							echo        "</tr>";
							echo    "</thead>";
							echo    "<tbody>";
							
							 echo    "<tr class=\"error\">";
								echo    "<td>Teacher ID</td>";
								echo    "<td>" . $row['teac_id'] . "</td>";
							 echo    "</tr>";
							 echo    "<tr class=\"error\">";
								echo    "<td>Name</td>";
								echo    "<td>" . $row['teac_name'] . "</td>";
							 echo    "</tr>";
							 if($modify=='1')
								 if($_SESSION["user_type"]=="1"||
									 ($_SESSION["user_id"]==$row['teac_id']&&$_SESSION["user_type"]==$_SESSION["view_type"]))
								 {
									 echo    "<tr class=\"error\">";
										echo    "<td>Password</td>";
										echo   " <td>" . $row['teac_pwd'] . "</td>";
									 echo    "</tr>";
								 }
							 /*echo    "<tr class=\"error\">";
								echo    "<td>Privileges</td>";
								echo   "<td>" . $row['teac_right'] . "</td>";
							 echo    "</tr>";*/						 
							 echo    "<tr class=\"error\">";
								echo    "<td>Phone</td>";
								echo "<td>" . $row['teac_phone'] . "</td>";
							 echo    "</tr>";
							 echo    "<tr class=\"error\">";
								echo    "<td>Dept</td>";
								echo "<td>" . $row['teac_dept'] . "</td>";
							 echo    "</tr>";
							 echo    "<tr class=\"error\">";
								echo    "<td>Professional Title</td>";
								echo   "<td>" . $row['teac_prof_title'] . "</td>";
							 echo    "</tr>";							
							 echo    "<tr class=\"error\">";
								echo    "<td>Address</td>";
								echo   "<td>" . $row['teac_address'] . "</td>";
							 echo    "</tr>";
							 echo    "<tr class=\"error\">";
								echo    "<td>Email</td>";
								echo   "<td>" . $row['teac_email'] . "</td>";
							 echo    "</tr>";
							  echo    "<tr class=\"error\">";
								echo    "<td>Resume</td>";
								echo   "<td>" . $row['teac_resume'] . "</td>";
							 echo    "</tr>";
							echo   "</tbody>";
							echo "</table>";
							if($modify=='1')
								if($_SESSION["user_id"]==$row['teac_id']||$_SESSION["user_type"]=="1"
									||(($_SESSION["user_type"]=="2")&&($_SESSION["view_type"]=="3")))
								echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" 
										href=\"updatedata.php\">Update Information</a></p>";
							//end of table
							
							$_SESSION["view_name"] = $row['teac_name'];
							$_SESSION["Password"] = $row['teac_pwd'];
							$_SESSION["Address"] = $row['teac_address'];
							$_SESSION["Phone"] = $row['teac_phone'];
							$_SESSION["Email"] = $row['teac_email'];
							//$_SESSION["Privlg"] = $row['teac_right'];
							$_SESSION["Title"] = $row['teac_prof_title'];
							$_SESSION["Dept"] = $row['teac_dept'];
							$_SESSION["Resume"] = $row['teac_resume'];
					
            }
			else
			{
					//print table
					$count=$count+'1';
					echo "<h2>Result #"."$count</h2>";
					//echo "<br>";
					echo "<table class=\"table table-bordered\"  id=\"$count\" value=\"$count\">";
					echo    "<thead>";
					echo        "<tr>";
					echo            "<th>Data type</th>";
					echo            "<th>Value</th>";
					echo        "</tr>";
					echo    "</thead>";
					echo    "<tbody>";
					 echo    "<tr class=\"error\">";
						echo    "<td>Manager ID</td>";
						echo    "<td>" . $row['mgr_id'] . "</td>";
					 echo    "</tr>";
					 echo    "<tr class=\"error\">";
						echo    "<td>Name</td>";
						echo    "<td>" . $row['mgr_name'] . "</td>";
					 echo    "</tr>";
					 if($_SESSION["user_type"]=="1"&&$modify=='1')
					 {
						 echo    "<tr class=\"error\">";
							echo    "<td>Password</td>";
							echo   " <td><a href=\"ChangePassword.php\">Change Password</a></td>";
						 echo    "</tr>";
					 }
					 echo    "<tr class=\"error\">";
						echo    "<td>Phone</td>";
						echo    "<td>" . $row['mgr_phone'] . "</td>";
					 echo	 "</tr>";
				     echo    "<tr class=\"error\">";
						echo    "<td>Address</td>";
						echo    "<td>" . $row['mgr_address'] . "</td>";
					 echo	 "</tr>";
					 echo    "<tr class=\"error\">";
						echo "<td>Dept</td>";
						echo "<td>" . $row['mgr_dept'] . "</td>";
					 echo    "</tr>";
					 echo    "<tr class=\"error\">";
						echo    "<td>Email</td>";
						echo   "<td>" . $row['mgr_email'] . "</td>";
					 echo    "</tr>";
					echo    "</tbody>";
					echo    "</table>";
					if($modify=='1')
						if($_SESSION["user_id"]==$row['mgr_id']||$_SESSION["user_type"]=="1"
							||(($_SESSION["user_type"]=="2")&&($_SESSION["view_type"]=="3")))
						echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" 
								href=\"updatedata.php\">Update Information</a></p>";
					//end of  table

					$_SESSION["view_name"] = $row['mgr_name'];
					$_SESSION["Password"] = $row['mgr_pwd'];
					$_SESSION["Address"] = $row['mgr_address'];
					$_SESSION["Phone"] = $row['mgr_phone'];
					$_SESSION["Email"] = $row['mgr_email'];
					$_SESSION["Dept"] = $row['mgr_dept'];				            
            }
            mysql_close($con);

			if($count=='0')
			{
				//if search fails, set view_id and view_type to former
				$_SESSION["view_id"]=$_SESSION["id_back"];
				$_SESSION["view_type"]=$_SESSION["type_back"];
				echo " <h1><strong>No records</strong></h1>";
				echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"lookup.php\">Modify Search Condition</a></p>";
			}
			else if($modify=='0'&&($viewID!=$_SESSION["user_id"]))
			{
				echo "<p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"lookup.php\">Return</a></p>";
			}
			
			
		?>   
       
     
       
    </div> <!-- /container -->

    <div id="footer">
        <div class="container">
            <p class="text-muted">中加班2014 Software Engineering</p>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
