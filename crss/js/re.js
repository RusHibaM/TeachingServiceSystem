var re_info=null;
var user_info=null;
var count=0;

uploader={
url: './upload_resource.php',
dataType: 'json',
allowedTypes: '*',
extraData:{},
onBeforeUpload: function(id){
  $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
},
onNewFile: function(id, file){
  $.danidemo.addFile('#demo-files', id, file);
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
	updateMyfile();
}); 

function updateMyfile(){
	obj={
		query: "initmyfile",
	};
	$.getJSON("getResource.php",obj,function(data){
		$('#myfilenumber').text(data.myfilenumber);
		$('#myfile').click(function(){
			getMyfileInfo();
		});
	});
}

function updateCourse(){
	obj={
		query: "init",
	};
	$.getJSON("getResource.php",obj,function(data){
		tn="";
		user_info=data.user_info;
		myfilenumber=data.myfile;
		if(data.course_info!=null)
		{
			$.each(data.course_info,function(v,k){
				tn+='<li><a href="#" class="list-group-item course_selector" cuz_id='+k.id+'><span class="badge">'+k.count+'</span><b>'+k.name+'</b></a></li>';
				});
			$('#course-bar').html(tn);
			$('.course_selector').click(function(){
				getREinfo($(this).attr('cuz_id'));
			});
		}
	});
}

function getMyfileInfo(){
	obj={
		query:"initmyfilespec",
	};
	$('.jumbotron').hide();
	$.getJSON("getResource.php",obj,function(data){
		tt="";
		tm="";
		user_info=data.user_info;
		myfile_info=data.myfile_info;
		if(data.myfile_info!=null){
			$.each(data.myfile_info,function(v,k){
				if(user_info.type==k.reso_uploadertype&&user_info.id==k.reso_uploader){
					//Uploaded by the user
					if(k.reso_famile=='book')
						tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-book"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
					else if(k.reso_famile=='video')
						tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-facetime-video"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
					else if(k.reso_famile=='picture')
						tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-picture"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
					else if(k.reso_famile=='stats')
						tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-stats"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
					else if(k.reso_famile=='compressed')
						tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-compressed"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
					else tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-file"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
					tm+='<div class="modal fade" id="model-'+k.reso_id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel">'+k.reso_name+'</h4></div><div class="modal-body "><dl class="dl-horizontal"><dt>Name: </dt><dd class="text-left"><form><input type="text" class="form-control" id="name-'+k.reso_id+'" placeholder="'+k.reso_name+'"></form><br></dd><dt>Authority: </dt><dd class="text-left"><form><input type="text" class="form-control" id="authority-'+k.reso_id+'" placeholder="'+k.reso_level+'"></form><br></dd><dt>Upload date: </dt><dd class="text-left"><form><input type="text" class="form-control" id="update_date-'+k.reso_id+'" placeholder="'+k.reso_update_date+'"></form><br></dd><dt>Illustration: </dt><dd class="text-left"><form><input type="text" class="form-control" id="illustration-'+k.reso_id+'" placeholder="'+k.reso_illustration+'"></form><br></dd><dt>Download: </dt><dd class="text-left downloadfile"><a href="./download_resource.php?reso_id='+k.reso_id+'">Click here.</a></dd><dt>Delete: </dt><dd class="text-left deletefile"><a href="./delete_resource.php?reso_id='+k.reso_id+'">Click here.</a></dd></dl></div><div class="modal-footer"><button type="button" class="btn btn-primary changefile-submit" reso_id="'+k.reso_id+'" id="changefile-submit-'+k.reso_id+'">Submit</button></div></div></div></div>';
				}
			});
		}
		else
		{
			re_info=null;
			tt+='<div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-inbox"></span> </button> <h4>Opps! No resource in this course yet.</h4> <span class="text-muted">Congratulations!</span> </div>';
		}

		$('#resource-list').html(tt);
		$('#modal-container').html(tm);


		$('.changefile-submit').click(function(){
			changefile($(this).attr('reso_id'));
		});


	});
}

