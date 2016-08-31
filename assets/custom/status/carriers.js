$("#reset_carrier").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
     $("#update_carrier").val("");
	$("#carrier_id").val("");
    $("#source_des").focus();
   
    return false;
});

$(document).on('submit','#stat_carriers_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/carriers/carriers_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#company_des').val("");
			$('#stat_carriers_tbl').load(document.URL +  ' #stat_carriers_tbl');
			$("#update_carrier").val("");
			$("#carrier_id").val("");
		}
	});
	return false;
});

$(document).on('click','#statcarriersedit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/carriers/carriers_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);

			$("#update_carrier").val("true");
			$("#carrier_id").val(parse.id);
			$("#company_des").val(parse.Company)
			
		
		}
	});

	return false;
});

$(document).on('click','#statcarriersdel',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/carriers/carriers_delete',
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
			$('#stat_carriers_tbl').load(document.URL +  ' #stat_carriers_tbl');
	
		}
	});
	}
	return false;
});