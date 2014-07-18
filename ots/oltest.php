<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <!--
    Charisma v1.0.0
    Copyright 2012 Muhammad Usman
    Licensed under the Apache License v2.0
    http://www.apache.org/licenses/LICENSE-2.0
    http://usman.it
    http://twitter.com/halalit_usman
    -->
    <meta charset="utf-8">
    <title>Question bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
    <style type="text/css">body{ padding-bottom: 40px;} .sidebar-nav{ padding: 9px 0;}</style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <link href='css/fullcalendar.css' rel='stylesheet'>
    <link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
    <link href='css/chosen.css' rel='stylesheet'>
    <link href='css/uniform.default.css' rel='stylesheet'>
    <link href='css/colorbox.css' rel='stylesheet'>
    <link href='css/jquery.cleditor.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/opa-icons.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    <!-- topbar starts -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="index.php">
                    <img alt="Charisma Logo" src="img/logo20.png">
                    <span>Online Testing System</span>
                </a>
                <!-- theme selector starts -->
                <div class="btn-group pull-right theme-container" >
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-tint"></i>
                        <span class="hidden-phone">Change Theme / Skin</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" id="themes">
                        <li><a data-value="classic" href="#"><i class="icon-blank"></i>Classic</a></li>
                        <li><a data-value="cerulean" href="#"><i class="icon-blank"></i>Cerulean</a></li>
                        <li><a data-value="cyborg" href="#"><i class="icon-blank"></i>Cyborg</a></li>
                        <li><a data-value="redy" href="#"><i class="icon-blank"></i>Redy</a></li>
                        <li><a data-value="journal" href="#"><i class="icon-blank"></i>Journal</a></li>
                        <li><a data-value="simplex" href="#"><i class="icon-blank"></i>Simplex</a></li>
                        <li><a data-value="slate" href="#"><i class="icon-blank"></i>Slate</a></li>
                        <li><a data-value="spacelab" href="#"><i class="icon-blank"></i>Spacelab</a></li>
                        <li><a data-value="united" href="#"><i class="icon-blank"></i>United</a></li>
                    </ul>
                </div>
                <!-- theme selector ends -->
                <!-- user dropdown starts -->
                <div class="btn-group pull-right" >
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user"></i>
                        <span class="hidden-phone">
<?php session_start();echo $_SESSION['username'];?>
                        </span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">Logout</a></li>
                    </ul>
                </div>
                <!-- user dropdown ends -->
            </div>
        </div>
    </div>
    <!-- topbar ends -->
    <div class="container-fluid">
        <div class="row-fluid">
            <!-- left menu starts -->
            <div class="span2 main-menu-span">
                <div class="well nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li class="nav-header hidden-tablet">Main</li>
                        <li>
                            <a class="ajax-link" href="index.php">
                                <i class="icon-home"></i>
                                <span class="hidden-tablet">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="ajax-link" href="qbank.php">
                                <i class="icon-eye-open"></i>
                                <span class="hidden-tablet">Question Bank</span>
                            </a>
                        </li>
                        <li>
                            <a class="ajax-link" href="pgeneration.php">
                                <i class="icon-edit"></i>
                                <span class="hidden-tablet">Paper Generation</span>
                            </a>
                        </li>
                        <li>
                            <a class="ajax-link" href="oltest.php">
                                <i class="icon-list-alt"></i>
                                <span class="hidden-tablet">Online Test Entry</span>
                            </a>
                        </li>
                        <li>
                            <a class="ajax-link" href="ssa.php">
                                <i class="icon-font"></i>
                                <span class="hidden-tablet">Score Statistic Analysis</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/.well -->
            </div>
            <!--/span-->
            <!-- left menu ends -->
            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>
                        You need to have 
                        <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.
                    </p>
                </div>
            </noscript>
            <div id="content" class="span10">
                <!-- content starts -->
                <div>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a><span class="divider">/</span></li>
                        <li><a href="#">Take Tests</a></li>
                    </ul>
                </div>
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-plus"></i> View Existed Papers</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Titile</th>
								  <th>Date registered</th>
								  <th>Length</th>
								  <th>Publisher</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
	
		 		  
		  
          <?php
/*
		  session_start();

$_SESSION['ID']="1";

if($_SESSION['ID']=="")
{
  echo "<script> alert('Please login first'); window.location.href='login.html'; </script>";
	
 }
 $studentID=$_SESSION['ID'];
*/
$studentID=1;
require_once("conn.php");			//连接数据库
date_default_timezone_set('Asia/Shanghai');	//设置本地时间

