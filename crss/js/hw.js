var hw_info=null;
var user_info=null;
var count=0;

uploader={
url: './upload_homework.php',
dataType: 'json',
allowedTypes: '*',
extraData:{},
onBeforeUpload: function(id){
  $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
},
onNewFile: function(id, file){
	  if (count==0)
	  {
		$.danidemo.addFile('#demo-files', id, file);
	  }
  count++;
},
onUploadProgress: function(id, percent){
  var percentStr = percent + '%';

  $.danidemo.updateFileProgress(id, percentStr);
},
onUploadSuccess: function(id, data){
  $.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

  $.danidemo.updateFileProgress(id, '100%');
},
onUploadError: function(id, message){
  $.danidemo.updateFileStatus(id, 'error', message);
}
};

$(document).ready(function(){
	updateCourse();
	$('#assign-submit').click(function(){
		obj={
			query: 'assign',
			cuz_id: $('#cuzid').attr('value'),
			title: $('#hwtitle').val(),
			deadline: $('#hwdeadline').val(),
			require: $('#hwrequirement').val()
		};
		$.getJSON("getHomework.php",obj,function(){
		});
		$('#assignNew').modal('toggle');
	});
}); 

function updateCourse(){
	obj={
		query: "init",
	};
	$.getJSON("getHomework.php",obj,function(data){
		tt="";
		user_info=data.user_info;
		if(user_info.type=='teacher')
		{
			$('head title').html('Check homework');
			$('#page-title').html(' <h1>Check homework or <br>Assign new homework</h1> <p>You may check the homework submitted by students, or assign a new one. To start, click one of your courses on the left!</p> ');
		}
		else if(user_info.type=='student')
		{
			$('head title').html('My Homework');
			$('#page-title').html(' <h1>View my homework</h1> <p>You may view and submit your homework in this page. To start, click one of your courses on the left!</p> ');
		}
		if(data.course_info!=null)
		{
			$.each(data.course_info,function(v,k){
				tt+='<li><a href="#" class="list-group-item" cuz_id='+k.id+'><span class="badge">'+k.count+'</span><b>'+k.name+'</b></a></li>';
				});
			$('#course-bar').html(tt);
			$('.list-group-item').click(function(){
				$('.page-header').html('#'+$(this).attr('cuz_id')+" "+$(this).children('b').html());

				getHwinfo($(this).attr('cuz_id'));
				$('#page-title').hide();
				$('#cuzid').attr('value',$(this).attr('cuz_id'));
			});
		}
	});
}

