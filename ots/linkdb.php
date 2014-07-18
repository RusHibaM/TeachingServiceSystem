<?php
	function LIDB()
	{
		global $mysqli;
		$mysqli = new mysqli("localhost","ddpse","zjuddpse2014","SEproject");
		if (mysqli_connect_error())
		{
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
 global $Add_Question_Step;
?>