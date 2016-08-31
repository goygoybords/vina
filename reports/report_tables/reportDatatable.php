<script>
  $('#report_result .dataTable').dataTable({
    "orderCellsTop": true,
     "bPaginate": false,
      "fixedHeader": {
            header: true,
            footer: true
        },
      "sScrollY": "600",
    "sScrollX": "100%", 
"sScrollXInner": "400%",
        //"aLengthMenu": [[10, 25, 50, 100, -1],[ 10, 25, 50, 100, 'All']],
        //"iDisplayLength": 10,
    //"aaSorting": [[6,'desc']],
    "bFilter": false,
    "responsive": true
  });
  //new $.fn.dataTable.FixedHeader( '#report_result .dataTable' );
</script>