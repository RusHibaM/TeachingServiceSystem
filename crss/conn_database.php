<?php
	$conn = @mysql_connect("localhost","ddpse","zjuddpse2014");
	$mysql_database="SEproject";
	if (!$conn)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
?>