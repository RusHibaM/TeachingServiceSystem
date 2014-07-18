<?php
	session_start();
	if($_SESSION["islogin"]!=1)
	{
		print("<script>alert('Please Log in!')</script>");
	    Print  ("<script language='javascript'>location.replace('../Login.php')</script>"); 
	exit;
	}
	switch($_SESSION["user_type"])
	{
		case 1:
				Print  ("<script language='javascript'>location.replace('Admin_SCM/index.php')</script>");
				break;
		case 2:
				Print  ("<script language='javascript'>location.replace('Teacher_SCM/index.php')</script>");
				break;
		case 3:
				Print  ("<script language='javascript'>location.replace('Student_SCM/index.php')</script>");
				break;
		



	}

?>
