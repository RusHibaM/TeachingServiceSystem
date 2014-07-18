<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/starter-template/# -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico"-->

        <title>Arrange subsystem</title>
    <script src="js_2/jquery.min.js"></script>
    <script src="js_2/unslider.js"></script>
    <script src="js_2/banner.js"></script>
  

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="http://getbootstrap.com/csshide1.css">
<link rel="stylesheet" href="http://getbootstrap.com/csshide2.css">
<link rel="stylesheet" href="http://getbootstrap.com/csshide3.css">
<link rel="stylesheet" href="http://getbootstrap.com/csshide4.css">
<style></style>
<link rel="stylesheet" href="http://getbootstrap.com/abprule.css">
<style></style>
<style></style>
<link href="css_2/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css_2/aboutus.css">
    <!-- Bootstrap theme -->
    <link href="css_2/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
</head>

  <body>
     <!--topbar-->
           <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../welcome.php">Teaching Service Subsystem</a>
      </div><!--navbar-header-->
      
      <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Other Subsystem<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header" style="font-size:18px">The portals:</li>
                  <li style="height:3px"><br/></li>
                  <li><a href="">Information Management System</a></li>
                  <li class="divider"></li>
                  <li><a href="">Automatic Course Arrangement Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Course Selection Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Discussion Forum Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Online Testing Subsystem</a></li>
                  <li class="divider"></li>
                  <li><a href="">Score Management Subsystem</a></li>
                </ul>
              </li>
            </ul><!--nav navbar-nav-->
           <a href="../logout.php"><button id="logout" type="button" class="btn btn-success navbar-btn navbar-right">Log out</button> </a>
      <button  id="logout" style="#8A2BE2" class="btn navbar-btn navbar-right" ><?php echo $_SESSION["user_name"]; ?></button><!--User's name is here-->
          </div><!--/.nav-collapse -->
        </div><!--container-fluid-->
        </div><!--navbar navbar-inverse navbar-fixed-top-->
     <hr style="border:3 dotted #ff0033" width="100%" SIZE=3>


        <div class="col-lg-12">
            <h1 style="margin:10px;text-align:center;">Automatically Course Scheduling</h1>
        </div>


      <div class="container">
        <div class="row">
        <div class="col-md-2">

        <a href="1.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-default" style="font-size: 1em"><b>Teaching Resource<br> Management</b></button>
        </a>

        <a href="2.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-primary" style="font-size: 1em"><b>Automatically Course<br> Scheduling</b></button>
        </a>

        <a href="3.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-success" style="font-size: 1em"><b>Manually Course<br> Adjustment</b></button>
        </a>

        <a href="4.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-info" style="font-size: 1em"><b>Teacher Course<br>Search</b></button>
        </a>

        <a href="5.html" target="_top">
          <button type="button" class="btn btn-lg btn-block btn-warning" style="font-size: 1em"><b>Classroom <br>Inquiry</b></button>
        </a>
        </div>
        
      <div class="col-md-10">
      <div class="col-md-4">
      </div>
      <form action="automatic1.php" method="post">
      <button type="submit" class="btn btn-lg btn-danger" style="font-size: 3em;position: relative; bottom: -150px;">Start</button>
      </form>
      </div>
      
    
    </div>
    </div>
  </body>

<?php

     session_start();
if($_SESSION['user_name']=="")
{
  echo "<script> alert('Please login first!'); window.location.href='../Login.php'; </script>";
  exit(0);
}

