
$(document).on('submit','#rating-form',function(e){
	e.preventDefault;
	var data = $(this).serialize();
	console.log(data);

	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/rating_tab_insert',
		data:data,
		success:function(data)
		{
			console.log(data);
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Rating information successfully saved!</h4>');
					$('#msg_inf').fadeIn(2000);

					$('#ratingtbl').load(document.URL +  ' #ratingtbl');

					setTimeout(function(){
						$('#msg_inf').html('');
						$('#msg_inf').fadeOut(2000);
					},4000);

					$('#ratingtbl').load(document.URL +  ' #ratingtbl');
		}
	});
	return false;
});

	
$(document).on('click','#ratingdelete',function(e){
	e.preventDefault;
	var id = $(this).attr('data-attr');
	var conf = confirm("Continue delete this record?");
	
	
	if(conf){
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/rating_tab_delete',
		data: {'id': id},
		success:function(data)
		{
			console.log(data);
			$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Data successfully deleted!</h4>');
			$('#msg_inf').fadeIn(1500);
			setTimeout(function(){
				$('#msg_inf').html('');
				$('#msg_inf').fadeOut(1500);
			},3000);


			$('#ratingtbl').load(document.URL +  ' #ratingtbl');
	
		}
	});
	}
	return false;
});
