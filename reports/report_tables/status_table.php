<?php
$resultstatus = get_reportstatus($db, $statusresult);
$resultcount = count($resultstatus);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Phone</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>			
			<th>Call Date</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultstatus as $rstatus){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rstatus['CustomerID']?>" target="_blank"><?php echo $rstatus['Last_Name'].", ".$rstatus['First_Name']?></a></td>
			<td><?php echo $rstatus['Address1'] ?></td>
			<td><?php echo $rstatus['City'] ?></td>
			<td><?php echo $rstatus['State_ID'] ?></td>
			<td><?php echo $rstatus['Phone'] ?></td>
			<td><?php echo $rstatus['hvHomeCarrier'] ?></td>
			<td><?php echo $rstatus['hvAutocarrier'] ?></td>			
			<td><?php echo date("m/d/Y ",$rstatus['Called']); ?>
			<td><?php echo $rstatus['Status_Desc'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>