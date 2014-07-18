<?php
include 'linkdb.php';
LIDB();
if ($_GET['Way']=="HC_Add")
{
if ($_GET['PaperID']=="0")
{
$ins_sql_question= "INSERT INTO otspaper(ots_Title) VALUES('');";
$get_add_res = mysqli_query($mysqli, $ins_sql_question)	or	die(mysqli_error($mysqli));
if ($get_add_res == true)
{                                                                                      
  $get_ins_id = mysqli_query($mysqli, "SELECT LAST_INSERT_ID();")	or	die(mysqli_error($mysqli));
  $ins_info = mysqli_fetch_array($get_ins_id); 
  $ins_id=$ins_info['LAST_INSERT_ID()'];
  $ins_sql_question= "
  INSERT INTO otspaper_question(ots_PaperID,ots_QuestionID) VALUES('".$ins_id."','".$_POST['add_id']."');";  
  $get_res = mysqli_query($mysqli, $ins_sql_question)	or	die(mysqli_error($mysqli));
  header("Location: pgeneration.php?Step=HC_Paper&PaperID=".$ins_id);
}
}
else
{
if ($_GET['Status']=="over")
{
$PaperID=$_GET['PaperID'];
$ins_sql_question= "UPDATE otspaper SET ots_Title='".$_POST['paper_title']."' WHERE ots_PaperID=$PaperID;";
$get_add_res = mysqli_query($mysqli, $ins_sql_question)or	die(mysqli_error($mysqli));
if ($get_add_res == true)
{   
  header("Location: pgeneration.php");                                               
}
}
else
{
$PaperID=$_GET['PaperID'];
$ins_sql_question= "
  INSERT INTO otspaper_question(ots_PaperID,ots_QuestionID) VALUES('".$PaperID."','".$_POST['add_id']."');";  
$get_res = mysqli_query($mysqli, $ins_sql_question)or	die(mysqli_error($mysqli));
header("Location: pgeneration.php?Step=HC_Paper&PaperID=".$PaperID);                                             
}
}
}
elseif ($_GET['Way']="AC_Add")
{
$ins_sql_question="INSERT INTO otspaper(ots_Title) VALUES('".$_POST['paper_title']."');";
$get_add_res = mysqli_query($mysqli, $ins_sql_question)	or	die(mysqli_error($mysqli));                                                                  
$get_ins_id = mysqli_query($mysqli, "SELECT LAST_INSERT_ID();")	or	die(mysqli_error($mysqli));
$ins_info = mysqli_fetch_array($get_ins_id); 
$ins_id=$ins_info['LAST_INSERT_ID()'];
for ($i=1;$i<=$_POST['qes_number'];$i++)
{ 
$ins_sql_question="
INSERT INTO otspaper_question(ots_PaperID,ots_QuestionID) VALUES('".$ins_id."','".$i."');"; 
$get_res = mysqli_query($mysqli, $ins_sql_question)	or	die(mysqli_error($mysqli));      
}                                                                                           
header("Location: pgeneration.php");
}
?>