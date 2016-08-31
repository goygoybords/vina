// check box
$('#dfault').change(function(){

    if($(this).attr('checked')){
          $(this).val('1');
     }else{
          $(this).val('0');
     }
});

$(document).on('click','#editclaim',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/claim_tab',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			$('#policynum').val(parse.pNum);

			$('#Customer').val(parse.cID);
			$('#Customer').trigger('change');
			$('[name=Customer] option').filter(function() { 
		    	return ($(this).val() == parse.cID);
			}).prop('selected', true);

			$('#typelost').val(parse.VT_ID);
			$('#typelost').trigger('change');
			$('[name=typelost] option').filter(function() { 
		    	return ($(this).val() == parse.VT_ID);
			}).prop('selected', true);
			


			$('#cAmount').val(parse.Claim_Amount);

			var Claim_Date = new Date(parse.Incident_Date*1000);
			// Months
			var CdM = Claim_Date.getMonth()+1;
			// Days
			var CdD = Claim_Date.getDate();
			// Years
			var CdY = Claim_Date.getFullYear();
			var Cdate = CdM+"/"+CdD+"/"+CdY;

			if(parse.Claim_Date==0)
			{
				$('.clmdate').val();
			}else{
				$('.clmdate').val(Cdate);
			}
			if(parse.Driver_Fault==1)
			{
				$('#dfault').attr('checked','checked');
				$('#dfault').val('1');
			}else{
				$('#dfault').removeAttr('checked','checked');
				$('#dfault').val('0');
			}
			
			// id
			$('.claimU').val(parse.Claim_ID);
			$(':input').trigger('change');
			$('select').trigger('change');
		}
	});
});

$(document).on('click','#deleteclaim',function(e){
	e.preventDefault;
	var clid = $(this).attr('data-attr');
	var conf = confirm("Continue delete this user?");
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/claim_tab_del',
		data:{'cl_id':clid},
		success:function(data)
		{
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);

			$('#claimform input:checkbox').val('0');
			$('#claimform input, #claimform select, #claimform textarea').val("");
			$('#claimtbl').load(document.URL +  ' #claimtbl');
		}
	});
	}
	return false;
});
// submit claim

$(document).on('submit','#claimform',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/claim_tab_update',
		data:data,
		success:function(data)
		{
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Claim Information successfully saved!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);
			$('#claimform input:checkbox').val('0');
			$('#claimform input, #claimform select, #claimform textarea').val("");
			$('#claimtbl').load(document.URL +  ' #claimtbl');

		}
	});
	return false;
});