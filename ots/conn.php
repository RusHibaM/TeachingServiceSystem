<?php
$con = mysql_connect("localhost","ddpse","zjuddpse2014");
if(!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("SEproject", $con);
