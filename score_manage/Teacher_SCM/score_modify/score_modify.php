
<?php
	session_start();
	$_SESSION['role']="teacher";
	$_SESSION['id']=21004;
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
			<script type="text/javascript" src="../jquery.js"></script>
			<script type="text/javascript">
			$(document).ready(function(){
			  $("button").click(function(){
			  	 document.getElementById("clsid").value=$(this).parent().prev().text();
			  	 $("#clsform").submit();
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
							<li>
								<a href="../score_record/score_record.php">Score Record</a>
							</li>
							<li >
								<a href="../score_query/score_query.php">Score Query</a>
							</li>	
							
							<li>
								<a href="../score_analysis/score_analysis.php">Score Analysis</a>
							</li>
							<li  class="active">
								<a href="score_modify.php">Score Modify</a>
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
									 print("<TABLE class='table table-hover'>\n"); // 表格开始
									 print("<thead><tr><th>Course ID</th><th>Course Name</th><th>Class ID</th></tr></thead>\n");
									 print("<tbody>\n");
									 
									 $sql = "SELECT Re_imsCourse_acaClass_imsTeacher.cuz_id as course_id,cuz_name,class_id FROM Re_imsCourse_acaClass_imsTeacher,imsCourse WHERE is_graded=1 and teac_id=".$user_id." and Re_imsCourse_acaClass_imsTeacher.cuz_id=imsCourse.cuz_id" ;
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
										   print($Row["course_id"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["cuz_name"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["class_id"]);//表格元素乘积
										   print("</TD>");

										  
 
 							 ?>
							  <td>
							  	<button type="button" class="btn btn-default btn-sm"> Check Course Grading</button>
							  </td>
					  
									  <?php
									  
									  print("</TR>\n"); // 行结束

									 }
									 print("</tbody>\n");
									 print("</TABLE>\n"); // 表格结束

									?>
									
							</div>
						 </div>
					</div>
					<form id="clsform" name="clsform" action="mo_modify.php" method="post">
					<input type="hidden" id="clsid" name="clsid" value=""/>
				    </form>

		</body>
	</html>