function getREinfo(course_id){
	obj={
		query: "respec",
		cuz_id:course_id
	};
	uploader.extraData.cuz_id=course_id;
	$('.jumbotron').hide();
	$.getJSON("getResource.php",obj,function(data){
		tt="";
		tm="";
		user_info=data.user_info;
		if(data.course_info!=null){
			$.each(data.course_info,function(v,k){
				if(k.reso_level=="public"){
					if(user_info.type==k.reso_uploadertype&&user_info.id==k.reso_uploader){
						//Uploaded by the user
						if(k.reso_famile=='book')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-book"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='video')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-facetime-video"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='picture')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-picture"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='stats')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-stats"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='compressed')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-compressed"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-file"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						tm+='<div class="modal fade" id="model-'+k.reso_id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel">'+k.reso_name+'</h4></div><div class="modal-body "><dl class="dl-horizontal"><dt>Name: </dt><dd class="text-left"><form><input type="text" class="form-control" id="name-'+k.reso_id+'" placeholder="'+k.reso_name+'"></form><br></dd><dt>Authority: </dt><dd class="text-left"><form><input type="text" class="form-control" id="authority-'+k.reso_id+'" placeholder="'+k.reso_level+'"></form><br></dd><dt>Upload date: </dt><dd class="text-left"><form><input type="text" class="form-control" id="update_date-'+k.reso_id+'" placeholder="'+k.reso_update_date+'"></form><br></dd><dt>Illustration: </dt><dd class="text-left"><form><input type="text" class="form-control" id="illustration-'+k.reso_id+'" placeholder="'+k.reso_illustration+'"></form><br></dd><dt>Download: </dt><dd class="text-left downloadfile"><a href="./download_resource.php?reso_id='+k.reso_id+'">Click here.</a></dd><dt>Delete: </dt><dd class="text-left deletefile"><a href="./delete_resource.php?reso_id='+k.reso_id+'">Click here.</a></dd></dl></div><div class="modal-footer"><button type="button" class="btn btn-primary changefile-submit" reso_id="'+k.reso_id+'" id="changefile-submit-'+k.reso_id+'">Submit</button></div></div></div></div>';
					}
					else{
						if(k.reso_famile=='book')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-book"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='video')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-facetime-video"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='picture')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-picture"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='stats')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-stats"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='compressed')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-compressed"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-file"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						tm+='<div class="modal fade row placeholders" id="model-'+k.reso_id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="model-'+k.reso_id+'">'+k.reso_name+'</h4></div><div class="modal-body "><dl class="dl-horizontal"><dt>Upload date: </dt><dd class="text-left">'+k.reso_update_date+'</dd><dt>File type: </dt><dd class="text-left">'+k.reso_famile+'</dd><dt>Download: </dt><dd class="text-left"><a href="./download_resource.php?reso_id='+k.reso_id+'">Click here.</a></dd></dl></div></div></div></div><!--Modal-->';
					}
				}
				if(k.reso_level=="private"){
					if(user_info.type==k.reso_uploadertype&&user_info.id==k.reso_uploader){
						//Uploaded by the user
						if(k.reso_famile=='book')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-book"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='video')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-facetime-video"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='picture')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-picture"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='stats')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-stats"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else if(k.reso_famile=='compressed')
							tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-compressed"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						else tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model-'+k.reso_id+'"><span class="glyphicon glyphicon-file"></span></button><h4>'+k.reso_name+'</h4><span class="text-muted">'+k.reso_update_date+'<br><a data-toggle="modal" data-target="#model-'+k.reso_id+'" href="#"></a></span></div>';
						tm+='<div class="modal fade" id="model-'+k.reso_id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel">'+k.reso_name+'</h4></div><div class="modal-body "><dl class="dl-horizontal"><dt>Name: </dt><dd class="text-left"><form><input type="text" class="form-control" id="name-'+k.reso_id+'" placeholder="'+k.reso_name+'"></form><br></dd><dt>Authority: </dt><dd class="text-left"><form><input type="text" class="form-control" id="authority-'+k.reso_id+'" placeholder="'+k.reso_level+'"></form><br></dd><dt>Upload date: </dt><dd class="text-left"><form><input type="text" class="form-control" id="update_date-'+k.reso_id+'" placeholder="'+k.reso_update_date+'"></form><br></dd><dt>Illustration: </dt><dd class="text-left"><form><input type="text" class="form-control" id="illustration-'+k.reso_id+'" placeholder="'+k.reso_illustration+'"></form><br></dd><dt>Download: </dt><dd class="text-left downloadfile"><a href="./download_resource.php?reso_id='+k.reso_id+'">Click here.</a></dd><dt>Delete: </dt><dd class="text-left deletefile"><a href="./delete_resource.php?reso_id='+k.reso_id+'">Click here.</a></dd></dl></div><div class="modal-footer"><button type="button" class="btn btn-primary changefile-submit" reso_id="'+k.reso_id+'" id="changefile-submit-'+k.reso_id+'">Submit</button></div></div></div></div>';
					}
				}
			});
		}
		else
		{
			re_info=null;
			tt+='<div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-inbox"></span> </button> <h4>Opps! No resource in this course yet.</h4> <span class="text-muted">Congratulations!</span> </div>';
		}
		tt+='<div class="col-xs-6 col-sm-3 placeholder"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#upload-model"><span class="glyphicon glyphicon-upload"></span></button><h4>Upload Resource</h4><span class="text-muted"><br><a data-toggle="modal" data-target="#upload-model" href="#"></a></span></div>';
		$('#resource-list').html(tt);
		tm+='<div class="modal fade row placeholders" id="upload-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel">Upload</h4></div><div class="modal-body"><div id="drag-and-drop-zone" class="uploader"><div class="panel-body demo-panel-files" id="demo-files"><span class="demo-note">No Files have been selected/droped yet...</span></div><div class="browser"><label><span>Click to open the file Browser</span><input type="file" name="files[]" multiple="multiple" title="Click to add Files"></label></div></div></div></div></div></div>';
		$('#modal-container').html(tm);
		$('#drag-and-drop-zone').dmUploader(uploader);
		$('.changefile-submit').click(function(){
			changefile($(this).attr('reso_id'));
		});

	});
}

function changefile(reso_id){
	value='#name-'+reso_id+'';
	reso_name=$(''+value+'').val();
	value='#authority-'+reso_id+'';
	reso_authority=$(''+value+'').val();
	value='#update_date-'+reso_id+'';
	reso_update_date=$(''+value+'').val();
	value='#illustration-'+reso_id+'';
	reso_illustration=$(''+value+'').val();

	obj={
		query: "changeResource",
		id:reso_id,
		name:reso_name,
		authority:reso_authority,
		update_date:reso_update_date,
		illustration:reso_illustration
	}

	$.getJSON("changeResource.php",obj,function(data){
		if(data.request=="wronginput"){
			alert("Wrong input or an error happened.");
		}
		if(data.request=="done")
			alert("Updated successfully");
	});
}