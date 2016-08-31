$('.vehicle-edit-btn').click(function(data){
		$.post('../pscripts/customer/vehicle_tab_query',{ id : $(this).attr('data-value') }, function(data){
			console.log(data);
			data = $.parseJSON(data);
			$('#vehicleVIN').val(data.VIN);
			$('#vehiclemodel').val(data.Model);
			$('#vehiclemodelyear').val(data.Model_Year);
			$('#vehicleexpirationdate').val(data.Expire_Date);
			$('#vehiclecarrier').val(data.Carrier_NAIC);
			$('#vehiclemanufacturer').val(data.Manufacturer);
			$(':input').trigger('change');
			$('select').trigger('change');
		});

		return false;
});