function getHwinfo(course_id){
	obj={
		query: "homespec",
       		cuz_id: course_id
	};
	$.getJSON("getHomework.php",obj,function(data){
		tt="";
		if(data!=null)
		{
			hw_info=data;
			if(user_info.type=='student')
			{
				tt+='<div class="row placeholders">';
				$.each(data,function(v,k){
					tt+='<div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="info-btn btn btn-default btn-lg" data-toggle="modal" data-target="#hwinfo-model" hw_id='+ k.id +'> <span class="glyphicon glyphicon-folder-open"></span> </button><h4>'+ k.title +'</h4> <span class="text-muted">Deadline:'+ k.deadline +'<br><a class="submit-link" data-toggle="modal" data-target="#submit-model" href="#" deadline='+k.deadline+' hw_id='+ k.id +'>Submit</a> </span> </div> ';
				});
				tt+='</div>';
				$('#homework-list').html(tt);
				$('.info-btn').click(function(){
					displayHwinfo($(this).attr('hw_id'));
				});
				$('.submit-link').click(function(){
					deadline=new Date($(this).attr('deadline').replace("-", "/").replace("-", "/"));
					now=new Date();
					if(now<deadline)
					{
						count=0;
						uploader.extraData.hw_id=$(this).attr('hw_id');
						$('#drag-and-drop-zone').html(' <div class="panel-body demo-panel-files" id="demo-files"> <span class="demo-note">No Files have been selected/droped yet...</span> </div> <div class="browser"> <label> <span>Click to open the file Browser</span> <input type="file" name="files[]" multiple="multiple" title="Click to add Files"> </label> </div> ');
						$('#drag-and-drop-zone').dmUploader(uploader);
					}
					else
					{
						count=1;
						$('#drag-and-drop-zone').html("You can't submit after the deadline");
					}
				});
			}
			if(user_info.type=='teacher')
			{
				tt='<ul class="nav nav-tabs" id="homework-tab"><li class="active"><a href="#home" data-toggle="tab">Homework</a></li></ul>';
				tt+='<div class="tab-content" id="homework-content"><div class="tab-pane active fade in" id="home"><div class="row placeholders"><p>';
				$.each(data,function(v,k){
					tt+='<div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="info-btn btn btn-default btn-lg" data-toggle="modal" data-target="#hwinfo-model" hw_id='+ k.id +'> <span class="glyphicon glyphicon-folder-open"></span> </button><h4>'+ k.title +'</h4> <span class="text-muted">Deadline:'+ k.deadline +'<br><a class="list-link" href="javascript:void(0)" hw_title="'+k.title+'" hw_id='+ k.id +'>Check</a> </span> </div> ';
				});
				tt+=' <div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#assignNew"> <span class="glyphicon glyphicon-plus"></span> </button>		  <h4>New Assignment</h4> <span class="text-muted">Create a new assignment.</span> </div>		';
				tt+='</p></div></div></div>';
				$('#homework-list').html(tt);
				$('.info-btn').click(function(){
					displayHwinfo($(this).attr('hw_id'));
				});
				$('.list-link').click(function(){
					listStu($(this).attr('hw_id'),$(this).attr('hw_title'));
			        });
			}
		}
		else
		{
			hw_info=null;
			if(user_info.type=='student')
				tt=' <div class="row placeholders"><div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-inbox"></span> </button> <h4>Opps! No homework in this course yet.</h4> <span class="text-muted">Congratulations!</span> </div></div>';
			if(user_info.type=='teacher')
				tt+=' <div class="row placeholders"><div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#assignNew"> <span class="glyphicon glyphicon-plus"></span> </button>		  <h4>New Assignment</h4> <span class="text-muted">Create a new assignment.</span> </div></div>		';
			$('#homework-list').html(tt);
		}

	});
}

function listStu(homework_id,homework_title){
	txt=' <div class="table-responsive"> <table class="table table-striped"> <thead> <tr> <th>Student ID</th> <th>Student Name</th> <th>Hand in or not?</th> <th>Download</th> </tr> </thead> <tbody> ';
	obj={
		query: 'stulist',
		hw_id: homework_id
	};
	$.getJSON("getHomework.php",obj,function(data){
		$.each(data,function(v,k){
			txt+='<tr><td>'+k.id+'</td><td>'+k.name+'</td><td><span class="glyphicon ';
			if(k.submit)
				txt+='glyphicon-ok"></span></td><td><a href="download_homework.php?file_id='+k.file_id+'"><span class="glyphicon glyphicon-save"></span></a></td></tr>';
			else
				txt+='glyphicon-remove"></span></td><td><span class="glyphicon glyphicon-save"></span></td></tr>';
		});
		txt+='</tbody></table></div>';

		if($('#hw-'+homework_id).size()==0)
		{
			tt='<li><a href="#hw-'+homework_id+'" data-toggle="tab"><button type="button" class="close" aria-hiden="true">&times;</button>'+homework_title+'</a></li>';
			$('#homework-tab').append(tt);
			tt=' <div class="tab-pane fade" id="hw-'+homework_id+'"> ';
			tt+=txt;
			tt+='</div>';
			$('#homework-content').append(tt);
			$('[href="#hw-'+homework_id+'"] .close').click(function(){
				$(this).parent().parent().remove();
				$('#hw-'+ homework_id).remove();
			});
			$('#homework-tab a:last').tab('show');
		}
	});

}

function displayHwinfo(homework_id){
	$.each(hw_info,function(v,k){
		if(k.id==homework_id)
		{
			req="";
			if(k.requirement!=null)
				req=k.requirement;
			$('#hwinfo-model #HwinfoLabel').html(k.title);
			tt=' <dt>Assign date: </dt> <dd class="text-left">'+ k.assigndate +'</dd> <dt>Deadline: </dt> <dd class="text-left">'+ k.deadline +'</dd> <dt>Requirement: </dt> <dd class="text-left">'+ req +'</dd> </dl> ';
			$('#hwinfo-model dl').html(tt);
		}
	});
}
