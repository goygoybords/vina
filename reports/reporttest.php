<?php
	//var_dump($_POST);

?>

<html>

   <head>
      <title>The jQuery Example</title>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  <script src="../assets/js/jquery.table2excel.js"></script>
      <script type = "text/javascript" language = "javascript">   
         $(document).ready(function() {
			
            $("#driver").click(function(event){
				
               $.get( 
                  "result.php",
                  { name: "Zara" },
                  function(data) {
                  	console.log(data);
                     $('#stage').html(data);
                  }
               );
					
            });
				  $("#exportCSV").click(function(){
            $("#reportdata").table2excel({
              // exclude CSS class
              exclude: ".noExl",
              name: "ThisReport",
              filename: "SomeFile" //do not include extension
            });
          });
         });

      </script>
   </head>
	
   <body>
	
      <p>Click on the button to load result.html file −</p>
		
      <div id = "stage" style = "background-color:cc0;">
         STAGE
      </div>

<a id="dlink" style="display:none;"></a>
<input type="button" id="exportCSV" value="Export to Excel">
<input type="button" onclick="tableToExcel('reportdata', 'name', 'myfile.xls')" value="Export to Excel">

<table class="table table-striped no-margin dataTable no-footer" id="reportdata">
   <thead>
      <tr>
         <th>Customer Name</th>
         <th>Address 1</th>
         <th>Address 2</th>
         <th>BirthDate</th>
         <th>Phone</th>
         <th>Email</th>
         <th>ZIP</th>
      </tr>
   </thead>
   <tbody>
         <tr>
         <td>O Mai</td>
         <td>7225 Fair Oaks Ave</td>
         <td></td>
         <td>0</td>
         <td>2143469626</td>
         <td></td>
         <td>75231</td>
      </tr>
      </tbody>
</table>


   </body>
<script type = "text/javascript" language = "javascript"> 
     var tableToExcel = (function () {
        console.log("samuk");
            var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name, filename) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                console.log(ctx);
                document.getElementById("dlink").href = uri + base64(format(template, ctx));
                document.getElementById("dlink").download = filename;
                document.getElementById("dlink").click();

            }
       })()
</script>	
</html>