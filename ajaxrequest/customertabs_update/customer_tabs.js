$(document).on('click','.home-edit-btn',function(data){
		$.post('../pscripts/customer/home_tab_query',{ id : $(this).attr('data-value') }, function(data){
			data = $.parseJSON(data);

			$('#caid').val(data.CAID);
			$('#chpid').val(data.CHPID);
			$('#chiid').val(data.CHIID);

			$('#homeaddress1').val(data.Address1);
			$('#homeaddress2').val(data.Address2);
			$('#homecity').val(data.City);
			$('#homecountry').val(data.County);
			$('#homezipcode').val(data.Zip);
			$('#homeexpirationdate').val(data.Expire_Date);
			$('#homestate').val(data.State_ID.toUpperCase());
			$('#homecarrier').val(data.Carrier_NAIC);
			$('#homebuilddate').val(data.bdate);

			$('#homeroofdate').val(data.Roof_Date);
			$('#homesqft').val(data.SqFt);
			$('#homelevels').val(data.Levels);
			$('#homegarage').val(data.Garage_ID);
			$('#homecapacity').val(data.Garage_Capacity);
			$('#homeexteriorwall').val(data.ExteriorWall_ID);
			if(data.Alarm == '1'){
				$('#homealarms').prop('checked',true);
			}else{
				$('#homealarms').prop('checked',false);
			}
			$('#homecoverage').val(data.Coverage);
			$('#homepremium').val(data.Premium);
			$('#homedeductible').val(data.Deductible);
			$('#homemedical').val(data.Medical);
			$('#homelossofuse').val(data.LossOfUse);
			$('#homeliability').val(data.Liability);
			$('#homeaddtype').val(data.type);

			$('#homeaddtype').trigger('change');
			$('[name=homeaddtype] option').filter(function() { 
		    	return ($(this).val() == data.type);
			}).prop('selected', true);

			$('#cidddd').val(data.cidd);
			$(':input').trigger('change');
			$('select').trigger('change');

			$('#familyrefresh').html('<button class="btn btn-primary btn-sm ref"><i class="fa fa-spinner fa-spin"></i> Refresh form</button>');
		});

		return false;
});

// delete home
$(document).on('click','.home-del-btn',function(e){
	e.preventDefault;
	var chp = $(this).attr('chp');
	var chi = $(this).attr('chi');
	var caid = $(this).attr('caid');
	var conf = confirm("Continue delete this user?");
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/home_tab_del',
		data:{'chp':chp,'chi':chi,'caid':caid},
		success:function(data)
		{
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);
			$('#homeform input[type="text"],#homeform input[type="number"], #homeform select, #homeform textarea').val("");
			$('#hometable').load(document.URL +  ' #hometable');

		}
	});
	}
	return false;
});

$(document).on('click','.vehicle-edit-btn', function(data){
		$.post('../pscripts/customer/vehicle_tab_query',{ id : $(this).attr('data-value') }, function(data){
		
			data = $.parseJSON(data);

			$('#vehicleinfoID').val(data.CAIID);
			$('#vehicleID').val(data.Vehicle_ID);
			$('#vehicleVIN').val(data.VIN);
			$('#vehiclemodel').val(data.Model);
			$('#vehiclemodelyear').val(data.Model_Year);
			$('#vehicleexpirationdate').val(data.Expire_Date);
			$('#vehiclecarrier').val(data.Carrier_NAIC);
			$('#vehiclemanufacturer').val(data.MFG_ID);

			
			$('#vehiclerental').val(data.Rental);
			$('#vehicletowing').val(data.Towing);
			
			
			$('#vehiclepremium').val(data.Premium);

			// $('#vehicleterm'+data.Term).prop('checked', true);
			$('#vehicleterm').val(data.Term);
			$('#vehicleterm').trigger('change');
			$('[name=term] option').filter(function() { 
		    	return ($(this).val() == data.Term);
			}).prop('selected', true);
			
			$('#vehiclebodyinjury').val(data.Bodily_Injury);
			$('#vehiclebodyinjury').trigger('change');
			$('[name=bodyinjury] option').filter(function() { 
		    	return ($(this).val() == data.Bodily_Injury);
			}).prop('selected', true);

			$('#vehicleproperty').val(data.Property_Damage);
			$('#vehicleproperty').trigger('change');
			$('[name=property] option').filter(function() { 
		    	return ($(this).val() == data.Property_Damage);
			}).prop('selected', true);


			$('#vehiclecollision').val(data.Property_Damage);
			$('#vehiclecollision').trigger('change');
			$('[name=collision] option').filter(function() { 
		    	return ($(this).val() == data.Collision);
			}).prop('selected', true);

			$('#vehiclecomp').val(data.Property_Damage);
			$('#vehiclecomp').trigger('change');
			$('[name=comp] option').filter(function() { 
		    	return ($(this).val() == data.Comprehensive);
			}).prop('selected', true);

			$('#vehiclemedical').val(data.Medical);
			$('#vehiclemedical').trigger('change');
			$('[name=medical] option').filter(function() { 
		    	return ($(this).val() == data.Medical);
			}).prop('selected', true);

			$('#vehiclepip').val(data.PIP);
			$('#vehiclepip').trigger('change');
			$('[name=pip] option').filter(function() { 
		    	return ($(this).val() == data.PIP);
			}).prop('selected', true);

			$('#vehiclebody').val(data.BI_UINUNI);
			$('#vehiclebody').trigger('change');
			$('[name=body2] option').filter(function() { 
		    	return ($(this).val() == data.BI_UINUNI);
			}).prop('selected', true);

			$('#vehicleproperty').val(data.PD_UINUNI);
			$('#vehicleproperty').trigger('change');
			$('[name=property2] option').filter(function() { 
		    	return ($(this).val() == data.PD_UINUNI);
			}).prop('selected', true);
			
			$(':input').trigger('change');
			$('select').trigger('change');

			$('#familyrefresh').html('<button class="btn btn-primary btn-sm ref"><i class="fa fa-spinner fa-spin"></i> Refresh form</button>');
		});

		return false;
});

