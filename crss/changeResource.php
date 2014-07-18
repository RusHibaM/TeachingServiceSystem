<?php require('conn_database.php');
	require('characterCheck.php');
	require('loginCheck.php');

	if ($_GET['query']=='changeResource')
	{
		$id=$_GET['id'];
		$name=$_GET['name'];
		$authority=$_GET['authority'];
		$update_date=$_GET['update_date'];
		$illustration=$_GET['illustration'];

		if(($id!=null)&&($name!=null||($authority!=null&&($authority=='private'||$authority=='public'))||$update_date!=null||$illustration!=null)){
			if($name!=null)
				$strsql="update crssResource set reso_name='". $name. "' where reso_id=". $id. ";";
			if($authority!=null&&($authority=='private'||$authority=='public'))
				$strsql="update crssResource set reso_level='".$authority."' where reso_id=".$id.";";
			if($update_date!=null)
				$strsql="update crssResource set reso_update_date='".$update_date."' where reso_id=".$id.";";
			if($illustration!=null)
				$strsql="update crssResource set reso_illustration='".$illustration."' where reso_id=".$id.";";		

			@mysql_db_query($mysql_database, $strsql, $conn);

			$data['request']="done";
			echo json_encode($data);
		}
		else{
			$data['request']="wronginput";
			echo json_encode($data);
		}
	}
	mysql_close($conn);  
?>
