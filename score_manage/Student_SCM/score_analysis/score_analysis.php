<?php
	session_start();
	if($_SESSION["islogin"]!=1)
	{

		print("<script>alert('Please Log in!')</script>");
	    Print  ("<script language='javascript'>location.replace('../../../Login.php')</script>"); 
	exit;
	}
?>
<?php
	
	//$_SESSION['role']="teacher";
	//$_SESSION['id']=1;
	$user_id=$_SESSION["user_id"];
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
			<link rel="stylesheet" type="text/css" href="../../dist/css/bootstrap.css"/>
			<link rel="stylesheet" type="text/css" href="../../dist/css/starter-template.css"/>
			

		</head>

		<body>
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type=button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="../../index.php">Logout</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav"> 
							<li>
								<a href="../score_query/score_query.php">Score Query</a>
							</li>	
							<li class="active">
								<a href="../score_analysis/score_analysis.php">Score Analysis</a>
							</li>
						</ul>

					</div>
				</div>
			</div>
			 	
			 		<div class="container-fluid">
			 			<div class="row-fluid">
			 				<div class="span12">
			 				<?php
								 	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
									if(!$con)
										echo "no connection";
									mysql_select_db("SEproject");
						
									$colorflag=1;
									 print("<TABLE class='table table-hover'> \n"); 
									 print("<thead><tr><th>Student Total Credit</th><th>Student GPA</th></tr></thead>\n");
									 print("<tbody>\n");
									 $sql = "SELECT coursecredit,score FROM smScore WHERE studentid=".$user_id;
									 $res = mysql_query($sql);
									 $GPA=0;
									 $totalcredit=0;
										while($Row=mysql_fetch_array($res))

										{
											$totalcredit=$totalcredit+$Row["coursecredit"];
											if ($Row["score"]>=95)
												$GP=5;
											else if($Row["score"]>60) 
												$GP=($Row["score"]-60)/10+1.5;
											else $GP=0;
											$GPA=$GPA+$Row["coursecredit"]*$GP;
									 }
									 if($colorflag)
										  	
										  		print("<TR>\n"); // 开始行
											
										  else
										  		print("<TR class='active'> \n");
												  $colorflag=!($colorflag);
										 		 // do each column
										  $GPA=$GPA/$totalcredit;
										   print("<TD>");//开始列
										   print($totalcredit);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($GPA);//表格元素乘积
										   print("</TD>");
									 print("</tbody>\n");
									 print("</TABLE>\n"); // 表格结束

									?>
									
							</div>
						 </div>
					</div>
				
	</body>
</html>

