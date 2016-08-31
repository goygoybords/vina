
$(document).on('submit','#qouteform',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	var uid = $('.useridD').val();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/qoute_tab_update',
		data:data,
		success:function(data)
		{
			$('#qouteform input, #qouteform select, #qouteform textarea').val("");
			$('#quotetbl').load(document.URL +  ' #quotetbl');
			$('#producer').val(uid);
		}
	});
	return false;
});


$(document).on('click','#qoutedit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');

	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/qoute_tab',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			$('#note').html(parse.qNote);
			$('#carr').val(parse.carCom);
			$('#carr').trigger('change');
			$('[name=carr] option').filter(function() { 
		    	return ($(this).val() == parse.carCom);
			}).prop('selected', true);

			$('#polType').val(parse.Policy_Type);
			$('#polType').trigger('change');
			$('[name=polType] option').filter(function() { 
		    	return ($(this).text() == parse.Policy_Type);
			}).prop('selected', true);

			$('#qstatus').val(parse.qid);
			$('#qstatus').trigger('change');
			$('[name=qstatus] option').filter(function() { 
		    	return ($(this).val() == parse.qid);
			}).prop('selected', true);
			

			// $('#producer').val(parse[0].IBO_UserID);
			// $('#producer').trigger('change');
			// $('[name=producer] option').filter(function() { 
		 //    	return ($(this).val() == parse[0].IBO_UserID);
			// }).prop('selected', true);

			$('#premium').val(parse.Quote);

			var QuoteDate = new Date(parse.QuoteDate*1000);
			// Months
			var qM = QuoteDate.getMonth()+1;
			// Days
			var qD = QuoteDate.getDate();
			// Years
			var qY = QuoteDate.getFullYear();
			var bindate = qM+"/"+qD+"/"+qY;

			if(parse.QuoteDate==0)
			{
				$('.qdate').val();
			}else{
				$('.qdate').val(bindate);
			}

			var qbind = new Date(parse.qbind*1000);
			// Months
			var qBM = qbind.getMonth()+1;
			// Days
			var qBD = qbind.getDate();
			// Years
			var qBY = qbind.getFullYear();
			var qBdate = qBM+"/"+qBD+"/"+qBY;

			if(parse.qbind==0)
			{
				$('.bindate').val();
			}else{
				$('.bindate').val(qBdate);
			}
			
			var qeff = new Date(parse.qeff*1000);
			// Months
			var qeffM = qeff.getMonth()+1;
			// Days
			var qeffD = qeff.getDate();
			// Years
			var qeffY = qeff.getFullYear();
			var qeffdate = qeffM+"/"+qeffD+"/"+qeffY;
			
			if(parse.qeff==0)
			{
				$('.effdate').val();
			}else{
				$('.effdate').val(qeffdate);
			}
			
			$('.qouteU').val(parse.Quote_ID);
			$('.c_id').val(parse.Customer_ID);
			$('.cid').val(parse.CustomerID);

			$(':input').trigger('change');
			$('select').trigger('change');
			$('textarea').trigger('change');
		}
	});


	return false;
});

$(document).on('click','#qoutdelete',function(e){
	e.preventDefault;
	var qid = $(this).attr('data-attr');
	var conf = confirm("Continue delete this user?");
	var cust_id = $('body').find('#c_ids').val();
	var custid = $('body').find('#inf').val();
	var producer = $('.useridD').val();
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/qoute_tab_del',
		data:{'qid':qid},
		success:function(data)
		{
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);

			$('#qouteform input:checkbox').val('0');
			$('#qouteform input,#qouteform input[type="date"], #qouteform select, #qouteform textarea').val("");
			
			$('#qouteform #cid').val(custid);
			$('#qouteform .c_id').val(cust_id);
			$('.producer').val(producer);
			$('#quotetbl').load(document.URL +  ' #quotetbl');
		}
	});
	}
	return false;
});