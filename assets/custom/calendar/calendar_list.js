
$("#reset_cal").click(function(e) {
	e.preventDefault;
    $(this).closest('form').find("input[type=text]").val("");
	    $("#update_cal").val("");
		$("#cal_id").val("");
		$('#cal_title').val("");
		$('#cal_description').val("");
		$('.cal_start_date').val("");
		$('.cal_end_date').val("");
    $("#camp_title").focus();
   
    return false;
});

$(document).on('submit','#calendar_form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/calendar/calendar_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$("#update_cal").val("");
			$("#cal_id").val("");
			$('#cal_title').val("");
			$('#cal_description').val("");
			$('.cal_start_date').val("");
			$('.cal_end_date').val("");

			$('#calendar_tbl').load(document.URL +  ' #calendar_tbl');
		
		}
	});
	return false;
});

$(document).on('click','#cal_edit',function(e){
	e.preventDefault;
	var datatt = $(this).attr('data-attr');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/calendar/calendar_retrieve',
		data:{id:datatt},
		success:function(e)
		{
			var parse = JSON.parse(e);
			console.log(parse);
			$("#update_cal").val("true");
			$("#cal_id").val(parse.id);


			$('#cal_title').val(parse.title);
			$('#cal_description').val(parse.description);


			var start = new Date(parse.start);
			var end = new Date(parse.end);

			console.log(parse.start);
			console.log(start);

			$('.cal_start_date').val(start.getMonth() + 1 + "/" + start.getDate()+ "/" + start.getFullYear());
			$('.cal_end_date').val(end.getMonth()  + 1 + "/" + end.getDate()+ "/" + end.getFullYear());
	
		}
	});

	return false;
});

$(document).on('click','#cal_delete',function(e){
	e.preventDefault;
	var pid = $(this).attr('data-attr');
	var conf = confirm("Continue deleting this record?");

	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/calendar/calendar_delete',
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


			$('#calendar_tbl').load(document.URL +  ' #calendar_tbl');
	
		}
	});
	}
	return false;
});