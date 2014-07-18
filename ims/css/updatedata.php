<?php 
	  session_start();
	  $_SESSION["return"]="update";
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

    <title>Information Management Subsystem -- Updatedata</title>

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


    <!--Begin page content-->
    <div class="container">
        <div class="page-header">
            <h1>User Information</h1>
        </div>
		
		<form class="form-search" action="updatedata2.php" method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data type</th>
                    <th>Old Value</th>
					<th>New Value</th>
					<th>Modify or Not</th>
                </tr>
            </thead>
            <tbody>	
			

			<?php 
				if($_SESSION["view_type"]=="3")
				{
					$ID = $_SESSION["view_id"];
					$Name = $_SESSION["view_name"];
					$Password = $_SESSION["Password"];
					$Address = $_SESSION["Address"];
					$Phone = $_SESSION["Phone"];
					$Privlg = $_SESSION["Privlg"];
					$Email = $_SESSION["Email"];
					$Grade = $_SESSION["Grade"];
					$Major = $_SESSION["Major"];
					$School = $_SESSION["School"];
					$GPA = $_SESSION["GPA"];
					$Credit = $_SESSION["Credit"];
				}
				else if($_SESSION["view_type"]=="2")
					 {
						$ID = $_SESSION["view_id"];
						$Name = $_SESSION["view_name"];
						$Password = $_SESSION["Password"];
						$Address = $_SESSION["Address"];
						$Phone = $_SESSION["Phone"];
						$Email = $_SESSION["Email"];
						$Privlg = $_SESSION["Privlg"];
						$Title = $_SESSION["Title"];
						$Dept = $_SESSION["Dept"];
						$Resume = $_SESSION["Resume"];
					 }
					 else//["view_type"]=="Manager"
					 {
						$ID = $_SESSION["user_id"];
						$Name = $_SESSION["user_name"];
						$Password = $_SESSION["Password"];
						$Address = $_SESSION["Address"];
						$Phone = $_SESSION["Phone"];
						$Email = $_SESSION["Email"];
						$Dept = $_SESSION["Dept"];
					 }
			?>

			    <tr class="error" >
                    <td>User ID</td>
                    <td><?php echo $ID; ?></td>
					<td>Cannot modify ID</td>
					<td>Cannot modify ID</td>				
                </tr>
				<?php
					if($_SESSION["user_type"]=="1")
						echo "<tr class=\"warning\">";
					else
						echo "<tr class=\"error\">";
				?>
                    <td>Name</td>
					<td><?php echo $Name; ?></td>
					<?php
						if($_SESSION["user_type"]=="1")
						{
							echo "<td><input type=\"text\" placeholder=\"modify here\" name=\"Name\" /></td>";
							echo "<td><input type=\"checkbox\" name=\"mname\" />Modify</td>";
						}
						else
						{
							echo "<td>Can not modify name</td>";
							echo "<td>Can not modify name</td>";
						}
					?>
                </tr>
                <tr class="warning">
                    <td>Password</td>
                    <td>
					<?php
						if($_SESSION["user_type"]=="1")
						{
							echo $Password;   echo "</td>";
						}
						else
						{
							echo "********" ; echo "</td>";
						}
					?>
                    <td><input type="password" placeholder="modify here" name="Password" /></td>
					<td><input type="checkbox" name="mpass" />Modify</td>
                </tr>
				<tr class="warning">
                    <td>Phone</td>
                    <td><?php echo $Phone; ?></td>
                    <td><input type="text" placeholder="modify here" name="Phone" /></td>
					<td><input type="checkbox" name="mphone" />Modify</td>

                </tr>
                <tr class="warning">
                    <td>Address</td>
                    <td><?php echo $Address; ?></td>
                    <td><input type="text" placeholder="modify here" name="Address" /></td>
					<td><input type="checkbox" name="maddress" />Modify</td>
                </tr>
                <tr class="warning">
                    <td>Email</td>
                    <td><?php echo $Email; ?></td>
                    <td><input type="text" placeholder="modify here" name="Email" /></td>
					<td><input type="checkbox" name="memail" />Modify</td>
                </tr>

				<?php
					if($_SESSION["view_type"]=="3")
					{
						if($_SESSION["user_type"]!="3")
							echo "<tr class=\"warning\">";
						else
							echo "<tr class=\"error\">";
						echo	"<td>Priviledges</td>";
						echo	"<td>"; echo $Privlg; echo "</td>";
						if($_SESSION["user_type"]!="3")
						{
							echo "<td>";
							echo "<select class=\"selectpicker\" name=\"Privlg\">";
							echo "<option value=\"1\">Select(approved) Quit(approved)</option>";
							echo "<option value=\"2\">Select(approved) Quit(denied)  </option>";
							echo "<option value=\"3\">Select(denied)   Quit(approved)</option>";
							echo "<option value=\"4\">Select(denied)   Quit(denied)  </option>";
							echo "</select>";
							echo "</td>";
							echo "<td><input type=\"checkbox\" name=\"mprivlg\" />Modify</td>";
						}
						else
						{
							echo "<td>Cannot modify priviledge</td>";
							echo "<td>Cannot modify priviledge</td>";
						}
						echo "</tr>";

						if($_SESSION["user_type"]!="3")
							echo "<tr class=\"warning\">";
						else
							echo "<tr class=\"error\">";
						echo	"<td>Grade</td>";
						echo	"<td>"; echo $Grade; echo "</td>";
						if($_SESSION["user_type"]!="3")
						{
							echo "<td><input type=\"text\" placeholder=\"modify here\" name=\"Grade\" /></td>";
							echo "<td><input type=\"checkbox\" name=\"mgrade\" />Modify</td>";
						}
						else
						{
							echo "<td>Cannot modify grade</td>";
							echo "<td>Cannot modify grade</td>";
						}
						echo "</tr>";
						
						if($_SESSION["user_type"]!="3")
							echo "<tr class=\"warning\">";
						else
							echo "<tr class=\"error\">";
						echo	"<td>Major</td>";
						echo    "<td>"; echo $Major; echo "</td>";
						if($_SESSION["user_type"]!="3")
						{
							echo "<td><input type=\"text\" placeholder=\"modify here\" name=\"Major\" /></td>";
							echo "<td><input type=\"checkbox\" name=\"mmajor\" />Modify</td>";
						}			
						else
						{
							echo "<td>Cannot modify major</td>";
							echo "<td>Cannot modify major</td>";
						}							
						echo "</tr>";	

						if($_SESSION["user_type"]!="3")
							echo "<tr class=\"warning\">";
						else
							echo "<tr class=\"error\">";
						echo	"<td>School</td>";
						echo	"<td>"; echo $School; echo "</td>";
						if($_SESSION["user_type"]!="3")
						{
							echo "<td><input type=\"text\" placeholder=\"modify here\" name=\"School\" /></td>";
							echo "<td><input type=\"checkbox\" name=\"mschool\" />Modify</td>";
						}		
						else
						{
							echo "<td>Cannot modify school</td>";
							echo "<td>Cannot modify school</td>";
						}							
						echo "</tr>";
						
						if($_SESSION["user_type"]!="3")
							echo "<tr class=\"warning\">";
						else
							echo "<tr class=\"error\">";
						echo	"<td>GPA</td>";
						echo	"<td>"; echo $GPA; echo "</td>";
						if($_SESSION["user_type"]!="3")
						{
							echo "<td><input type=\"text\" placeholder=\"modify here\" name=\"GPA\" /></td>";
							echo "<td><input type=\"checkbox\" name=\"mgpa\" />Modify</td>";
						}									
						else
						{
							echo "<td>Cannot modify GPA</td>";
							echo "<td>Cannot modify GPA</td>";
						}							
						echo "</tr>";


						if($_SESSION["user_type"]!="3")
							echo "<tr class=\"warning\">";
						else
							echo "<tr class=\"error\">";
						echo "<td>Credit</td>";
						echo "<td>"; echo $Credit; echo "</td>";
						if($_SESSION["user_type"]!="3")
						{
							echo "<td><input type=\"text\" placeholder=\"modify here\" name=\"Credit\" /></td>";
							echo "<td><input type=\"checkbox\" name=\"mcredit\" />Modify</td>";
						}			
						else
						{
							echo "<td>Cannot modify credit</td>";
							echo "<td>Cannot modify credit</td>";
						}							
						echo "</tr>";
					}
					else 
					{
						if($_SESSION["user_type"]=="1")
							echo "<tr class=\"warning\">";
						else
							echo "<tr class=\"error\">";
						echo	"<td>Dept</td>";
						echo	"<td>"; echo $Dept; "</td>";
						if($_SESSION["user_type"]=="1")
						{
							echo	"<td><input type=\"text\" placeholder=\"modify here\" name=\"Dept\" /></td>";
							echo	"<td><input type=\"checkbox\" name=\"mdept\" />Modify</td>";
						}
						else
						{
							echo "<td>Cannot modify department</td>";
							echo "<td>Cannot modify department</td>";
						}							
						echo "</tr>";

						if($_SESSION["view_type"]=="2")
						{
							 if($_SESSION["user_type"]=="1")
								 echo "<tr class=\"warning\">";
							 else
								 echo "<tr class=\"error\">";
							 echo 	"<td>Professional Title</td>";
							 echo	"<td>"; echo $Title; echo "</td>";
							 if($_SESSION["user_type"]=="1")
							 {
								 echo	"<td><input type=\"text\" placeholder=\"modify here\" name=\"Title\" /></td>";
								 echo	"<td><input type=\"checkbox\" name=\"mtitle\" />Modify</td>";
							 }
							 else
							 {
								echo "<td>Cannot modify profession title</td>";
								echo "<td>Cannot modify profession title</td>";
							 }							
							 echo "</tr>";

							 echo "<tr class=\"warning\">";
							 echo "<td>Resume</td>";
							 echo "<td>"; echo $Resume; echo "</td>";
							 echo	"<td><input type=\"text\" placeholder=\"modify here\" name=\"Resume\" /></td>";
							 echo	"<td><input type=\"checkbox\" name=\"mresume\" />Modify</td>";
						}
					}
												 
				?>
			
            </tbody>
        </table>		
        <p><input class="btn btn-primary btn-lg" type="submit" role="button" value="Save" /></p>
		</form>


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