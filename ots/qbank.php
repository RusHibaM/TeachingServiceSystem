<!DOCTYPE html>
<html lang="en">
<?php
include "linkdb.php";
LIDB();
setcookie("Step","");
if (isset($_GET['Step']))
{
if (isset($_GET['Step']))
{
setcookie("Step",$_GET['Step']);
} 
if (isset($_GET['QesID']))
{
setcookie("QesID",$_GET['QesID']);
}
if (isset($_GET['Type']))
{
setcookie("Type",$_GET['Type']);
}
}
?>
<head>
<script type="text/javascript">
function loadXMLDoc(GET_Str)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("Modal1-Content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","Modal_Content.php"+GET_Str,true);
xmlhttp.send();
};               
function Modalshow()
{
var Modal_Show=$.cookie('Step')==null ? 'cerulean' :$.cookie('Step');
var QesID=$.cookie('QesID')==null ? 'cerulean' :$.cookie('QesID');
var Type=$.cookie('Type')==null ? 'cerulean' :$.cookie('Type');
if (Modal_Show == "View_qes_detail")
{
  loadXMLDoc("?Step=View_qes_detail&QesID="+QesID);
  $('#Modal1').modal('show');
}
if (Modal_Show == "Add_Stage2")
{
  if (QesID !="cerulean")
  {
  loadXMLDoc("?Step=Add_Stage2&QesID="+QesID+"&Type="+Type);
	$('#Modal1').modal('show');
  }
  else
  { 
  loadXMLDoc("?Step=Add_Stage2");
	$('#Modal1').modal('show');
  }
}
}  
</script>
<!-- Code by Zhuzhenqi -->


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

<body onload="Modalshow();">
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
              <span class="hidden-phone">
<?php session_start();echo $_SESSION['username'];?>
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
              <a href="login.php">Logout</a>                                   <!-- Here is the logout button. -->
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
            </ul>				
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
						<a href="#">Question Bank</a>
					</li>
				</ul>
			</div>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="Create New Question" class="well span3 top-block" id="btn-newquestion" href="#">
					<span class="icon32 icon-green icon-add"></span>
					<div>Create New Questions</div>
				</a>

				<a data-rel="tooltip" title="View Existed Question" class="well span3 top-block" href="qbank.php?Step=View_Qes">
					<span class="icon32 icon-blue icon-search"></span>
					<div>View Existed Questions</div>
				</a>

				<a data-rel="tooltip" title="6 Students" class="well span3 top-block" href="#">
					<span class="icon32 icon-red icon-user"></span>
					<div>Students</div>
				</a>
				
				<a data-rel="tooltip" title="12 new messages." class="well span3 top-block" href="#">
					<span class="icon32 icon-white icon-envelope-closed"></span>
					<div>Messages</div>
				</a>
			</div>
      
      
<?php
if (isset($_GET['Step']))
{
if ($_GET['Step']=="View_Qes")
{
$display_block1=<<<END_OF_TEXT
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>View Existed Question</h2>
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
								  <th>ID</th>
								  <th>Class</th>
								  <th>Publisher</th>
								  <th>Type</th>
								  <th>Actions</th>
							  </tr>
				    </thead> 
            <tbody>
END_OF_TEXT;
$get_question_sql = " SELECT ots_QuestionID, ots_Type, ots_Class
            FROM otsquestion
				    ORDER BY ots_QuestionID ASC";

$get_question_res = mysqli_query($mysqli, $get_question_sql)	
				  or	die(mysqli_error($mysqli));    
while ($question_info = mysqli_fetch_array($get_question_res))
		{
			$question_id = $question_info['ots_QuestionID']; 
			$question_type = $question_info['ots_Type'];
			$question_class = $question_info['ots_Class'];

$display_block1.=<<<END_OF_TEXT
	<tr>
								<td>$question_id</td>
								<td class="center">$question_class</td>
								<td class="center">Su</td>
END_OF_TEXT;
if ($question_type="C")
{
$display_block1.=<<<END_OF_TEXT
		  <td class="center">
			<span class="label label-danger">Choice</span>
			</td> 
END_OF_TEXT;
}   
elseif ($question_type="J")
{
$display_block1.=<<<END_OF_TEXT
		  <td class="center">
			<span class="label label-success">Judgement</span>
			</td>
END_OF_TEXT;
}         						
$display_block1.=<<<END_OF_TEXT
								<td class="center">
									<a class="btn btn-success" href="qbank.php?Step=View_qes_detail&QesID=$question_id">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" href="deleteqes.php?QesID=$question_id">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
END_OF_TEXT;
		}
		mysqli_free_result($get_question_res);
		mysqli_close($mysqli);        
$display_block1.=<<<eof
    </tbody> 
  </table> 
</div> 
</div>
</div>
eof;
echo $display_block1;
}
}
?> 

			</div><!--/#content.span10-->
				</div><!--/fluid-row-->

<div class="modal hide fade" id="Modal1">
<div id="Modal1-Content">Original</div>
</div> 
</br>
</br>
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
	
		
</body>
</html>
