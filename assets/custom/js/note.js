$(document).on('click','.viewnote',function(e){
	e.preventDefault;
	var cid = $(this).attr('data-cid');
	var uid = $(this).attr('data-uid');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/note',
		data:{'cid':cid,'uid':uid},
		success:function(data){
		var parse = JSON.parse(data);
		$('#notetblView').html('<table class="table dataTable table-condensed table-hover tableH"><thead><th>Subject</th><th>Type</th><th>Notes</th><th>Added by</th><th>Date Added</th></thead><tbody></tbody></table>');
		$('#notetblView tbody').empty();

			for(var i = 0; i< parse.length; i++)
			{
				$('.tableH tbody').append(parse[i]);
			}
		}
	});
	return false;
});
// submit
$(document).on('submit','#noteform',function(e){
	e.preventDefault;
	var inputs = $(this).serialize();
	var cus_id = $('#noteform .cust_id').val();
	var userid = $('body').find('#userid').val();
	if($('.notesF').val()!=='')
	{	
		$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Please wait while your note is being save!</h4>');
		$.ajax({
			type:'POST',
			url:'../ajaxrequest/customertabs_update/note_add',
			data:inputs,
			success:function(data){
				$('#msg_inf').html('<h4 class="bg-success text-center" style="padding:1em;">&nbsp;Note successfully added!</h4>');
				$('#msg_inf').fadeIn(1500);
				setTimeout(function(){
					$('#msg_inf').html('');
					$('#msg_inf').fadeOut(1500);
				},3000);
				$('#noteform input, #noteform select, #noteform textarea').val("");
				// $('#notetbl').load(document.URL +  ' #notetbl');
				notes(cus_id,userid);
			}
		});
	}else{
		$('#msg_inf').html('<h4 class="bg-warning text-center" style="padding:1em;">&nbsp;Please Add some notes!</h4>');
		$('#msg_inf').fadeIn(1500);
		setTimeout(function(){
			$('#msg_inf').html('');
			$('#msg_inf').fadeOut(1500);
		},3000);
	}
	return false;
});
function notes(cus_id,userid)
{
	$('.cust_id').val(cus_id);
	$('.userid').val(userid);
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
// show more note
$(document).on('click','.showmore',function(e){
	e.preventDefault;
	var attr = $(this).attr('data-attr');
	var more = $(this).attr('data-sh');
	$.ajax({
		type:'POST',
		url:'../ajaxrequest/customertabs_update/note_more',
		data:{'noteid':attr,'more':more},
		success:function(e)
		{
			var parse = JSON.parse(e);
			var mor = "";
			var note = "";
			if(parse.opt==1)
			{
				mor = "<span class='text-info showmore' data-attr='"+parse.id+"' data-sh='less' style='cursor:pointer;'>&nbsp;> show less</span>";
				note = parse.note+mor;
			}else{
				mor = "<span class='text-info showmore' data-attr='"+parse.id+"' data-sh='more' style='cursor:pointer;'>&nbsp;> show more</span>";
				note = parse.note.substr(0,65)+mor;
			}
			$('.showmore'+attr).html(note);
		}
	});
	return false;
});

// change note member
// $(document).on('change','#noteSelect',function(e){
// 	e.preventDefault;
// 		var mem = $(this).val();
// 		var find = $('body').find('.'+mem).attr('data-attr');
// 		if(find!=mem)
// 		{
// 			$('.noteTR').fadeOut();
// 		}else{
// 			$('body').find('.'+mem).fadeIn();
// 		}
// 	return false;
// });
// btn
// $(document).on('click','#donenote',function(e){
// 	e.preventDefault;
// 	if($('.notesF').val()!=='')
// 	{
// 		$('#savebtnnote').html('<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>');
// 	}else{
// 		$('#msg_inf').html('<h4 class="bg-warning text-center" style="padding:1em;">&nbsp;Please Add some notes!</h4>');
// 		$('#msg_inf').fadeIn(1500);
// 		setTimeout(function(){
// 			$('#msg_inf').html('');
// 			$('#msg_inf').fadeOut(1500);
// 		},3000);
// 	}
// 	return false;
// });