$(document).ready(function(){

	$('#report_select').change(function(){
	    $('div.reportselections').hide();
	    $('#r' + $(this).val()).show();
	}).change(); // Invoke it now


	$('#reports_form').on('submit', function(event){
		event.preventDefault();
		var serial_cont = $('#reports_form').serialize();
		var reportname = $("#report_select").val();
		//console.log(serial_cont);
		$('#report_result').html("Loading...");
		
		$.post('../pscripts/reports/reportselect.php', serial_cont, function(e){
			//console.log(e);
			//$('.reportname').html(reportname);
			//$('#report_result').css({'max-height':'500px','overflow':'scroll','padding':'0px 20px 20px'});
			$('#report_result').html(e);
		});
	});
	$("#exportCSV").click(function(){
	  $("#report_result table").table2excel({
	    // exclude CSS class
	    exclude: ".noExl",
	    name: "ThisReport",
	    filename: "SomeFile" //do not include extension
	  });
	});
	

   //$('#report_result .dataTable').scrollbarTable();

});