$(document).on('click','.vehicle-del-btn',function(e){
	e.preventDefault;
	var att = $(this).attr('data-value');
	var vehicelID = $(this).attr('vehicID');
	var conf = confirm("Continue delete this user?");
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/vehicle_tab_del',
		data:{'vID':att,'vehicelID':vehicelID},
		success:function(data)
		{
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);
			$('#formvehicletab input[type="text"],#formvehicletab input[type="number"], #formvehicletab select, #formvehicletab textarea').val("");
			$('#vehicletable').load(document.URL +  ' #vehicletable');
		}
	});
	}
	return false;
});
// 
$(document).on('click','.violation-edit-btn',function(data){
		// alert('aw');
		$.post('../pscripts/customer/violation_tab_query',{ id : $(this).attr('data-value') }, function(data){
			// console.log(data);
			var parse = $.parseJSON(data);
			$('#violationid').val(parse.id);
			$('#violationviolation').val(parse.Violation);
			$('#violationdate').val(parse.Violation_Date);
			$('#violationamount').val(parse.Violation_Amount);
			$('#vioCID').val(parse.CID);

			$('#violationdriver').val(parse.CID);
			$('#violationdriver').trigger('change');
			$('[name=violationdriver] option').filter(function() {
		    	return ($(this).val() == parse.CID);
			}).prop('selected', true);

			$('#violation').val(parse.VT_ID);
			$('#violation').trigger('change');
			$('[name=violation] option').filter(function() {
		    	return ($(this).val() == parse.VT_ID);
			}).prop('selected', true);

			$(':input').trigger('change');
			$('select').trigger('change');

			$('#familyrefresh').html('<button class="btn btn-primary btn-sm ref"><i class="fa fa-spinner fa-spin"></i> Refresh form</button>');
		});
		return false;
});
$(document).on('click','.violation-del-btn',function(e){
	e.preventDefault;
	var cavid = $(this).attr('data-value');
	var conf = confirm("Continue delete this user?");
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/violation_tab_del',
		data:{'cavid':cavid},
		success:function(data)
		{
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);
			$('#violationform input[type="text"],#violationform input[type="number"], #violationform select, #violationform textarea').val("");
			$('#violationtable').load(document.URL +  ' #violationtable');

		}
	});
	}
	return false;
});

// family tabs
$(document).on('click','.family-edit-btn',function(data){
		 console.log('aw');
		var cus_id = $(this).attr('cusid');
		var userid = $('body').find('#userid').val();
		$.post('../pscripts/customer/family_tab_query',{ id : $(this).attr('data-value') }, function(data){

			var parse = $.parseJSON(data);
			$('#familyID').val(parse.id);
			$('#familyLastname').val(parse.Last_Name );
			$('#familyFirstname').val(parse.First_Name );
			$('#familyMiddlename').val(parse.Middle_Name );
			$('#familygender').val(parse.Gender_ID);
			$('#familybirthdate').val(parse.DOB);
			$('#familyDriverlicense').val(parse.dl);
			$('#thisfamilyssnumber').val(parse.ssn);
			$('#familydlstate').val(parse.cdlstate);
			$('#familyphone').val(parse.cphone);
			$('#familymarital').val(parse.Marital_ID);
			$('#familyinsured').val(parse.Relation_ID);
			$('#familystatus').val(parse.Status_ID);
			$('#familyBname').val(parse.businessname);
			$('#familysource').val(parse.Orig_Source_ID);
			$('#familylanguage').val(parse.Language_ID);
			$('#familyemail').val(parse.EMail);
			$('#CPID').val(parse.cpID);
			$('#CID').val(parse.CustomerID);
			$('#BID').val(parse.BID);

			$('.cust_id').val(cus_id);
			// change notes by customer edited here

			notes(cus_id,userid);
			// 	
			$(':input').trigger('change');
			$('select').trigger('change');


		});

		return false;
});

function notes(cus_id,userid)
{
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/note_view',
		data:{'cus_id':cus_id},
		success:function(data)
		{
			var parse = JSON.parse(data);
			$('#notetbl tbody').empty();

				for(var i = 0; i< parse.length; i++)
				{
					$('#notetbl tbody').append(parse[i]);
				}
		}
	});
}

