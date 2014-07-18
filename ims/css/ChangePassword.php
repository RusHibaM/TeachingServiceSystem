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

    <title>Information Management Subsystem -- Add a Course</title>

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
        
            <a class="navbar-brand" href="IMSwelcome.php">Information Management Subsystem</a>
              
       </div><!--navbar navbar-inverse navbar-fixed-top-->

    <!--Begin page content-->
    <div class="container">
        <div class="page-header">
            <h1>Change Password</h1>
        </div>
        <div>
              <form role="form">
	       
           <?php
           if ($_SESSION["user_type"] != "Manager") {  
              echo "<div class=\"form-group\">";
		        echo "<div class = \"row\">";
			       echo "<label class=\"col-md-2 col-md-offset-3 control-label\"><h4>Old Password</h4></label>";
			        echo "<div class=\"col-md-4\">";
                    
                    echo   "<input type=\"password\" class=\"form-control\" id=\"oldpassword\" placeholder=\"Input your old password\">";
                    
			        echo "</div>";
		       echo "</div>";
	          echo "</div>";
	          }
	        ?>
	        	  
	  
	          <div class="form-group">
		        <div class = "row">
			        <label class="col-md-2 col-md-offset-3 control-label"><h4>New Password</h4></label>
			        <div class="col-md-4">
				        <input type="password" class="form-control" id="changepassword" placeholder="Input your new password">
			        </div>
		        </div>
	          </div>
	  
	  
	  
	          <div class="form-group">
		        <div class = "row">
			        <label class="col-md-2 col-md-offset-3 control-label"><h4>New Password Comfirm</h4></label>
			        <div class="col-md-4">
				        <input type="password" class="form-control" id="changepasswordc" placeholder="Input your new password again...">
			        </div>
		        </div>
	          </div>
	  
	          <div class="form-group">
		        <div class="col-md-offset-5 col-md-4">
		          <button type="submit" class="btn btn-primary btn-block">Change</button>
		        </div>
	          </div>
       </form>
	  </div>
	  

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