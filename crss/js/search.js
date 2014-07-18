var re_info=null;
var user_info=null;
var count=0;

$(document).ready(function(){
	$('#search-result').hide();
	$('#search-start').click(function(){
		searchresource();
	});
}); 

function searchresource(){
	keyword=$('#search-keyword').val();
	obj={
		query:"search",
		searchkeyword:keyword,
	};
	$('#search-input').hide();
	$('#search-result').show();
	$.getJSON("search.php",obj,function(data){
		tt="";
		tm="";
		if(data.course_info!=null){
			$.each(data.course_info,function(v,k){
				if(k.reso_level=="public"){
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
			});
		}
		else
		{
			tt+='<div class="col-xs-6 col-sm-3 placeholder"> <button type="button" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-inbox"></span> </button> <h4>Opps! No resource in this course yet.</h4> <span class="text-muted">Congratulations!</span> </div>';
		}
									alert();
		$('#result-list').html(tt);
		$('#modal-container').html(tm);
	});
}