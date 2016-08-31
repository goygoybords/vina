$(document).ready(function(){
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_phone_group'); //Add button selector
    var wrapper = $('.phone-wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-wrapper col-sm-12"><div class="col-sm-3" style="padding:0;">'
					+'<div class="form-group">'
					+'	<select id="phonetype" name="phonetype[]" class="form-control">'
					+'		<option value="">&nbsp;</option>'
					+'		<option value="30">Work</option>'
					+'		<option value="40">Home</option>'
					+'		<option value="50">Business</option>'
					+'      <option value="60">Cellular</option>'
					+'	</select>'
					
					+'</div>'
				+'</div>'									
				+'<div class="col-sm-4">'
				+'	<div class="form-group">'
				+'		<div class="input-group">'
				+'			<div class="input-group-content">'
				+'				<input type="text" class="form-control" maxlength="10" id="phone" name="phone[]">'
				+'			</div>'
				+'		</div>'
				+'	</div>'
				+'</div>'
				+'<span class="remove_phone_group"><i class="md md-remove-circle"></i></span>'
				+'</div>';//New input field html 

    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_phone_group', function(e){ //Once remove button is clicked
        e.preventDefault();

        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    // member
    var max = 5; //Input fields increment limitation
    var add = $('.add_phone_group_fam'); //Add button selector
    var wrap = $('.phone-wrapper-fam'); //Input field wrapper
    var field = '<div class="col-sm-6">'
				+'<div class="form-group">'
					+'<div class="col-lg-12" style="padding: 0;">'
						+'<div class="col-sm-5" style="padding: 0;">'
							+'<div class="form-group">'
								+'<select id="familyphonetype" name="familyphonetype[]" class="form-control dirty">'
									+'<option value="0" selected>&nbsp;</option>'
									+'<option value="30">Work</option>'
									+'<option value="40">Home</option>'
									+'<option value="50">Business</option>'
									+'<option value="60">Cellular</option>'
								+'</select>'
								+'<label for="familyphonetype"><b>Phone Type</b></label>'
							+'</div>'
						+'</div>'
						+'<div class="col-sm-7">'
							+'<div class="form-group">'
								+'<div class="input-group">'
									+'<div class="input-group-content">'
										+'<input type="text" class="form-control dirty" maxlength="10" name="familyphone[]" id="familyphone">'
										+'<label><b>Tel/Cell Number</b></label>'
									+'</div>'
								+'</div>'
							+'</div>'
						+'</div>'
					+'</div>'
				+'</div>'
				+'<span class="remove_phone_group_fam" style="position: absolute;right: 3em;"><i class="md md-remove-circle"></i></span>';//New input field html 

    var y = 1; //Initial field counter is 1
    $(add).click(function(){ //Once add button is clicked
        if(y < max){ //Check maximum number of input fields
            y++; //Increment field counter
            $(wrap).append(field); // Add field html
        }
    });
    $(wrap).on('click', '.remove_phone_group_fam', function(e){ //Once remove button is clicked
        e.preventDefault();

        $(this).parent('div').remove(); //Remove field html
        y--; //Decrement field counter
    });
    // delete
     $(wrap).on('click', '.remove_phone_group_fam_del', function(e){ //Once remove button is clicked
        e.preventDefault();
        var phoneid = $(this).attr('data-attr');
        $(this).parent('div').remove(); //Remove field html
        $('#customer_add_top').trigger("submit");
    });

    
});
