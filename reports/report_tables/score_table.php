<?php
$resultproductions = get_production($db, $unix_production_sdate->getTimestamp(),$unix_production_edate->getTimestamp(),$producers);
?>

<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address 1</th>
			<th>Address 2</th>
			<th>State</th>
			<th>Zip</th>
			<th>City</th>
			<th>Phone</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultprospects as $rprospects){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo ['CustomerID']?>" target="_blank"><?php echo $rprospects['Last_Name'].", ".$rprospects['First_Name']?></td>
			<td><?php echo $rprospects['Address1'] ?></td>
			<td><?php echo $rprospects['Address2'] ?></td>
			<td><?php echo $rprospects['State_ID'] ?></td>
			<td><?php echo $rprospects['Zip'] ?></td>
			<td><?php echo $rprospects['City'] ?></td>
			<td><?php echo $rprospects['Phone'] ?></td>
			<td><?php echo $rprospects['Status_Desc'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>