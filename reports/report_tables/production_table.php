<?php
$resultproductions = get_production($db, $unix_production_sdate->getTimestamp(),$unix_production_edate->getTimestamp(),$producers);
$resultcount = count($resultproductions);
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
			<th>Home Carrier</th>
			<th>Auto Carrier</th>
			<th>Company</th>
			<th>Effective</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultproductions as $rproductions){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rproductions['CustomerID']?>" target="_blank" ><?php echo $rproductions['Last_Name']." ".$rproductions['First_Name']?></a></td>
			<td><?php echo $rproductions['Address1'] ?></td>
			<td><?php echo $rproductions['State_ID'] ?></td>
			<td><?php echo $rproductions['Zip'] ?></td>
			<td><?php echo $rproductions['City'] ?></td>
			<td><?php echo $rproductions['hvHomeCarrier'] ?></td>
			<td><?php echo $rproductions['hvAutocarrier'] ?></td>				
			<td><?php echo $rproductions['Company'] ?></td>
			<td><?php echo date("m/d/Y ",$rproductions['Effective']) ?></td>
			<td><?php echo $rproductions['Status_Desc'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>