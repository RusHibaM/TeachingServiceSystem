<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Information Management System">
    <meta name="author" content="Syntax_Error">
    <link rel="shortcut icon" href="">
	<link href="http://getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

    <title>Information Management System - LOGIN</title>

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

     <script>
      $(document).ready(function(){
        $("#login").click(function(){
          //alert($("#userid").val());
          var obj={userid:$("#userid").val(),userpassword:$("#userpassword").val()};
          $.getJSON("./login.php",obj,function(data){
             if(data.test==123){
                window.location.href = "./index.html";
              }
             else 
                alert("Wrong username or password!");
          })
        });
      });
    </script>
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


    <div class="jumbotron">
      <div class="container">
	  <div class="row">
        <div class="col-md-6">
        <h1>Welcome!</h1>
        <p>welcome to Information Management  Subsystem.</p>
        
        
      </div>
      <div class="col-md-6">
		       
        	
        </div>
        
    </div>

    

      <hr>

    </div> <!-- /container -->

    <div id="footer">
        <div class="container">
            <p class="text-muted">Godlike</p>
        </div>
    </div>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>


</body></html>