$("#reset_vio").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
    $("#vio_des").focus();
    return false;
});


$(document).on('submit','#violation_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/violation/violation_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#vio_des').val("");
			$('#violation_tbl').load(document.URL +  ' #violation_tbl');
			$("#update_vio").val("");
			$("#violation_id").val("");
			
		}
	});
	return false;
});

$(document).on('click','#vio_edit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/violation/violation_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);

			$("#update_vio").val("true");
			$("#violation_id").val(parse.id);
			$("#vio_des").val(parse.Violation)
			
		
		}
	});

	return false;
});

$(document).on('click','#vio_delete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/violation/violation_delete',
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

			$('#vio_des').val("");
			$('#violation_tbl').load(document.URL +  ' #violation_tbl');
	
		}
	});
	}
	return false;
});