$("#reset_source").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
    $("#update").val("");
	$("#source_id").val("");
    $("#source_des").focus();
  
    return false;
});

$(document).on('submit','#stat_source_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/source/source_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#source_des').val("");
			$('#stat_source_tbl').load(document.URL +  ' #stat_source_tbl');
			$("#update").val("");
			$("#source_id").val("");
			
		}
	});
	return false;
});

$(document).on('click','#statsourceedit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/source/source_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);
			$("#source_id").val(parse.id);
			$("#source_des").val(parse.Orig_Source)
			$("#update").val("true");
		
		}
	});

	return false;
});

$(document).on('click','#statsourcedel',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/source/source_delete',
		data:{'pid':pid},
		success:function(data)
		{
			console.log(data);
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);

			$('#source_des').val("");
			$('#stat_source_tbl').load(document.URL +  ' #stat_source_tbl');
	
		}
	});
	}
	return false;
});