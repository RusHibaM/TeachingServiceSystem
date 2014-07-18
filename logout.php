<?php
	session_start();
	unset($_SESSION['user_name']);
	unset($_SESSION['user_id']);
	unset($_SESSION['user_password']);
	unset($_SESSION['view_id']);
	session_destroy();
	header('Location: ./login.php');
?>
