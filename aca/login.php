<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

    <title>图书管理系统</title>
    <style>
    form{text-align:center;}
</style>
</head>
<body style="background-color:#CCFFFF">
<?php

    $username=trim($_POST['searchterm11']);
    $password=trim($_POST['searchterm12']);
           
           session_start(); 
            $_SESSION['user_name'] = "shadow";
            $_SESSION['user_type']= 1;
            $_SESSION['user_id']= 20001;
             echo "<script>window.location.href='main.html'</script>";
       
?>
        <br>
</body>
</html>