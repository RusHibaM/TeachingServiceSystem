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
            <a class="navbar-brand" href="Login.php">Teaching Assistant System</a>
      </div><!--navbar-header-->
      
     </div>
        </div><!--navbar navbar-inverse navbar-fixed-top-->

    <div class="jumbotron">
      <div class="container">
	  <div class="row">
        <div class="col-md-6">
        <h1>Welcome!</h1>
        <p>welcome to Teaching Assistant System.</p>
        
        
      </div>
      <div class="col-md-6">
		<form method = "post" action = "logintest.php">
      	<h1>Login</h1>
        <lable>ID:</lable>
            <input name = "user_id" type="user_id" class="form-control" placeholder="user_id">
        <lable>Password:</lable>
            <input name="password" type="password" class = "form-control" placeholder="password">
        </h3>
        
         <input type= "radio"  name= "user_type" value = "Student">Student
		 <input type="radio" name ="user_type" value = "Teacher">Teacher
		 <input type = "radio" name = "user_type" value = "Manager">Manager
		
		<button id="login" type="submit" class="btn btn-success navbar-btn navbar-right">Log In</button> 
   </form>                 
        	
        </div>
        
    </div>

    

      <hr>

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


</body></html>