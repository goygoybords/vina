$("#reset_pol").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
    $("#vio_des").focus();
    $("#update_policy").val("");
	$("#policy_id").val("");
    return false;
});


$(document).on('submit','#policy_type_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/policy_type/pol_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#pol_des').val("");
			$('#policy_type_tbl').load(document.URL +  ' #policy_type_tbl');
			$("#update_policy").val("");
			$("#policy_id").val("");
			
		}
	});
	return false;
});

$(document).on('click','#pol_edit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/policy_type/pol_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);

			$("#update_policy").val("true");
			$("#policy_id").val(parse.id);
			$("#pol_des").val(parse.Policy_Type)
			
		
		}
	});

	return false;
});

$(document).on('click','#pol_delete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/policy_type/pol_delete',
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
			$('#policy_type_tbl').load(document.URL +  ' #policy_type_tbl');
	
		}
	});
	}
	return false;
});