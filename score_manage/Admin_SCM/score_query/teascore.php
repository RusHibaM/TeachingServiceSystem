<?php
	session_start();
	$_SESSION['role']="teacher";
	if($_SESSION['id'] == NULL) $_SESSION['id'] = 21004;//default
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

									$colorflag=1;
									 print("<TABLE class='table table-hover'>\n"); // ���ʼ
									 print("<thead><tr><th>Course ID</th><th>Course Name</th><th>Class ID</th></tr></thead>\n");
									 print("<tbody>\n");
									$sql = "SELECT Re_imsCourse_acaClass_imsTeacher.cuz_id as course_id,cuz_name,class_id FROM Re_imsCourse_acaClass_imsTeacher,imsCourse WHERE is_graded=1 and teac_id=".$user_id." and Re_imsCourse_acaClass_imsTeacher.cuz_id=imsCourse.cuz_id" ;
									 $res = mysql_query($sql);
									
										while($Row=mysql_fetch_array($res))

										{
										  if($colorflag)
										  	
										  		print("<TR>\n"); // ��ʼ��
											
										  else
										  		print("<TR class='active'> \n");
												  $colorflag=!($colorflag);
										 		 // do each column
										  
										   print("<TD>");//��ʼ��
										   print($Row["course_id"]);//���Ԫ�س˻�
										   print("</TD>");

										   print("<TD>");//��ʼ��
										   print($Row["cuz_name"]);//���Ԫ�س˻�
										   print("</TD>");

										   print("<TD>");//��ʼ��
										   print($Row["class_id"]);//���Ԫ�س˻�
										   print("</TD>");

										  
 
 							 ?>
							  <td>
							  	<button type="button" class="btn btn-default btn-sm"> Check Course Grading</button>
							  </td>
					  
									  <?php
									  
									  print("</TR>\n"); // �н���

									 }
									 print("</tbody>\n");
									 print("</TABLE>\n"); // ������

									?>
									
							</div>
						 </div>
					</div>
					<form id="clsform" name="clsform" action="class_result.php" method="post">
					<input type="hidden" id="clsid" name="clsid" value=""/>
				    </form>
		</body>
	</html>