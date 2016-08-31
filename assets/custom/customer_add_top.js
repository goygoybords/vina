
$(document).on('click','#delPhone',function(e){
	e.preventDefault;
	var conf = confirm("Continue delete this phone number?");
	if(conf)
	{
		$(this).parent('#parent').remove();
		$('#customer_add_top').trigger("submit");
	}
	return false;
});
$(document).on('submit','#customer_add_top',function(e){
	e.preventDefault;
	var cus = $(this).serialize();
	$.ajax({
		type:'POST',
		url: '../ajaxrequest/customer_add/customer_add',
		data:cus,
		success:function(e)
		{
			if(e!=0)
			{
				var parse = JSON.parse(e);
				var customerid = parse.CustomerID;
				if(parse.msg=="update")
				{
					$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Customer information successfully updated!</h4>');
					$('#msg_inf').fadeIn(1500);
				}else{
					
					var customer_id = parse.Customer_ID;
					$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Customer information successfully saved!</h4>');
					$('#msg_inf').fadeIn(1500);
					window.location.href="customer_information?ret="+customerid;
				}
			}else{
				$('#msg_inf').html('<h4 class="bg-warning text-center" style="padding:1em;">&nbsp;Oops! Please input some data required inside the given form!</h4>');
				$('#msg_inf').fadeIn(1500);
			}
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);
		}
	});
	return false;
});