<?php
$resultprospects = get_reportprospect($db, $unix_prospect_sdate->getTimestamp(),$unix_prospect_edate->getTimestamp());
$resultcount = count($resultprospects);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address 1</th>
			<th>State</th>
			<th>Zip</th>
			<th>City</th>
		
			<th>Phone</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>				
			<th>Status</th>
			<th>Review Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultprospects as $rprospects){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rprospects['CustomerID'] ?>" target="_blank"> <?php echo $rprospects['Last_Name'].", ".$rprospects['First_Name']?></a></td>
			<td><?php echo $rprospects['Address1'] ?></td>
			<td><?php echo $rprospects['State_ID'] ?></td>
			<td><?php echo $rprospects['Zip'] ?></td>
			<td><?php echo $rprospects['City'] ?></td>
			<td><?php echo $rprospects['Phone'] ?></td>
			<td><?php echo $rprospects['hvHomeCarrier'] ?></td>
			<td><?php echo $rprospects['hvAutocarrier'] ?></td>			
			
			<td><?php echo $rprospects['Status_Desc'] ?></td>
			<td><?php echo date("m/d/Y ",$rprospects['Review_Date']) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>