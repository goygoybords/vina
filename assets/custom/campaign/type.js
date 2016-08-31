$("#reset_type").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
     $("#update_type").val("");
	$("#type_id").val("");
    $("#source_des").focus();
   
    return false;
});

$(document).on('submit','#type_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/campaign/type/type_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#type_des').val("");
			$('#type_tbl').load(document.URL +  ' #type_tbl');
			$("#update_type").val("");
			$("#type_id").val("");
		}
	});
	return false;
});

$(document).on('click','#type_edit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/campaign/type/type_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);

			$("#update_type").val("true");
			$("#type_id").val(parse.id);
			$("#type_des").val(parse.description)
			
		
		}
	});

	return false;
});

$(document).on('click','#type_delete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/campaign/type/type_delete',
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

			$('#type_des').val("");
			$('#type_tbl').load(document.URL +  ' #type_tbl');
	
		}
	});
	}
	return false;
});