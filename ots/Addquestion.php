<?php
include 'linkdb.php';
LIDB();
if ($_GET['Step']=="Stage1")
{
$ins_sql_question= "
INSERT INTO otsquestion(ots_Content,ots_Type,ots_Class) VALUES('".$_POST['Question_Content']."','".$_POST['add_question_type_selection']."','".$_POST['add_question_class_selection']."');";
$get_add_res = mysqli_query($mysqli, $ins_sql_question)	or	die(mysqli_error($mysqli));
if ($get_add_res == true)
{                                                                                      
  $get_ins_id = mysqli_query($mysqli, "SELECT LAST_INSERT_ID();")	or	die(mysqli_error($mysqli));
  $ins_info = mysqli_fetch_array($get_ins_id); 
  $ins_id=$ins_info['LAST_INSERT_ID()'];
  header("Location: qbank.php?Step=Add_Stage2&QesID=".$ins_id."&Type=".$_POST['add_question_type_selection']);
}
}
elseif ($_GET['Step']=="Stage2")
{ 
if ($_GET['Type']=="A")
{
$ins_sql_question= "
INSERT INTO otsquestion_option(ots_QuestionID,optionA,optionB,optionC,optionD,answer)
 VALUES('".$_GET['QesID']."','".$_POST['Add_Choice_Question_OptionA']."','".$_POST['Add_Choice_Question_OptionB']."','".$_POST['Add_Choice_Question_OptionC']."','".$_POST['Add_Choice_Question_OptionD']."','".$_POST['Add_Choice_Question_Answer']."');";
$get_add_res = mysqli_query($mysqli, $ins_sql_question)	or	die(mysqli_error($mysqli));
if ($get_add_res == true)
{
  header("Location: qbank.php");        
}
}
elseif ($_GET['Type']=="B")
{
$ins_sql_question= "
INSERT INTO otsquestion_option(ots_QuestionID,answer) VALUES('".$_GET['QesID']."','".$_POST['Add_Judgment_Question_Answer']."');";
$get_add_res = mysqli_query($mysqli, $ins_sql_question)	or	die(mysqli_error($mysqli));
if ($get_add_res == true)
{
  header("Location: qbank.php");        
}
}  
}
?>