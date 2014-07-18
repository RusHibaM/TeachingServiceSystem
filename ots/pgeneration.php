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
if (isset($_GET['PaperID']))
{
setcookie("PaperID",$_GET['PaperID']);
}
if (isset($_GET['Type']))
{
setcookie("Type",$_GET['Type']);
}
}
?>
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
	<title>Paper generation</title>
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
						<a href="#">Paper Generation</a>
					</li>
				</ul>
			</div>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="Create New Papaer" class="well span3 top-block" href="pgeneration.php?Step=AC_Paper">
					<span class="icon32 icon-green icon-add"></span>
					<div>Auto-Create New Paper</div>
				</a>
				<a data-rel="tooltip" class="well span3 top-block" href="pgeneration.php?Step=HC_Paper&PaperID=0">
					<span class="icon32 icon-red icon-user"></span>
					<div>Create Paper By Hand</div>
				</a>
				<a data-rel="tooltip" class="well span3 top-block" href="pgeneration.php?Step=View_Paper">
					<span class="icon32 icon-blue icon-search"></span>
					<div>View Existed Papers</div>
				</a>

				
				<a data-rel="tooltip" title="12 new messages." class="well span3 top-block" href="#">
					<span class="icon32 icon-white icon-envelope-closed"></span>
					<div>Messages</div>
				</a>
			</div>
					
<?php
if (isset($_GET['Step']))
{
if ($_GET['Step']=="HC_Paper")
{
$display_block=<<<eof
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-plus"></i> Create New Papaer</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<legend>Edit Your Paper</legend>
eof;
$PaperID=$_GET['PaperID'];
$display_block.=<<<eof
<div class="control-group">
<form class="form-horizontal" method="post" action="Addpaper.php?Way=HC_Add&PaperID=$PaperID">
<fieldset>
								<label class="control-label" for="appendedInputButton">Input Question ID:</label>
								<div class="controls">
								  <div class="input-append">
<input id="appendedInputButton" name="add_id" size="16" type="text">
<button class="btn" type="submit">Add</button>
								  </div>
								</div>
</fieldset>
</form>
</div>
eof;
if ($PaperID!="0")
{
$get_question_sql = " SELECT ots_QuestionID FROM otspaper_question
WHERE ots_PaperID=$PaperID
ORDER BY ots_QuestionID ASC";

$get_question_res = mysqli_query($mysqli, $get_question_sql)	
				  or	die(mysqli_error($mysqli));    
while ($question_info = mysqli_fetch_array($get_question_res))
{
$question_id = $question_info['ots_QuestionID']; 
$display_block.=<<<END_OF_TEXT
$question_id</br>
END_OF_TEXT;
}
mysqli_free_result($get_question_res);
mysqli_close($mysqli);        
}
$display_block.=<<<eof
<form class="form-horizontal" method="post" action="Addpaper.php?Way=HC_Add&PaperID=$PaperID&Status=over">
            <div class="control-group">
								<label class="control-label" for="focusedInput">Paper Titile</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" name="paper_title" type="text" value="Input your paper title here">
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
</form>
					</div>	
				</div><!--/span-->
			</div><!--/row-->
eof;
echo $display_block;
}
elseif ($_GET['Step']=="AC_Paper")
{
$display_block=<<<eof
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-plus"></i> Create New Papaer</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="Addpaper.php?Way=AC_Add">
						  <fieldset>
							<legend>Edit Your Paper</legend>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Paper Titile</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" name="paper_title" type="text" value="Input your paper title here">
								</div>
							</div>
              <div class="control-group">
								<label class="control-label" for="appendedInputButton">Input Question Number:</label>
								<div class="controls">
								  <div class="input-append">
									<input id="appendedInputButton" size="16" name="qes_number" type="text">
								  </div>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>	
				</div><!--/span-->
			</div><!--/row-->
eof;
echo $display_block;
}
}
?>
      
      
<?php
if (isset($_GET['Step']))
{
if ($_GET['Step']=="View_Paper")
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
								  <th>Paper ID</th>
                  <th>Title</th>
								  <th>Class</th>
								  <th>Creator</th>
							  </tr>
				    </thead> 
            <tbody>
END_OF_TEXT;
$get_question_sql = " SELECT * FROM otspaper
				    ORDER BY ots_PaperID ASC";

$get_question_res = mysqli_query($mysqli, $get_question_sql)	
				  or	die(mysqli_error($mysqli));    
while ($question_info = mysqli_fetch_array($get_question_res))
		{
			$question_id = $question_info['ots_PaperID'];  
			$question_title = $question_info['ots_Title'];
			$question_class = $question_info['ots_Class'];
			$question_creator = $question_info['ots_Creator'];

$display_block1.=<<<END_OF_TEXT
	<tr>
								<td>$question_id</td> 
								<td>$question_title</td>
								<td class="center">$question_class</td>
								<td class="center">$question_creator</td>
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
	
		
</body>
</html>
