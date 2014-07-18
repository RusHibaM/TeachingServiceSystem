<?php
            session_start();
	
			$_SESSION["return"]="pwdchange";
			$con=mysql_connect("218.244.137.223", "ddpse", "zjuddpse2014");
	        
			if(!$con)
	            
			{
	die('Could not connect: ' . mysql_error());
 }            
            mysql_select_db("SEproject",$con);
            $ID = $_SESSION["view_id"];
			//echo $_POST["changepassword"];
			//echo $_POST["changepasswordc"];
			
            $failFlag = '0';//0 stands for fail, 1 for succeed

            //regardless of what kind of user does the lookup, SESSION holds the values of the looked up user. Use these to verify old pw etc.
            if(($_POST["changepassword"] == $_POST["changepasswordc"]) && ($_POST["changepasswordc"] != NULL) && ($_POST["changepassword"] != NULL)) //if the entered passwords match and are not NULL
            {
				if(Isset($_POST["oldpassword"]))//if the user modifies his own password
				{
                    if ($_POST["oldpassword"] == $_SESSION["user_password"])    
					//if the old password is correct
                    {
                        $Password = $_POST["changepassword"];
						$_SESSION["user_password"] = $_POST["changepassword"];
						$failFlag = '1';                            
                    } 
				}
				else
					$failFlag = '1';    

            }				
		
			if($failFlag=='0')
			{
				mysql_close($con);		
				header('Location: ./OperationFail2.php');
			}
			else
			{

				if($_SESSION["view_type"]=="1")
					{
						$query="UPDATE `imsManager` SET 
mgr_pwd = '$Password'
 WHERE mgr_id = '$ID'";
					}
				
				else if($_SESSION["view_type"]=="2")
					{
						$query="UPDATE `imsTeacher` SET 
teac_pwd = '$Password'
 WHERE teac_id = '$ID'";
					}
				else 
					{
						$query="UPDATE `imsStudent` SET 
stu_pwd = '$Password'
 WHERE stu_id = '$ID'";
					}
						
				$result = mysql_query($query);

				mysql_close($con);

				header('Location: ./OperationSuccessful2.php');
			}
?>