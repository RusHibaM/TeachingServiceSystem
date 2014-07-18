$(document).ready(function(){

     Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
  	$.getJSON("php/analysis.php",
	        {cmd:"class"},
			function(data)
			{
			  var tt="";
				
			  $.ajaxSettings.async = false;
			  if(data.result="yes")
			   {
			    $.each(data.classid,function(v,k){//data have classid,classname,
				 tt+='<option class_id="'+data.classid[v]+'">'+data.classname[v]+'('+data.classid[v]+')'+'</option>';
				 });
			     $("#select").html(tt);
				 //$("#result").text(data.result);
			   }
			  else $("#result").text(data.result);
			//submit(data);
            //$.ajaxSettings.async = true;
		    }
		);
	
		
	 
});


function submit(classid)
{ //$.ajaxSettings.async = false;
      $("#chart").html();
	  $("#table").html();
	  $("#average").html();
     $.getJSON("php/analysis.php",
	 {cmd:"score",classid: classid},
	 function(data) //sid,name,score(these are array), term,coursename single;
	 { 
	  /*var j=0,tmp,index;
	  for(var i=0;i<data.count;i++)
	  { index=i;
	   for (j=i+1;j<data.count;j++)
	    if(data.score[index]<data.score[j])
           index=j;
	    tmp=data.score[i]; data.score[i]=data.score[index]; data.score[index]=tmp;
		tmp=data.sid[i];  data.sid[i]=data.sid[index]; data.sid[index]=tmp;
		tmp=data.name[i]; data.name[i]=data.name[index]; data.name[index]=tmp;
	  }*/
			
	 
	
	   table(data);
	   var distri=new Array(101);
	   var total=0;
	   var count=0;
	   $.each(distri,function(v,k){distri[v]=0});
	   $.each(data.sid,function(v,k){
	                    distri[data.score[v]]+=1;
						total+=data.score[v];
						count+=1;
	                   } 
	          );
	   $("#average").html("<h3>Average:"+data.average+"</h3>");
	   chartshow(distri,data.coursename,data.term);
	 }
	 // $.ajaxSettings.async = true;
	
	)
	 
	 
	 
}
   
 function table(data)
 {
   tt='<h2 class="text-center" contenteditable="true">Ranking Table</h2><table class="table table-hover" contenteditable="true"><thead><tr><th>Rank</th><th>ID</th><th>Name</th><th>Score</th></tr></thead><tbody>';
   $.each(data.sid,function(v,k){
                    if(data.score[v]<60)
                    tt+='<tr class="warning"><td>'+(v+1)+"</td><td>"+data.sid[v]+"</td><td>"+data.name[v]+"</td><td>"+data.score[v]+"</td></tr>";
				    else if(data.score[v]>=80)
					tt+='<tr class="success"><td>'+(v+1)+"</td><td>"+data.sid[v]+"</td><td>"+data.name[v]+"</td><td>"+data.score[v]+"</td></tr>";
					else
					tt+="<tr><td>"+(v+1)+"</td><td>"+data.sid[v]+"</td><td>"+data.name[v]+"</td><td>"+data.score[v]+"</td></tr>"
                
  			  } 
  
   
         )
  tt+="</tbody></table>";
  $("#table").html(tt);
 }
 
 
function chartshow(distri,coursename,term)
{
      $("#chart").highcharts({
            chart: {
                type: 'area'
            },
            title: {
                text: '<h3>Grade Distribution of '+coursename +' (Term:' +term+' )</h3>'
            },
       
            xAxis: {
                labels: {
                    formatter: function() {
                        return this.value; // clean, unformatted number for year
                    }  
                }
            },
            yAxis: {
                title: {
                    text: "<h1>Score</h1>"
                },
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            tooltip: {
                pointFormat: '<b>Number of People:{point.y} </b>'
            },
            plotOptions: {
                area: {
                    pointStart: 0,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 1,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: coursename,
                data: distri
            }]
        })
   
}