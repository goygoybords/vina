
$(document).on('submit','#policyform',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/policy_tab_update',
		data:data,
		success:function(data)
		{
			$('#policy_data input, #policy_data select, #policy_data textarea').val("");
			$('#policytbl').load(document.URL +  ' #policytbl');
			$('#forpamount label').html("Premium Amount ($)");
		}
	});
	return false;
});

$(document).on('click','#policyedit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/policy_tab',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			$('#pnumber').val(parse.PolicyNo);
			if(parse.RenewPremium>0)
			{
				
				$('#forpamount label').html("Premium Amount ($)");
				$('#pamount').val(parse.RenewPremium);
			}else{
				$('#forpamount label').html("Renew Premium Amount ($)");
				$('#pamount').val(parse.Premium);
			}
			

			var dbind = new Date(parse.dbind*1000);
			// Months
			var dbindM = dbind.getMonth()+1;
			// Days
			var dbindD = dbind.getDate();
			// Years
			var dbindY = dbind.getFullYear();
			var bindate = dbindM+"/"+dbindD+"/"+dbindY;

			if(parse.dbind==0)
			{
				$('.bind_date').val();
			}else{
				$('.bind_date').val(bindate);
			}
			var dex = new Date(parse.dex*1000);
			// Months
			var dexM = dex.getMonth()+1;
			// Days
			var dexD = dex.getDate();
			// Years
			var dexY = dex.getFullYear();
			var dexdate = dexM+"/"+dexD+"/"+dexY;
			if(parse.dex==0)
			{
				$('.expire_date').val();
			}else{
				$('.expire_date').val(dexdate);
			}
			

			$('#status').val(parse.StatusID);
			$('#status').trigger('change');
			$('[name=status] option').filter(function() { 
		    	return ($(this).val() == parse.StatusID);
			}).prop('selected', true);

			$('#carrier').val(parse.NAIC);
			$('#carrier').trigger('change');
			$('[name=carrier] option').filter(function() { 
		    	return ($(this).val() == parse.NAIC);
			}).prop('selected', true);

			$('#policyType').val(parse.Policy_Type);
			$('#policyType').trigger('change');
			$('[name=policyType] option').filter(function() { 
		    	return ($(this).text() == parse.Policy_Type);
			}).prop('selected', true);

			$('#polUp').val(parse.cPid);
			$('#polID').val(parse.cpid);
			$('#pol_ID').val(parse.cp_id);

			$(':input').trigger('change');
			$('select').trigger('change');
		
		}
	});

	return false;
});

$(document).on('click','#policydelete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue delete this user?");
	var cust_id = $('body').find('#c_ids').val();
	var custid = $('body').find('#inf').val();
	
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/policy_tab_del',
		data:{'pid':pid},
		success:function(data)
		{
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);

			$('#policyform input, #policyform select, #policyform textarea').val("");
			$('#policyform #polID').val(custid);
			$('#policyform #pol_ID').val(cust_id);
			$('#policytbl').load(document.URL +  ' #policytbl');
	
		}
	});
	}
	return false;
});