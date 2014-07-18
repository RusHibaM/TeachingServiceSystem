<?PHP
session_start();
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
			  $("#button1").click(function(){
			  	 $("#form_1").submit();
			  });
			  $("#button2").click(function(){
			  	 $("#form_2").submit();
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
							<li  class="active">
								<a href="../score_query/score_query.php">Score Query</a>
							</li>	
							<li>
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
			 <div class="starter-template"><h1>THIS IS SCORE QUERY</h1>
          <div class="starter-template"><h2>Choose the Type</h2><br/>
              <form id="form_1" action="stuquery.php" method="POST">
                  <div class="container-fluid">
                        <div class="row-fluid">
                          <div class="span12">
                              <div class="input-group input-group-lg">
                                <span class="input-group-addon"> Student's ID </span>
                                <input id="stuid" type="text" name="stuid" class="form-control" placeholder="Please input student's ID" >
                                <span class="input-group-btn" >
                                    <button id="button1" class="btn btn-info" type="button">Go!</button>
                                </span>
                              </div>
                          </div>
                        </div>  
                  </div>
                  </form>
                  <br/><br/><br/>
                  <form id="form_2" action="teaquery.php" method="POST">
                  <div class="container-fluid">
                        <div class="row-fluid">
                          <div class="span12">
                              <div class="input-group input-group-lg">
                                <span class="input-group-addon">Teacher's ID</span>
                                <input id="teaid" type="text" name="teaid" class="form-control" placeholder="Please input teacher's ID" >
                                <span class="input-group-btn" >
                                    <button id="button2" class="btn btn-info" type="button">Go!</button>
                                </span>
                              </div>
                          </div>
                        </div>  
                  </div>
                  </form>
			 
          </div>
			 </div>
			
		</body>
	</html>