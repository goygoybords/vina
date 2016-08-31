

$('.home-edit-btn').click(function(data){
		$.post('../pscripts/customer/home_tab_query',{ id : $(this).attr('data-value') }, function(data){
			data = $.parseJSON(data);
			$('#homeaddress1').val(data.Address1);
			$('#homeaddress2').val(data.Address2);
			$('#homecity').val(data.City);
			$('#homecountry').val(data.county);
			$('#homezipcode').val(data.Zip);
			$('#homeexpirationdate').val(data.Expire_Date);
			$('#homestate').val(data.State_ID.toUpperCase());
			$('#homecarrier').val(data.Carrier_NAIC);
			$('#homebuilddate').val(data.Build_Date);
			$('#homeroofdate').val(data.Roof_Date);
			$('#homesqft').val(data.SqFt);
			$('#homelevels').val(data.Levels);
			$('#homelevels').val(data.Levels);
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
			$(':input').trigger('change');
			$('select').trigger('change');
		});

		return false;
});
