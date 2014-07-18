<?php
	session_start();
	$_SESSION['role']="student";
	if($_SESSION['id'] == NULL) $_SESSION['id'] = 1;//default
	$user_id=$_SESSION['id'];
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
			
			<style type="text/css">
			details {  
  overflow: hidden;  
  margin-bottom: 10px;  
  display: block;  
}  
   
details summary {  
  cursor: pointer;  
    background: #e3e3e3;  
  padding: 10px;  
}  
   
details div {  
  float: left;  
  width: 65%;  
}  
   
details div h3 { margin-top: 0; }  
   
details img {  
 float: left;  
 width: 200px;  
  padding: 0 30px 10px 10px;  
}  
</style>
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
						<a class="navbar-brand" href="score_query.php">Return</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav"> 
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
									$sql1="SELECT * FROM smScore WHERE studentid=".$user_id." group by term";
									$term1=mysql_query($sql1);
									while ($row1=mysql_fetch_array($term1))
									{
										print("<details>");
									print  ("<summary><b>".$row1["term"]."</b></summary>");
									print ("<p>");
									$colorflag=1;
									 print("<TABLE class='table table-hover'> \n"); 
									 print("<thead><tr><th>Course Name</th><th>Score</th></tr></thead>\n");
									 print("<tbody>\n");
									 $sql = "SELECT * FROM smScore WHERE studentid=".$user_id."  and term='".$row1["term"]."'";
									 $res = mysql_query($sql);
									
										while($Row=mysql_fetch_array($res))

										{
										  if($colorflag)
										  	
										  		print("<TR>\n"); // 开始行
										  else
										  		print("<TR class='active'> \n");
												  $colorflag=!($colorflag);
										 		 // do each column
										  
										   print("<TD>");//开始列
										   print($Row["coursename"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["score"]);//表格元素乘积
										   print("</TD>");

 							
									  
									  print("</TR>\n"); // 行结束
									 }
									 print("</tbody>\n");
									 print("</TABLE>\n"); // 表格结束
									?>
									</p>
									</details>
									<?php
									}
									?>
							</div>
						 </div>
					</div>
				
	</body>
</html>