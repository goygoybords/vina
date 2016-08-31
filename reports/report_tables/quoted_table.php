<?php
$resultquoted = get_reportquoted($db, $unix_quote_sdate->getTimestamp(),$unix_quote_edate->getTimestamp());
$resultcount = count($resultquoted);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>

<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address 1</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			
			<th>Phone</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>			
			<th>Status</th>
			<th>Quote</th>
			<th>Quote Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultquoted as $rquoted){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rquoted['CustomerID']?>" target="_blank"><?php echo $rquoted['Last_Name'].", ".$rquoted['First_Name']?></a></td>
			<td><?php echo $rquoted['Address1'] ?></td>
			<td><?php echo $rquoted['City'] ?></td>
			<td><?php echo $rquoted['State_ID'] ?></td>
			<td><?php echo $rquoted['Zip'] ?></td>
			
			<td><?php echo $rquoted['Phone'] ?></td>
			<td><?php echo $rquoted['hvHomeCarrier'] ?></td>
			<td><?php echo $rquoted['hvAutocarrier'] ?></td>				
			<td><?php echo $rquoted['QStatus_Desc'] ?></td>
			<td><?php echo $rquoted['Quote'] ?></td>
			<td><?php echo date("m/d/Y ",$rquoted['QuoteDate']) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>