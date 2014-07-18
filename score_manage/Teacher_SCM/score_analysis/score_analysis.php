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
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script src="Highcharts-3.0.10/Highcharts-3.0.10/js/highcharts.js"></script>
	        <script src="Highcharts-3.0.10/Highcharts-3.0.10/js/modules/exporting.js"></script>
			
			<script type="text/javascript" src="js/tech.js"></script>

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
							<li  class="active">
								<a href="../score_analysis/score_analysis.php">Score Analysis</a>
							</li>
							<li>
							<?php
                  $con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
									if(!$con)
										echo "no connection";
									mysql_select_db("SEproject");
									
                  date_default_timezone_set('Asia/Shanghai');
                  $check = mysql_query("SELECT * FROM smDeadline");
                  $row = mysql_fetch_array($check);
                  $now = date("Y-m-d");//获取当前时间(CHN)
                  $time1 = strtotime($now);
                  $time2 = strtotime($row['deadline']);
                  $diff = $time1 - $time2;
                  if($diff < 0)
                      echo '<a href="../score_modify/score_modify.php">Score Modify</a>';
                  else
                      echo '<a href="../score_modify/score_modify_app.php">Score Modify</a>';
                  
                  mysql_close($con);
							?>
							</li>
						</ul>

					</div>
				</div>
			</div>
			
			<div class="container">
			 <p><h4>Choose the class</h4><select id="select" style="width:10%">
				  </select>
				  
		  <a class="btn btn-primary btn-large" id="button" style="width:20%" href="javascript: submit($('#select option:selected').attr('class_id'));">CHOOSE</a>
		  </p>	 
			 <div id="chart">
			 </div>
			 
			 <p id="average"> </p>
			 <p id="result"> </p>
			 <div id="table">
			 </div>
			  
			</div>
		</body>
	</html>