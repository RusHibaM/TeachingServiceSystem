<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Loading Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
  <body >
  <div class = "container" style = "  padding-top: 40px;padding-bottom: 40px;">
      <h1 class = "text-center">
        Online Testing
      </h1>

    <!-- /.container -->

    <form action="login.php" style="  max-width: 330px;
                                      padding: 15px;
                                      margin: 0 auto;" 
                            method="post">
      <input type="text" class="form-control input-hg" name="id" placeholder="ID" />
      <br />
      <input type="password" class="form-control input-hg" name="password" placeholder="Password" />
      <br />
      <select name="logintype" class="form-control">
          <option value="teacher">Teacher Login</option>
          <option value="student">Student Login</option>
      </select>
      <br />

      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>


  </div>
  </body>
</html>
<?php
	$con = mysql_connect("localhost","ddpse","zjuddpse2014");	//存放数据的DataBase
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("SEproject", $con);
	session_start();
	$username = addslashes($_POST['id']);//获取用户名
	$password = $_POST['password'];  //获取密码
	$type = $_POST['logintype'];  //获取登录类型


	if (!empty($username) and !empty($password))
	{
		if ($type == 'student')     
		//学生账户登录
		{
			$sql = mysql_query("SELECT stu_id FROM imsStudent WHERE stu_id = '$username'");

			$exist = mysql_fetch_array($sql);   //返回查询结果
			if ($exist == NULL)     //账户不存在
				//echo "Account Don't exist";
				echo "<script>alert('Account Dont exist'); window.location.href='login.php';</script>";
			else
			{ 							 //再次判断账户密码是否匹配
				$sql = mysql_query("SELECT stu_id, stu_name FROM imsStudent WHERE stu_id = '$username'
								AND stu_pwd = '$password'");
				$vertify = mysql_fetch_array($sql);  //返回查询结果
				if ($vertify == NULL)
				{
					echo "<script> alert('Wrong Password');
						window.location.href='login.php';</script>";
					//echo "Wrong Password";     //密码错误
				}
				else //信息正确
				{
					echo "<script> alert('Login Successful');
						window.location.href='index.php';</script>";
					//echo "Login Successful";   //成功登录
					$_SESSION['ID'] = $vertify['stu_id'];
					$_SESSION['username'] = $vertify['stu_name'];
					//echo $_SESSION['ID'];
					//echo $_SESSION['username'];
				}
			}
		}
		else if ($type == 'teacher')
		//教师账户登录
		{ 	
			$sql = mysql_query("SELECT teac_id FROM imsTeacher WHERE teac_id = '$username'");

			$exist = mysql_fetch_array($sql);   //返回查询结果
			if ($exist == NULL)     //账户不存在
				//echo "Account Don't exist";
				echo "<script>alert('Account Dont exist'); window.location.href='login.php';</script>";
			else
			{ 							 //再次判断账户密码是否匹配
				$sql = mysql_query("SELECT teac_id, teac_name FROM imsTeacher WHERE teac_id = '$username'
								AND teac_pwd = '$password'");
				$vertify = mysql_fetch_array($sql);  //返回查询结果
				if ($vertify == NULL)
				{
				
					echo "<script> alert('Wrong Password');
					window.location.href='login.php';</script>";
					//echo "Wrong Password";     //密码错误
				}
				else //信息正确
				{
					echo "<script> alert('Login Successful');
						window.location.href='index.php';</script>";
					//echo "Login Successful";   //成功登录
					$_SESSION['ID'] = $vertify['teac_id'];
					$_SESSION['username'] = $vertify['teac_name'];
					//echo $_SESSION['ID'];
					//echo $_SESSION['username'];
				}
			}

		}
		else 
		{
			//echo "Wrong Logintype";   
			echo "<script> alert('Wrong Logintype');
					window.location.href='login.php';</script>";
		}
	}	
/*	else if (empty($username) and empty($password))
	{
		echo "<script> alert('Please enter ID and password first');
		window.location.href='login.php';</script>";
	}
	else if (empty($password))
	{
		echo "<script> alert('Please enter password first');
		window.location.href='login.php';</script>";
	}
	else
	{
		echo "<script> alert('Please enter ID first');
		window.location.href='login.php';</script>";

	}*/
	mysql_close($con);      		 //关闭数据库
?>
