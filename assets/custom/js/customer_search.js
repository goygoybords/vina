	$('#pageData').html('<h5 class="text-default"><i class="fa fa-spinner fa-spin"> </i> Please wait..</h5>');
	var url      = window.location.href;

	var oldURL = url;
		var index = 0;
		var newURL = oldURL;
		index = oldURL.indexOf('?');
		if(index == -1){
		    index = oldURL.indexOf('#');
		}
		if(index != -1){
		    newURL = oldURL.substring(0, index);
		}
	window.history.pushState('customer', 'Title', '/customer/customer');
	var limit = 10;
	var where = $('.searched').val();
	var searchby = $('#searchby').val();
	var order = $('#order').val();
	var sort = $('#sortby').val();
	function changePagination(pageId,limit,where, sort, order){
		$('#pageData').html('<h5 class="text-default"><i class="fa fa-spinner fa-spin"> </i> Please wait..</h5>');
		limit = $('#pageSelect').val();
		where = $('.searched').val();
		order = $('#order').val();
		sort = $('#sortby').val();
		searchby = $('#searchby').val();
	    var dataString = 'pageId='+ pageId+"&limit="+limit+"&where="+where+"&searchby="+searchby+"&sort="+sort+"&order="+order;
	     $.ajax({
	           type: "POST",
	           url: "../ajaxrequest/loadData",
	           data: dataString,
	           cache: false,
	           success: function(result){
	          	$(".flash").hide();
	            $("#pageData").html(result);
	           }
	      });
	}
	$(document).on('change','#pageSelect',function(e){
		e.preventDefault;
		var limit = $(this).val();
		changePagination('1', limit, where,searchby, sort, order);
		return false;
	});
	changePagination('1', limit, where,searchby, sort, order);

	// sort key
	$(document).on('change','.sortkeys',function(e){
		e.preventDefault;
		order = $('#order').val();
		sort = $('#sortby').val();
		changePagination('1', limit, where, searchby, sort, order);
		return false;
	});
	$(document).on('submit','#search',function(e){
		$('#pageData').html('<h5 class="text-default"><i class="fa fa-spinner fa-spin"> </i> Waiting for result..</h5>');
		where = $('.searched').val();
		searchby = $('#searchby').val();
		e.preventDefault;
		// window.history.pushState('customer', 'Title', '/customer/customer');
		var limit = $('#pageSelect').val();
		if($('.searched').val()=='')
		{
			changePagination('1', limit, where, searchby, sort, order);
		}else{
	  		changePagination('1', limit, where, searchby, sort, order);
	  		
		}
		
		return false;
	});