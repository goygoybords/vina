$('.violation-edit-btn').click(function(data){
		// alert('aw');
		$.post('../pscripts/customer/violation_tab_query',{ id : $(this).attr('data-value') }, function(data){
			var data = $.parseJSON(data);

			$('#violationid').val(data.id);
			$('#violationdriver').val(data.lastname + ", " + data.firstname);
			$('#violationviolation').val(data.Violation);
			$('#violationdate').val(data.Violation_Date);
			$('#violationamount').val(data.Violation_Amount);
			$('#vioCID').val(data.CID);
			$(':input').trigger('change');
			$('select').trigger('change');
		});

		return false;
});