$result=mysql_query("SELECT *
					FROM otsenroll,otstest WHERE otsenroll.ots_CourseID=otstest.ots_CourseID AND otsenroll.ots_StudentID=$studentID" );
$row = mysql_fetch_array($result);
	if($row == NULL){
		$check = "No TEST exsit";
		echo  "$check . <br/>
				 </tbody>
			  </table>";
			  // FOR no test exist
	}
	else
	{
		  
		while($row)
		{
				$cousename = mysql_fetch_array(mysql_query("SELECT *
					FROM imsCourse WHERE $row[ots_CourseID]=imsCourse.cuz_id" ));
				$teachername= mysql_fetch_array(mysql_query("SELECT *
					FROM imsTeacher WHERE $row[ots_TeacherID]=imsTeacher.teac_id" ));	
					
				echo "<tr>
								<td>$cousename[cuz_name] </td>";
				echo"			<td class='center'>$row[ots_Examtime]</td>";
				echo"				<td class='center'>$row[ots_Generatetime]</td>";
				echo"				<td class='center'>$teachername[teac_name]</td>";
				
				echo date('Y-m-d');
				if($row["ots_Examtime"]<date('Y-m-d') && $row["ots_Generatetime"]>date('Y-m-d'))
				{
				echo"				<td class='center'>
       				<span class='label label-success'>Active</span> </td>";
				}
				else
				{
				 				
								echo"<td class='center'>
								<span class='label label-warning'>Not available Done</span> </td>";
							
				}
							echo'	
								<td class="center">
									<a class="btn btn-success" onclick="javascript:window.location.href=';
									echo "'";
									echo "writeinfo.php?testid=$row[ots_PaperID]";
									echo "'";
									echo '"';
									echo ">
										<i class='icon-zoom-in icon-play'></i>  
										Take Test                                            
									</a>";
									echo'	
									<a class="btn btn-info" onclick="javascript:window.location.href=';
									echo "'";
									echo "ssa.php";
									echo "'";
									echo '"';
									echo ">
										<i class='icon-zoom-in icon-white'></i>  
										Check Score                                             
									</a>";
									
									
				
								echo "
								</td>
							</tr>";
		
		

	

			$row = mysql_fetch_array($result);
		}
				echo " </tbody> </table>";
			
	}					
				 
	mysql_close($con);
	?>
                    
            
            
					</div>	
				</div><!--/span-->
			</div><!--/row-->
			
			

	
	
	
	
		
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Bao GG</a> 2014</p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Online Testing System</a></p>
		</footer>
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
<script type="text/javascript"  language="javascript">

setTimeout("count_down()",1000);//设置每一秒调用一次倒计时函数

//获取容器元素 var times_container = document.getElementById("times_container");

//根据天，时，分，秒的ID找到相对应的元素

var time_day = document.getElementById("times_day");

var time_hour = document.getElementById("times_hour");

var time_minute = document.getElementById("times_minute");

var time_second = document.getElementById("second");

var time_end = new Date("2014/10/04 09:21:00");  // 设定活动结束结束时间

time_end = time_end.getTime();

 

//定义倒计时函数

function count_down(){
   var time_now = new Date();  // 获取当前时间
   time_now = time_now.getTime();
   var time_distance = time_end - time_now;  // 时间差：活动结束时间减去当前时间  
   var int_day, int_hour, int_minute, int_second;  
 if(time_distance >= 0){  
     // 相减的差数换算成天数  
     int_day = Math.floor(time_distance/86400000)
     time_distance -= int_day * 86400000;
 // 相减的差数换算成小时
        int_hour = Math.floor(time_distance/3600000)
        time_distance -= int_hour * 3600000; 
// 相减的差数换算成分钟  
     int_minute = Math.floor(time_distance/60000)   
    time_distance -= int_minute * 60000;
 

 // 相减的差数换算成秒数 

      int_second = Math.floor(time_distance/1000)   

 

    // 判断小时小于10时，前面加0进行占位

        if(int_hour < 10)

        int_hour = "0" + int_hour; 

 

// 判断分钟小于10时，前面加0进行占位     

  if(int_minute < 10)   

   int_minute = "0" + int_minute; 

 

 // 判断秒数小于10时，前面加0进行占位

       if(int_second < 10)

       int_second = "0" + int_second;      

 

// 显示倒计时效果      

time_day.innerHTML = int_day;

time_hour.innerHTML = int_hour;

time_minute.innerHTML = int_minute;

time_second.innerHTML = int_second;

setTimeout("count_down()",1000);

    }else{

//如果您想在活动结束后提示什么信息，就写在下边的单引号内
document.form1.submit();
      }
}
</script>

</body>
</html>
