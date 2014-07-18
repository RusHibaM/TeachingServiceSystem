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
	<title>Question Bank</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
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
            <span class="icon-bar">
            </span>					
            <span class="icon-bar">
            </span>					
            <span class="icon-bar">
            </span>				</a>				
          <a class="brand" href="index.php"> 
            <img alt="Charisma Logo" src="img/logo20.png" /> 
            <span>Online Testing System
            </span></a>				 				
          <!-- theme selector starts --> 				
          <div class="btn-group pull-right theme-container" >					
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">						
              <i class="icon-tint"></i>
              <span class="hidden-phone"> Change Theme / Skin
              </span>						
              <span class="caret">
              </span>					</a>					
            <ul class="dropdown-menu" id="themes">						
              <li>
              <a data-value="classic" href="#">
                <i class="icon-blank"></i> Classic</a>
              </li>						
              <li>
              <a data-value="cerulean" href="#">
                <i class="icon-blank"></i> Cerulean</a>
              </li>						
              <li>
              <a data-value="cyborg" href="#">
                <i class="icon-blank"></i> Cyborg</a>
              </li>						
              <li>
              <a data-value="redy" href="#">
                <i class="icon-blank"></i> Redy</a>
              </li>						
              <li>
              <a data-value="journal" href="#">
                <i class="icon-blank"></i> Journal</a>
              </li>						
              <li>
              <a data-value="simplex" href="#">
                <i class="icon-blank"></i> Simplex</a>
              </li>						
              <li>
              <a data-value="slate" href="#">
                <i class="icon-blank"></i> Slate</a>
              </li>						
              <li>
              <a data-value="spacelab" href="#">
                <i class="icon-blank"></i> Spacelab</a>
              </li>						
              <li>
              <a data-value="united" href="#">
                <i class="icon-blank"></i> United</a>
              </li>					
            </ul>				
          </div>				
          <!-- theme selector ends -->				 				
          <!-- user dropdown starts --> 				
          <div class="btn-group pull-right" >					
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">						
              <i class="icon-user"></i>
              <span class="hidden-phone"> $username                             <!-- $username is the name of user -->
              </span>						
              <span class="caret">
              </span>					</a>					
            <ul class="dropdown-menu">						
              <li>
              <a href="index.php">Profile</a>                                  <!-- You can add the href pf personal profile page here.  -->
              </li>						
              <li class="divider">
              </li>						
              <li>
              <a href="login.html">Logout</a>                                   <!-- Here is the logout button. -->
              </li>					
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
        <div class="span2 main-menu-span">				                              <!-- Here are interfaces to different modules -->
          <div class="well nav-collapse sidebar-nav">					
            <ul class="nav nav-tabs nav-stacked main-menu">						
              <li class="nav-header hidden-tablet">Main
              </li>						
              <li>
              <a class="ajax-link" href="index.php">
                <i class="icon-home"></i>
                <span class="hidden-tablet"> Profile
                </span></a>
              </li>						
              <li>
              <a class="ajax-link" href="qbank.php">
                <i class="icon-eye-open"></i>
                <span class="hidden-tablet"> Question Bank
                </span></a>
              </li>						
              <li>
              <a class="ajax-link" href="pgeneration.php">
                <i class="icon-edit"></i>
                <span class="hidden-tablet"> Paper Generation
                </span></a>
              </li>						
              <li>
              <a class="ajax-link" href="oltest.php">
                <i class="icon-list-alt"></i>
                <span class="hidden-tablet"> Online Test Entry
                </span></a>
              </li>						
              <li>
              <a class="ajax-link" href="ssa.php">
                <i class="icon-font"></i>
                <span class="hidden-tablet"> Score Statistic Analysis
                </span></a>
              </li>						
              <li>
              <a class="ajax-link" href="contact.html">
                <i class="icon-picture"></i>
                <span class="hidden-tablet"> Contact Us
                </span></a>
              </li>						
            </ul>					
            <label id="for-is-ajax" class="hidden-tablet" for="is-ajax">
              <input id="is-ajax" type="checkbox"> Ajax on menu
            </label>				
          </div>
          <!--/.well -->			
        </div>
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
		
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Online Test</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Do Test</a>
					</li>
				</ul>
			</div>


			<h2>Now testing: Data structure</h2>
			<div id="times_container"  style="border-style:solid;  width:600px; height:40px; line-height:40px; font-size:24px">
				Time left：		   <span id="times_day"> </span>days
                                   <span id="times_hour"> </span> hours
                                   <span id="times_minute"> </span>minutes 
                                   <span id="second"> </span>seconds
			</div>
			
			<!-- Here Start the question part -->
			<div class="box-content" name="biao1">
					<form name="form1" action="checkanswer.php" method="get" class="form-horizontal">
					<fieldset>
<?php
  
  $ID=$_SESSION["ID"];
   $testid=$_SESSION['TID'];
  
 if($_SESSION['ID']=="")
{
  echo "<script> alert('Please login first'); window.location.href='login.html'; </script>";
}
if($_SESSION['TID']=="")
{

  echo "<script> alert('Please choose test'); window.location.href='oltest.php'; </script>";
}
//echo $_SESSION['TID'];

require_once("conn.php");	




$result=mysql_query("SELECT *
					FROM otspaper_question,otsquestion,otsquestion_option WHERE 
					otsquestion.ots_QuestionID=otspaper_question.ots_QuestionID  
					AND  otspaper_question.ots_PaperID=$testid 
					AND otsquestion_option.ots_QuestionID=otspaper_question.ots_QuestionID  " );
$row = mysql_fetch_array($result);
$num=0;

while ($row)
{
$num++;
				echo "
						<div class='control-group'>
						<h3>
							Question $num
						</h3>";
				echo "
						<h4>
							$row[ots_Content]  ?
						</h4>

							<label class='control-label'>Chose Answer</label>";
							if($row['ots_Type']=="J")
							{
							  echo "<div class='controls'>
								  <label class='radio'>
									<input type='radio' name='Q$num' id='optionsRadios1' value='TRUE' >
									True
								  </label>
								  <div style='clear:both'></div>
								  <label class='radio'>
									<input type='radio' name='Q$num' id='optionsRadios2' value='FALSE'>
									False
								  </label>
								</div>
							  </div>";
							}
							else
                            echo"
								<div class='controls'>
								  <label class='radio'>
									<input type='radio' name='Q$num' id='optionsRadios1' value='A' >
									A: $row[optionA]
								  </label>
								  <div style='clear:both'></div>
								  <label class='radio'>
									<input type='radio' name='Q$num' id='optionsRadios2' value='B'>
									B: $row[optionB]
								  </label>
								   <div style='clear:both'></div>
								  <label class='radio'>
									<input type='radio' name='Q$num' id='optionsRadios3' value='C'>
									C: $row[optionC]
								  </label>
								    <div style='clear:both'></div>
								  <label class='radio'>
									<input type='radio' name='Q$num' id='optionsRadios4' value='D'>
									D: $row[optionD]
								  </label>
								  
								  
								  
								  
								</div>
						</div>";
$row = mysql_fetch_array($result);
}
echo"
					<div class='form-actions'>
						<button type='submit' class='btn btn-primary'>Submit</button>
					</div>
					</fieldset>

					 </form>
				</div>"
	?>				
					
					

	
	
	
	
		
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

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

var time_end = "<?php
$result=mysql_query("SELECT *
					FROM otstest WHERE otstest.ots_PaperID=$testid" );
$row = mysql_fetch_array($result);
echo strtotime($row['ots_Generatetime']);
echo "000";
?> ";  // 设定活动结束结束时间

//time_end = time_end.getTime();

 

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
