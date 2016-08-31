$("#reset_manu").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
    $("#manu_des").focus();
    return false;
});


$(document).on('submit','#manu_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/manufacturer/manu_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#manu_des').val("");
			$('#manu_tbl').load(document.URL +  ' #manu_tbl');
			$("#update_manufacturer").val("");
			$("#manufacturer_id").val("");
			
		}
	});
	return false;
});

$(document).on('click','#manu_edit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/manufacturer/manu_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);

			$("#update_manufacturer").val("true");
			$("#manufacturer_id").val(parse.MFG_ID);
			$("#manu_des").val(parse.Manufacturer)
			
		
		}
	});

	return false;
});

$(document).on('click','#manu_delete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/status/manufacturer/manu_delete',
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

			$('#manu_des').val("");
			$('#manu_tbl').load(document.URL +  ' #manu_tbl');
	
		}
	});
	}
	return false;
});