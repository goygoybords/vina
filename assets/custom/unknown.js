$(document).on('click','#upduser',function(e){
	e.preventDefault;
	var attr = $(this).attr('data-att');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/unknown/user',
		data:{'uid':attr},
		success:function(data)
		{
			var parse = JSON.parse(data);
			$('#fname').val(parse.fn);
			$('#lname').val(parse.ln);
			$('#uname').val(parse.unme);
			$('#access'+parse.ulvl).prop('checked',true);
			$('#access').val(parse.ulvl);
			$('#role').html('<a class="ink-reaction btn-raised btn-info pull-left btn-sm" href="roles.php?u='+parse.uid+'"  target="_blank"><label> Edit Roles </label></a>');
			$(':input').trigger('change');
			$('select').trigger('change');
			$('#pword').removeAttr('required','required');
			$('#u').val(parse.uid);
		}
	});
	return false;
});
//
$(document).on('submit','#uform',function(e){
	e.preventDefault;
	var attr = $(this).serialize();
	var check = $('#access').val();
	if(check!='')
	{

		$.ajax({
			type:'POST',
			url:'../ajaxrequest/unknown/user_upd',
			data:attr,
			success:function(data)
			{
				$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;User successfully saved!</h4>');
				$('#msg_inf').fadeIn(1500);
				setTimeout(function(){
					$('#msg_inf').html('');
					$('#msg_inf').fadeOut(1500);
				},3000);
				// $('#uform input').val("");
				// $('#accesstable').load(document.URL +  ' #accesstable');
				window.location.reload();
			}
		});
	}else{
		$('#msg_inf').html('<h4 class="bg-info text-center" style="padding:1em;">&nbsp;Please set a role for this user!</h4>');
		$('#msg_inf').fadeIn(1500);
		setTimeout(function(){
			$('#msg_inf').html('');
			$('#msg_inf').fadeOut(1500);
		},3000);
	}
	return false;
});
$(document).on('click','#deluser',function(e){
	
	e.preventDefault;
	var d = $(this).attr('data-att');
	var conf = confirm("Continue delete this user?");
	if(conf){
	$(this).closest('tr').remove();
		$.ajax({
			type:'POST',
			url:'../ajaxrequest/unknown/user_del',
			data:{'d':d},
			success:function(data)
			{
				
				$('#msg_inf').html('<h4 class="bg-danger text-center" style="padding:1em;">&nbsp;User successfully deleted!</h4>');
				$('#msg_inf').fadeIn(1500);
				setTimeout(function(){
					$('#msg_inf').html('');
					$('#msg_inf').fadeOut(1500);
				},3000);
				
			}
		});
	}
	return false;	
});
$(document).on('click','#addnewuser',function(e){
	$('#uform input').val("");
	$('#pword').attr('required','required');
	$('.access').prop('checked',false);
	$('#role').html('');
});
$(document).on('click','.access',function(e){

	var val = $(this).attr('attr');
	$('#access').val(val);

});
