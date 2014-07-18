<?php
  session_start();
  $ID=$_SESSION["ID"];
   $testid=$_SESSION['TID'];
  
 if($_SESSION['ID']=="")
{
  echo "<script> alert('Please login first'); window.location.href='login.html'; </script>";
}
if($_SESSION['TID']=="")
{

  echo "<script> alert('Please choose test'); window.location.href='oltest.php'; </script>";
}
//echo $_SESSION['TID'];

require_once("conn.php");	
$result=mysql_query("SELECT *
					FROM otstaketest WHERE otstaketest.ots_PaperID=testid AND ots_StudentID=$ID" );
if($result)
{
		     echo "<script> alert('You have take that test'); window.location.href='oltest.php'; </script>";
}



$result=mysql_query("SELECT *
					FROM otspaper_question,otsquestion,otsquestion_option WHERE 
					otsquestion.ots_QuestionID=otspaper_question.ots_QuestionID  
					AND  otspaper_question.ots_PaperID=$testid 
					AND otsquestion_option.ots_QuestionID=otspaper_question.ots_QuestionID  " );
$row = mysql_fetch_array($result);
$num=0;
$correct=0;
while($row)
{
 $num++;
 $ans=$_GET["Q$num"];
 if($ans==$row['answer'])
 {
   $correct++;
 }
 $row = mysql_fetch_array($result);
}
$score=($correct/$num)*100;                       //ตรทึ

$result=mysql_query("Insert otstaketest value($ID,$testid,$score)");
 echo "<script> alert('Your have submit, your score is $score'); window.location.href='oltest.php'; </script>";
?>



