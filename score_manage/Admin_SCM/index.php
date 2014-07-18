<?php
	session_start();
	if($_SESSION["islogin"]!=1||$_SESSION["user_type"]!=1)
	{

		print("<script>alert('Please Log in!')</script>");
	    Print  ("<script language='javascript'>location.replace('../../Login.php')</script>"); 
	exit;
	}
?>
<!DOCTYPE HTML>
	<html lang="en">
		<head>
			<title>Scoring Management System</title>
			<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
			<meta http-equiv="content-language" content="en"/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="Teaching Managing System as Course Project">
			<meta name="author" content="Joseph Den">
			<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css"/>
			<link rel="stylesheet" type="text/css" href="../dist/css/starter-template.css"/>
			

		</head>

		<body style="background:url(../img/2.jpg) no-repeat">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type=button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="../../login.php">Logout</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav"> 
							
							<li>
								<a href="score_query/score_query.php">Score Query</a>
							</li>	
							<li>
								<a href="modify_process/modify_process.php">Modify Process</a>
							</li>
							<li>
								<a href="deadline_set/deadline_set.php">Set Deadline</a>
							</li>
						</ul>

					</div>
				</div>
			</div>
			<div class="container">
			 <div class="starter-template"></div>
			</div>
		</body>
	</html>