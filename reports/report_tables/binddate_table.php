<?php
$resultbinddate = get_reportbinddate($db,$unix_binddate_sdate->getTimestamp(),$unix_binddate_edate->getTimestamp());
$resultcount = count($resultbinddate);
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
			<th>Policy</th>
			<th>Bind Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultbinddate as $rbinddate){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rbinddate['CustomerID']?>" target="_blank"><?php echo $rbinddate['Last_Name'].", ".$rbinddate['First_Name']?></a></td>
			<td><?php echo $rbinddate['Address1'] ?></td>
			<td><?php echo $rbinddate['City'] ?></td>
			<td><?php echo $rbinddate['State_ID'] ?></td>
			<td><?php echo $rbinddate['Zip'] ?></td>
			
			<td><?php echo $rbinddate['Phone'] ?></td>
			<td><?php echo $rbinddate['hvHomeCarrier'] ?></td>
			<td><?php echo $rbinddate['hvAutocarrier'] ?></td>			
			<td><?php echo $rbinddate['Status_Desc'] ?></td>
			<td><?php echo $rbinddate['Policy'] ?></td>
			<td><?php echo date("m/d/Y ",$rbinddate['Bind']) ?></td>

		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>