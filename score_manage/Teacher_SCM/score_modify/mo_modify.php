<?php
	session_start();
	$_SESSION['role']="teacher";
	$_SESSION['id']=1;
	$_SESSION['name']="Joe";
	$_SESSION['clsid']=$_POST['clsid'];
	$user_id=$_SESSION['id'];
	$user_name=$_SESSION['name'];
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

			<script type="text/javascript" src="../jquery.js"></script>

			<script type="text/javascript">
			$(document).ready(function(){
			  $("button").click(function(){
			  	 $("#moform").submit();
			  //  $("table").hide();
			    
			  });
			});
			</script>

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
							<li >
								<a href="../score_record/score_record.php">Score Record</a>
							</li>
							<li>
								<a href="../score_query/score_query.php">Score Query</a>
							</li>	
							<li>
								<a href="../score_analysis/score_analysis.php">Score Analysis</a>
							</li>
							<li class="active">
								<a href="../score_modify/score_modify.php">Score Modify</a>
							</li>
						</ul>

					</div>
				</div>
			</div>

			<form id="moform" action="mo_dbconnect_1.php" method="POST">
			<div class="container-fluid">
			 			<div class="row-fluid">
			 				<div class="span12">
			 					
			 				<?php
								 	$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
								 	$stu_count=0;
									if(!$con)
										echo "no connection";
									mysql_select_db("SEproject");

									$colorflag=1;
									 print("<TABLE class='table table-hover'>\n"); // 表格开始
									 print("<thead><tr><th>Student ID</th><th>Name</th><th>Score</th><th>Modify to</th></tr></thead>\n");
									 print("<tbody>\n");
									 $sql = "SELECT studentid,student_name,score,coursename FROM smScore WHERE classid=".$_POST['clsid'];
									 $res = mysql_query($sql);
									 print("<input type='hidden' id='clsid' name='clsid' value='".$_POST['clsid']."'/>");
									 $cnflag=1;


										while($Row=mysql_fetch_array($res))

										{
										  $stu_count=$stu_count+1;
										  if($colorflag)
										  	
										  		print("<TR>\n"); // 开始行
											
										  else
										  		print("<TR class='active'> \n");
												  $colorflag=!($colorflag);
										 		 // do each column
										  
										   print("<TD>");//开始列
										   print($Row["studentid"]);//表格元素乘积
										   print("<input type='hidden' id='stu".$stu_count."' name='stu".$stu_count."' value='".$Row["studentid"]."'/>");
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["student_name"]);//表格元素乘积
										   print("</TD>");		
										   print("<TD>");//开始列
										   print($Row["score"]);//表格元素乘积
										   print("</TD>");

							 			   print("<TD>");
							  			 print("<input max=100 name=".$Row["studentid"]." id=".$Row["studentid"]." type='number'/>");

							  			 print("<input type=hidden name=".$Row["studentid"]."_osc id=".$Row["studentid"]."_osc value=".$Row["score"]."  />");
							  			 print("<input type=hidden name=".$Row["studentid"]."_name id=".$Row["studentid"]."_name value='".$Row["student_name"]."'/>");
							  			 if($cnflag)
							  			 {
                          print("<input type=hidden name='coursename' id='coursename' value='".$Row["coursename"]."'/>");
                          $cnflag=0;
							 			   }
							 			   print("</TD>");

							 			  
					  
									  
									  print("</TR>\n"); // 行结束

									 }
									 print("</tbody>\n");
									 print("</TABLE>\n"); // 表格结束
									 print("<input type='hidden' id='stu_count' name='stu_count' value='".$stu_count."'/>");
									 print("<input type='hidden' id='teac_id' name='teac_id' value='".$user_id."'>");
									 print("<input type='hidden' id='teac_name' name='teac_name' value='".$user_name."'>");
									 if($res)
									 print("<button type='button' class='btn btn-default btn-sm'> Submit </button>");
									 else
									 print("<script type='text/javascript'>alert('The login status has been expired!'')</script>");
									?>
				</form>
							</div>
						 </div>
					</div>

		</body>
	</html>
