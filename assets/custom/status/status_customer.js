$("#reset_cust").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
    $("#update_cust_stat").val("");
	$("#stat_cust_id").val("");
    $("#stat_desc").focus();
    return false;
});


$(document).on('submit','#status_cust_form',function(e){
	e.preventDefault;	
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/customer/status_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#stat_desc').val("");
			$('#statustbl').load(document.URL +  ' #statustbl');
			$("#update_cust_stat").val("");
			$("#stat_cust_id").val("");
			
		}
	});
	return false;
});

$(document).on('click','#stat_edit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/customer/status_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);
			$("#update_cust_stat").val("true");
			$("#stat_cust_id").val(parse.id);
			$("#stat_desc").val(parse.Status_Desc)
		}
	});

	return false;
});

$(document).on('click','#stat_delete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/customer/status_del',
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
			$('#statustbl').load(document.URL +  ' #statustbl');
	
		}
	});
	}
	return false;
});