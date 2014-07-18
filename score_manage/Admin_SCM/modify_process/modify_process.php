<?php
	session_start();
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
			<script type="text/javascript" src="../jquery.js"></script>
			<script type="text/javascript">
			//不够机智
			$(document).ready(function(){
        while(temp){
			  $("#button"+(temp-1)).click(function(){
            $(this).parent().parent().hide();
            alert("Success");
            var a = 1;
            var tag = $(this).parent().prev().text();
            var score = $(this).parent().prev().prev().prev().text();
            var stuid = $(this).parent().prev().prev().prev().prev().prev().prev().text();
            var clsid = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().text();
            obj={p:tag, q:score, r:stuid, s:clsid, t:a};
            $.getJSON("modify.php",obj,function(search){});
			  });
			  $("#button"+temp).click(function(){
			  	  $(this).parent().parent().hide();
			  	  var a = 0;
			  	  var tag = $(this).parent().prev().text();
			  	  obj={p:tag, t:a};
            $.getJSON("modify.php",obj,function(search){});
			  });
			  temp -= 2;
			  }
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
								<a href="../score_query/score_query.php">Score Query</a>
							</li>
							<li class="active">
								<a href="../modify_process/modify_process.php">Modify Process</a>
							</li>
							<li>
								<a href="../deadline_set/deadline_set.php">Set Deadline</a>
							</li>
						</ul>

					</div>
				</div>
			</div>
			
			<div class="container">
          <div class="starter-template"><h1>Application List</h1></div>
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
									  print("<thead><tr><th>Class ID</th><th>Course Name</th><th>Teacher ID</th><th>Teacher Name</th><th>Student ID</th><th>Student Name</th><th>Old Score</th><th>New Score</th><th>Reason</th><th>TAG</th></tr></thead>\n");
									  print("<tbody>\n");
									  $sql = "SELECT * FROM smModifyrequest WHERE valid = 1";
                    
									  $res = mysql_query($sql);
                    $count = 0;
                    $tagnum = 0;
										while($Row=mysql_fetch_array($res))
										{
                      $count +=1;
                      $tagnum += 1;
										  if($colorflag)
										  		print("<TR >\n"); // 开始行
										  else
										  		print("<TR class='active' >\n");
										  $colorflag=!($colorflag);
										 		 // do each column
										  
										   print("<TD>");//开始列
										   print($Row["classid"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["coursename"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["teac_id"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["teac_name"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["stu_id"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["stu_name"]);//表格元素乘积
										   print("</TD>"); 

										   print("<TD>");//开始列
										   print($Row["o_score"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["m_score"]);//表格元素乘积
										   print("</TD>");

										   print("<TD>");//开始列
										   print($Row["reason"]);
										   print("</TD>");
										   
										   print("<TD>");//开始列
										   print($Row["tag"]);//表格元素乘积
										   print("</TD>");
 							 ?>
 							 
							  <td>
							  	<button type="button" id="button<?php echo$count ?>" class="btn btn-success btn-sm">Approve</button>
							  	<?php $count +=1; ?>
							  	<button type="button" id="button<?php echo$count ?>" class="btn btn-danger btn-sm">Disapprove</button>
							  </td>
					  
									  <?php
									  
									  print("</TR>\n"); // 行结束

									 }
									 ?>
									 <script type="text/javascript">
                      var temp = <?php echo $count ?>;
									 </script>
									 <?php
									 print("</tbody>\n");
									 print("</TABLE>\n"); // 表格结束

									?>
									
							</div>
						 </div>
					</div>
			
		<form id="tagform" name="tagform" action="mo_typein.php" method="post">
					<input type="hidden" id="tagid" name="tagid" value=tag/>
    </form>
		</body>
	</html>

	

