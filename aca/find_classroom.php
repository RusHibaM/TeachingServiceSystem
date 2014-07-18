<?php

session_start();
if($_SESSION['user_name']=="")
{
  echo "<script> alert('Please login first!'); window.location.href='login.htm'; </script>";
  exit(0);
}

$con = mysql_connect("218.244.137.223","ddpse","zjuddpse2014");//存放数据的DataBase
if(!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("SEproject", $con);

$check = 'Success';//用于错误信息指示
$sql="select * from acaRoom order by room_id" ;
    $test = mysql_query($sql,$con);

	echo "<table border=\"1\">";
	echo "<thead>
		<tr>
		<th>Classroom ID</th>
		<th>Classroom name</th>
		<th>Classroom type</th>
		<th>Classroom capacity</th>
		</tr>
	</thead>
	<tbody>";
    while($row = mysql_fetch_array($test))
	echo "<tr> <td>".$row['room_id']."</td> <td>".$row['room_name'].",".$row['campus']."</td> <td>".$row['room_type']."</td> <td>".$row['room_cap']."</td> </tr>";

?>