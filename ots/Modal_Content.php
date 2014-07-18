<?php 
include 'linkdb.php';
LIDB();

if ($_GET['Step']=="Add_Stage1")
{
//$_COOKIE['Add_Question_Step']="Stage1";
$display_block =<<<END_OF_TEXT
<form class="form-horizontal" method="post" action="Addquestion.php?Step=Stage1">
<fieldset>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">x</button>
<h3>Create new question</h3>
</div>
<div class="modal-body">
							<legend>Add Question</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Question description</label>
							  <div class="controls">
								<textarea name="Question_Content"></textarea>
							  </div>
							</div>
               <div class="control-group">
								<label class="control-label" for="selectError3">Select Question Class</label>
								<div class="controls">
								  <select id="selectError3" name="add_question_class_selection">
									<option value="Math">Math</option>
									<option value="English">English</option>  
									<option value="Computer">Computer</option>
									<option value="Chemistry">Chemistry</option>
									<option value="Art">Art</option>
								  </select>
								</div>
							</div>
               <div class="control-group">
								<label class="control-label" for="selectError3">Select Question Type</label>
								<div class="controls">
								  <select id="selectError3" name="add_question_type_selection">
									<option value="Choice_qes">Choice Question</option>
									<option value="Judgement_qes">Judgment Question</option>
								  </select>
								</div>
							</div>
</div>
<div class="modal-footer">
<a href="#" class="btn" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-primary">Next Step</button>
</div>
</div>
</fieldset>
</form>
END_OF_TEXT;
echo $display_block;
}
elseif ($_GET['Step']=="Add_Stage2")
{      
if ($_GET['Type']=="Choice_qes")
{
$Qes_ID=$_GET['QesID'];
$display_block .=<<<END_OF_TEXT
<form class="form-horizontal" method="post" action="Addquestion.php?Step=Stage2&Type=A&QesID=$Qes_ID">
<fieldset>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">x</button>
<h3>Create new question</h3>
</div>
<div class="modal-body">
							<legend>Add Question Choice</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Edit Option A:</label>
							  <div class="controls">
								<textarea name="Add_Choice_Question_OptionA"></textarea>
							  </div>
							</div>
              <div class="control-group">
							  <label class="control-label" for="textarea2">Edit Option B:</label>
							  <div class="controls">
								<textarea name="Add_Choice_Question_OptionB"></textarea>
							  </div>
							</div>
              <div class="control-group">
							  <label class="control-label" for="textarea2">Edit Option C:</label>
							  <div class="controls">
								<textarea name="Add_Choice_Question_OptionC"></textarea>
							  </div>
							</div>
              <div class="control-group">
							  <label class="control-label" for="textarea2">Edit Option D:</label>
							  <div class="controls">
								<textarea name="Add_Choice_Question_OptionD"></textarea>
							  </div>
							</div>
              <div class="control-group">
								<label class="control-label" for="selectError3">Select Question Answer</label>
								<div class="controls">
								  <select id="selectError3" name="Add_Choice_Question_Answer">
									<option value="A">A</option>
									<option value="B">B</option>  
									<option value="C">C</option>    
									<option value="D">D</option>
								  </select>
								</div>
							</div>
</div>
<div class="modal-footer">
<a href="#" class="btn" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</div>
</fieldset>
</form> 
END_OF_TEXT;
}
else
{
$Qes_ID=$_GET['QesID'];
$display_block .=<<<END_OF_TEXT
<form class="form-horizontal" method="post" action="Addquestion.php?Step=Stage2&Type=B&QesID=$Qes_ID">
<fieldset>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">x</button>
<h3>Create new question</h3>
</div>
<div class="modal-body">
							<legend>Add Question Choice</legend>
              <div class="control-group">
								<label class="control-label" for="selectError3">Select Question Answer</label>
								<div class="controls">
								  <select id="selectError3" name="Add_Judgment_Question_Answer">
									<option value="TRUE">TRUE</option>
									<option value="FALSE">FALSE</option>
								  </select>
								</div>
							</div>
</div>
<div class="modal-footer">
<a href="#" class="btn" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</div>
</fieldset>
</form> 
END_OF_TEXT;
}
echo $display_block;
} 
elseif ($_GET['Step']=="View_qes_detail")
{ 
$Qes_ID=$_GET['QesID'];
$get_question_sql = " SELECT ots_QuestionID, ots_Content, ots_Type, ots_Class
FROM otsquestion
WHERE ots_QuestionID=$Qes_ID";
$get_question_res = mysqli_query($mysqli, $get_question_sql)	
				  or	die(mysqli_error($mysqli));    
while ($question_info = mysqli_fetch_array($get_question_res))
		{
			$question_id = $question_info['ots_QuestionID']; 
      		$question_content = $question_info['ots_Content'];
			$question_type = $question_info['ots_Type'];
			$question_class = $question_info['ots_Class'];
$display_block=<<<eof
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">x</button>
<h3>Create new question</h3>
</div>
      <div class="modal-body">
      Question ID:$question_id</br>
      Question Content:$question_content</br>
      Question Type:$question_type</br>
      Question Class:$question_class</br>
eof;
if ($question_type=="C")
{
$get_question_sql = " SELECT ots_QuestionID, optionA, optionB, optionC, optionD, answer
FROM otsquestion_option
WHERE ots_QuestionID=$Qes_ID";
$get_question_res = mysqli_query($mysqli, $get_question_sql)	
				  or	die(mysqli_error($mysqli));    
while ($question_info = mysqli_fetch_array($get_question_res))
{
			$question_id = $question_info['ots_QuestionID']; 
      		$question_optionA = $question_info['optionA'];
			$question_optionB = $question_info['optionB'];
			$question_optionC = $question_info['optionC'];
			$question_optionD = $question_info['optionD'];
			$question_answer = $question_info['answer'];
$display_block.=<<<eof
      OptionA:$question_optionA</br>
      OptionB:$question_optionB</br>
      OptionC:$question_optionC</br>
      OptionD:$question_optionD</br>
      Answer:$question_answer</br>
      </div>
      <div class="modal-footer">
      <a href="#" class="btn" data-dismiss="modal">Close</a>
      </div>
eof;
}
}
else
{
$get_question_sql = " SELECT ots_QuestionID, answer
FROM otsquestion_option
WHERE ots_QuestionID=$Qes_ID";
$get_question_res = mysqli_query($mysqli, $get_question_sql)	
				  or	die(mysqli_error($mysqli));    
while ($question_info = mysqli_fetch_array($get_question_res))
{
$question_id = $question_info['ots_QuestionID']; 
$question_answer = $question_info['answer'];
$display_block.=<<<eof
       Answer:$question_answer</br>
      </div>
      <div class="modal-footer">
      <a href="#" class="btn" data-dismiss="modal">Close</a>
      </div>
eof;
}
}
echo $display_block;  
}
}
?>