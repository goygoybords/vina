$("#reset_type").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
     $("#update_camp").val("");
		$("#camp_id").val("");
		$('#camp_title').val("");
		$('#camp_alt_title').val("");
		$('#campaign_type').val("");
		$('#cost_per_lead').val("");
		$('#campaign_email').val("");
		$('#campaign_group').val("");
		$('#campaign_providers').val("");
		$('#campaign_note').val("");
    $("#camp_title").focus();
   
    return false;
});

$(document).on('submit','#camp_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/campaign/campaign/campaign_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$("#update_camp").val("");
			$("#camp_id").val("");
			$('#camp_title').val("");
			$('#camp_alt_title').val("");
			$('#campaign_type').val("");
			$('#cost_per_lead').val("");
			$('#campaign_email').val("");
			$('#campaign_group').val("");
			$('#campaign_providers').val("");
			$('#campaign_note').val("");
			

			$('#camp_tbl').load(document.URL +  ' #camp_tbl');
		
		}
	});
	return false;
});

$(document).on('click','#camp_edit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/campaign/campaign/campaign_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);

			$("#update_camp").val("true");
			$("#camp_id").val(parse.campaign_id);

			
			$('#camp_title').val(parse.title);
			$('#camp_alt_title').val(parse.alternate_title);
			$('#campaign_type').val(parse.campaign_type);
			$('#campaign_type').trigger('change');
			$('[name=campaign_type] option').filter(function() { 
		    	return ($(this).val() == parse.Comprehensive);
			}).prop('selected', true);

			$('#cost_per_lead').val(parse.cost_per_lead);
			$('#campaign_email').val(parse.email);
			$('#campaign_group').val(parse.campaign_group);

			$('#campaign_providers').val(parse.provider);
			$('#campaign_providers').trigger('change');
			$('[name=campaign_providers] option').filter(function() { 
		    	return ($(this).val() == parse.Comprehensive);
			}).prop('selected', true);


			$('#campaign_note').val(parse.note);

				
			// $(':input').trigger('change');
			$('select').trigger('change');
		
		}
	});

	return false;
});

$(document).on('click','#camp_delete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/campaign/campaign/campaign_delete',
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


			$('#camp_tbl').load(document.URL +  ' #camp_tbl');
	
		}
	});
	}
	return false;
});