$(document).on('click','.family-del-btn',function(e){
	e.preventDefault;
	var cid = $(this).attr('data-value-cid');
	var c_id = $(this).attr('data-value-c_id');
	var conf = confirm("Continue delete this user?");
	var cids = $('body').find('#c_ids').val();
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/family_tab_del',
		data:{'cid':cid,'c_id':c_id},
		success:function(data)
		{

			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(2000);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(2000);
			},4000);
			$('#formfamilytab input,#formfamilytab select, #formfamilytab textarea').val("");

			$('#familytable').load(document.URL +  ' #familytable');
			$('#cus_iD').val(cids);

		}
	});
	}
	return false;
});
// 
$('#formfamilytab').submit(function(data){
	var cust_id = $('body').find('#c_ids').val();
	$.post('../ajaxrequest/customertabs_update/family_tab', $('#formfamilytab').serialize() , function(data){
			console.log(data);

			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Customer information successfully saved!</h4>');
			$('#msg_inf').fadeIn(2000);

			$('#formfamilytab input,#formfamilytab select, #formfamilytab textarea').val("");

			$('#formfamilytab #cus_iD').val(cust_id);

			$('#familytable').load(document.URL +  ' #familytable');

			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(2000);
			},4000);

			$(':input').trigger('change');
			$('select').trigger('change');
		});
	return false;
});
$('#formvehicletab').submit(function(data){
	var custid = $('body').find('#inf').val();
	$.post('../ajaxrequest/customertabs_update/vehicle_tab', $('#formvehicletab').serialize() , function(data){
					$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Vehicle information successfully saved!</h4>');
					$('#msg_inf').fadeIn(2000);

					$('#formvehicletab input, #formvehicletab select, #formvehicletab textarea').val("");
					$('#vehicletable').load(document.URL +  ' #vehicletable');
						
					$('#formvehicletab #CustomerID').val(custid);
					setTimeout(function(){
						$('#msg_inf').html('');
						$('#msg_inf').fadeOut(2000);
					},4000);

				$(':input').trigger('change');
				$('select').trigger('change');
		});
	return false;
});

$('#violationform').submit(function(data){
	$.post('../ajaxrequest/customertabs_update/violation_tab_update', $('#violationform').serialize() , function(data){

					$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Violation information successfully saved!</h4>');
					$('#msg_inf').fadeIn(2000);

					$('#violationform input,#violationform select, #violationform textarea').val("");
					$('#violationtable').load(document.URL +  ' #violationtable');


					setTimeout(function(){
						$('#msg_inf').html('');
						$('#msg_inf').fadeOut(2000);
					},4000);

					$(':input').trigger('change');
					$('select').trigger('change');
		});
	return false;
});
// home tabs
$('#homeform').submit(function(data){
		var cust_id = $('body').find('#c_ids').val();
		var custid = $('body').find('#inf').val();
		$.post('../ajaxrequest/customertabs_update/home_tab_update', $('#homeform').serialize() , function(data){
				console.log(data);
					$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Home information successfully saved!</h4>');
					$('#msg_inf').fadeIn(2000);
					
					$('#homeform input, #homeform select, #homeform textarea').val("");
					$('#hometable').load(document.URL +  ' #hometable');
					
					$('#homeform #cusids').val(custid);
					$('#homeform #cus_ids').val(cust_id);

					setTimeout(function(){
						$('#msg_inf').html('');
						$('#msg_inf').fadeOut(2000);
					},4000);


					$(':input').trigger('change');
					$('select').trigger('change');
		});
	return false;
});

$(document).on('click','.ref',function(e){
	$('#formfamilytab input,#formfamilytab select, #formfamilytab textarea').val("");
	$('#homeform input,#homeform select, #homeform textarea').val("");
	$('#formvehicletab input,#formvehicletab select, #formvehicletab textarea').val("");
	$('#violationform input, #violationform select, #violationform textarea').val("");
	$('#claimform input,#claimform select, #claimform textarea').val("");
	$('#qouteform input,#qouteform select, #qouteform textarea').val("");
	$('#policyform input,#policyform select, #policyform textarea').val("");
	$('#noteform input,#noteform select, #noteform textarea').val("");
	var cust_id = $('body').find('#c_ids').val();
	var custid = $('body').find('#inf').val();
	var userid = $('body').find('#userid').val();
	$('.userid').val(userid);
	$('#policyform #polID').val(custid);
	$('#policyform #pol_ID').val(cust_id);

	$('#qouteform #cid').val(custid);
	$('#qouteform .c_id').val(cust_id);

	$('#formvehicletab #CustomerID').val(custid);
	$('#homeform #cusids').val(custid);
	$('#homeform #cus_ids').val(cust_id);
	$('#formfamilytab #cus_iD').val(cust_id);
	$('#noteform .cust_id').val(cust_id);
	setTimeout(function(){
		$('#msg_inf').html('');
		$('#msg_inf').fadeOut(2000);
	},4000);
});