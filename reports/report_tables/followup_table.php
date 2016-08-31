<?php
$resultfollowup = get_reportfollowup($db, $unix_followup_sdate->getTimestamp(),$unix_followup_edate->getTimestamp());
$resultcount = count($resultfollowup);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th>Phone</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>			
			<th>Status</th>
			<th>Follow Up Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultfollowup as $rfollowup){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rfollowup['CustomerID']?>" target="_blank"><?php echo $rfollowup['Last_Name'].", ".$rfollowup['First_Name']?></a></td>
			<td><?php echo $rfollowup['Address1'] ?></td>
			<td><?php echo $rfollowup['City'] ?></td>
			<td><?php echo $rfollowup['State_ID'] ?></td>
			<td><?php echo $rfollowup['Zip'] ?></td>
			
			<td><?php echo $rfollowup['Phone'] ?></td>
			<td><?php echo $rfollowup['hvHomeCarrier'] ?></td>
			<td><?php echo $rfollowup['hvAutocarrier'] ?></td>			
			<td><?php echo $rfollowup['Status_Desc'] ?></td>
			<td><?php echo date("m/d/Y ",$rfollowup['Review_Date']) ?></td>

		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>