if($_SESSION['user_type']!=1)
{
  echo "<script>alert('You do not have the right!'); window.location.href='main.html'; </script>";
  exit(0);
}
      

      $con = mysql_connect("218.244.137.223","ddpse","zjuddpse2014");
      if(!$con)
      {
          die('Could not connect: ' . mysql_error());
      }
      
      mysql_select_db("SEproject", $con);

      mysql_query("delete from acaArrange;");
      
      $a4=14001;
      $b4=1;
      $c41=array(0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0);
      $c42=array(0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0);

      $a6=16001; 
      $b6=1;
      $c61=array(0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0);
      $c62=array(0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0);
 
      $a3=13001; 
      $b3=1;
      $c31=array(0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0);
      $c32=array(0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0,  0,0,0,0,0);

      $pa=20001; 
      $pb=11;
 
      $ea=50001;
      $eb=6;
      $ec1=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
      $ec2=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 

      $cma=40001;
      $cmb=21;
      $cmc1=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
      $cmc2=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 
      $ela=30001;
      $elb=16;
      $elc1=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
      $elc2=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

      $room_time=array(0,  2,3,3,2,3,  2,3,3,2,3,  2,3,3,2,3,  2,3,3,2,3,  2,3,3,2,3);

      $result = mysql_query("SELECT * FROM Re_imsCourse_acaClass_imsTeacher;");
      //echo $result;
      while($row = mysql_fetch_array($result))
      {
      	  //echo $row;
          $course_id=$row['cuz_id']; 
          $classID=$row['class_id'];
          $teacher_id=$row['teac_id'];
          $classCap=$row['class_cap'];
          
          $course_type=floor($course_id/10000);
          //echo $course_type;

          switch($course_type){
          	case '4':arrange_pe($course_id,$classID,$teacher_id,$classCap);break;
          	case '3':arrange_eng($course_id,$classID,$teacher_id,$classCap);break;
          	case '5':arrange_cmp($course_id,$classID,$teacher_id,$classCap);break;
          	case '6':arrange_elc($course_id,$classID,$teacher_id,$classCap);break;
          	default:arrange_com($course_id,$classID,$teacher_id,$classCap);break;
          }

      }
         mysql_close($con);


       function arrange_com($course_id,$classID,$teacher_id,$classCap){
       	global $a4,$b4,$a6,$b6,$a3,$b3,$c41,$c42,$c61,$c62,$c31,$c32,$con,$room_time; 
      	
      	$time = mysql_query("SELECT cuz_theoryHour FROM imsCourse where cuz_id= $course_id ;");
      	$row_time = mysql_fetch_array($time);
      	$time1=$row_time['cuz_theoryHour'];

      	if($classCap<40){

      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
               
                while(($c41[$b4]==1)||($room_time[$b4]<$time2)){
                	$b4++;
                	if($b4>25){
                		$b4=1;
                		$a4++;
                		for($i=1;$i<=25;$i++){
                			$c41[$i]=$c42[$i];
                			$c42[$i]=0;
                		}
                	}
                }

                $c41[$b4]=1;
                
                $sql="INSERT INTO acaArrange VALUES ($classID,$a4,$b4,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }               

                if($time3!=0){
                	$x=$b4+10;
                	if($x>25){
                		$x=$x-25;
                	}
                	$c42[$x]=1;

                	$sql="INSERT INTO acaArrange VALUES ($classID,$a4+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con)){
                     die('Error: ' . mysql_error());
                   }
                }

            }
        }
      	else if($classCap<60){
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c61[$b6]==1)||($room_time[$b6]<$time2)){
                	$b6++;
                	if($b6>25){
                		$b6=1;
                		$a6++;
                		for($i=1;$i<=25;$i++){
                			$c61[$i]=$c62[$i];
                			$c62[$i]=0;
                		}
                	}
                }
                $c61[$b6]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a6,$b6,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b6+10;
                	if($x>25)
                		$x=$x-25;
                	$c62[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a6+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
      	}
      	else{
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c31[$b3]==1)||($room_time[$b3]<$time2)){
                	$b3++;
                	if($b3>25){
                		$b3=1;
                		$a3++;
                		for($i=1;$i<=25;$i++){
                			$c31[$i]=$c32[$i];
                			$c32[$i]=0;
                		}
                	}
                }
                $c31[$b3]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a3,$b3,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b3+10;
                	if($x>25)
                		$x=$x-25;
                	$c32[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a3+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
      	}
      }

            function arrange_pe($course_id,$classID,$teacher_id,$classCap){
            	global $pa,$pb,$con,$room_time; 
            	$time = mysql_query("SELECT cuz_experimentalHour FROM imsCourse where cuz_id= $course_id ;");
            	$row_time = mysql_fetch_array($time);
      	        $time1=$row_time['cuz_experimentalHour'];
                //echo $time1;
            	$sql="INSERT INTO acaArrange VALUES ($classID,$pa,$pb,$teacher_id,$time1);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                   $pb++;
                   if($pb>25){
                   	$pb=1;
                   	$pa++;
                   }
      }

 function arrange_eng($course_id,$classID,$teacher_id,$classCap){
 	    global $ea,$eb,$ec1,$ec2,$con,$room_time; 

      	$time = mysql_query("SELECT cuz_theoryHour FROM imsCourse where cuz_id= $course_id ;");
      	$row_time = mysql_fetch_array($time);
      	$time1=$row_time['cuz_theoryHour'];
        //echo "      ";
        //echo $time1;
        //echo "      ";
      	      	$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
      			//echo $time2;
      			//echo "      ";
      			//echo $time3;
      			//echo "      ";
      			//echo $time1;
                //echo "      ";
                
                //echo $ec1[$eb];
                //echo "      ";

                //echo $room_time[$eb];
                //echo "      ";

                //echo $eb;
                //echo "      ";


                while(($ec1[$eb]==1)||($room_time[$eb]<$time2)){
                	$eb++;
                	if($eb>25){
                		$eb=1;
                		$ea=$ea+2;
                		for($i=1;$i<=25;$i++){
                			$ec1[$i]=0;
                			$ec2[$i]=0;
                		}
                	}
                }
                $ec1[$eb]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$ea,$eb,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }

                if($time3!=0){
                	$x=$eb+12;
                	if($x>25)
                		$x=$x-25;
                	$ec2[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$ea+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
    }

    function arrange_cmp($course_id,$classID,$teacher_id,$classCap){
    	global $a4,$b4,$a6,$b6,$a3,$b3,$c41,$c42,$c61,$c62,$c31,$c32,$cma,$cmb,$cmc1,$cmc2,$con,$room_time; 
    	$time = mysql_query("SELECT cuz_theoryHour FROM imsCourse where cuz_id= $course_id ;");
    	$row_time = mysql_fetch_array($time);
      	$time1=$row_time['cuz_theoryHour'];
    	
    	if($classCap<40){
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c41[$b4]==1)||($room_time[$b4]<$time2)){
                	$b4++;
                	if($b4>20){
                		$b4=1;
                		$a4++;
                		for($i=1;$i<=25;$i++){
                			$c41[$i]=$c42[$i];
                			$c42[$i]=0;
                		}
                	}
                }
                $c41[$b4]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a4,$b4,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b4+10;
                	if($x>20)
                		$x=$x-20;
                	$c42[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a4+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
        }
      	else if($classCap<60){
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c61[$b6]==1)||($room_time[$b6]<$time2)){
                	$b6++;
                	if($b6>20){
                		$b6=1;
                		$a6++;
                		for($i=1;$i<=25;$i++){
                			$c61[$i]=$c62[$i];
                			$c62[$i]=0;
                		}
                	}
                }
                $c61[$b6]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a6,$b6,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b6+10;
                	if($x>20)
                		$x=$x-20;
                	$c62[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a6+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
      	}
      	else{
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c31[$b3]==1)||($room_time[$b3]<$time2)){
                	$b3++;
                	if($b3>20){
                		$b3=1;
                		$a3++;
                		for($i=1;$i<=25;$i++){
                			$c31[$i]=$c32[$i];
                			$c32[$i]=0;
                		}
                	}
                }
                $c31[$b3]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a3,$b3,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b3+10;
                	if($x>20)
                		$x=$x-20;
                	$c32[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a3+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
      	}

    	$time0 = mysql_query("SELECT cuz_experimentalHour FROM imsCourse where cuz_id= $course_id ;");
    	$row_time = mysql_fetch_array($time0);
      	$time4=$row_time['cuz_experimentalHour'];    

      			$time5=$time4%10;
      			$time4=floor($time4/10);

                while(($cmc1[$cmb]==1)||($room_time[$cmb]<$time5)){
                	$cmb++;
                	if($cmb>25){
                		$cmb=21;
                		$cma++;
                		for($i=1;$i<=25;$i++){
                			$cmc1[$i]=$cmc2[$i];
                			$cmc2[$i]=0;
                		}
                	}
                }
                $cmc1[$cmb]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$cma,$cmb,$teacher_id,$time5);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
        
    }

  function arrange_elc($course_id,$classID,$teacher_id,$classCap){
  	    global $a4,$b4,$a6,$b6,$a3,$b3,$c41,$c42,$c61,$c62,$c31,$c32,$ela,$elb,$elc1,$elc2,$con,$room_time; 
    	$time = mysql_query("SELECT cuz_theoryHour FROM imsCourse where cuz_id= $course_id ;");
    	$row_time = mysql_fetch_array($time);
      	$time1=$row_time['cuz_theoryHour'];
      	//echo $time1;
    	if($classCap<40){
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c41[$b4]==1)||($room_time[$b4]<$time2)){
                	$b4++;
                	if($b4>15){
                		$b4=1;
                		$a4++;
                		for($i=1;$i<=25;$i++){
                			$c41[$i]=$c42[$i];
                			$c42[$i]=0;
                		}
                	}
                }
                $c41[$b4]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a4,$b4,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b4+10;
                	if($x>15)
                		$x=$x-15;
                	$c42[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a4+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
        }
      	else if($classCap<60){
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c61[$b6]==1)||($room_time[$b6]<$time2)){
                	$b6++;
                	if($b6>15){
                		$b6=1;
                		$a6++;
                		for($i=1;$i<=25;$i++){
                			$c61[$i]=$c62[$i];
                			$c62[$i]=0;
                		}
                	}
                }
                $c61[$b6]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a6,$b6,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b6+10;
                	if($x>15)
                		$x=$x-15;
                	$c62[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a6+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
      	}
      	else{
      		while($time1!=0){
      			$time2=$time1%10;
      			$time1=floor($time1/10);
      			$time3=$time1%10;
      			$time1=floor($time1/10);
                while(($c31[$b3]==1)||($room_time[$b3]<$time2)){
                	$b3++;
                	if($b3>15){
                		$b3=1;
                		$a3++;
                		for($i=1;$i<=25;$i++){
                			$c31[$i]=$c32[$i];
                			$c32[$i]=0;
                		}
                	}
                }
                $c31[$b3]=1;
                $sql="INSERT INTO acaArrange VALUES ($classID,$a3,$b3,$teacher_id,$time2);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                if($time3!=0){
                	$x=$b3+10;
                	if($x>15)
                		$x=$x-15;
                	$c32[$x]=1;
                	$sql="INSERT INTO acaArrange VALUES ($classID,$a3+1,$x,$teacher_id,$time3);";
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }
                }
            }
      	}

    	$time0 = mysql_query("SELECT cuz_experimentalHour FROM imsCourse where cuz_id= $course_id ;");
    	$row_time = mysql_fetch_array($time0);
      	$time4=$row_time['cuz_experimentalHour'];    	
      			$time5=$time4%10;
                //echo $time5;
      			//echo "  ";
      			//echo $elb;
      			//echo $elc1[$elb];
                while(($elc1[$elb]==1)||($room_time[$elb]<$time5)){
                	$elb++;
                	if($elb>25){
                		$elb=16;
                		$ela++;
                		for($i=1;$i<=25;$i++){
                			$elc1[$i]=$elc2[$i];
                			$elc2[$i]=0;
                		}
                	}
                }
                $elc1[$elb]=1;

                $sql="INSERT INTO acaArrange VALUES ($classID,$ela,$elb,$teacher_id,$time5);";
                //echo $sql;
                   if (!mysql_query($sql,$con))
                   {
                     die('Error: ' . mysql_error());
                   }

    }
echo "<script>alert('Automatic course arrangement has succeeded!')</script>";
?>