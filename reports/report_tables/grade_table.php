<?php
$resultgrades = get_reportgrade($db, $selected_grades);
$resultcount = count($resultgrades);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>
			<th>State</th>
			<th>Zip</th>
			<th>City</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>			
			<th>Status</th>
			<th>Grade</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultgrades as $rgrades){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rgrades['CustomerID']?>" target="_blank"><?php echo $rgrades['Last_Name'].", ".$rgrades['First_Name']?></a></td>
			<td><?php echo $rgrades['Address1'] ?></td>
			<td><?php echo $rgrades['State_ID'] ?></td>
			<td><?php echo $rgrades['Zip'] ?></td>
			<td><?php echo $rgrades['City'] ?></td>
			<td><?php echo $rgrades['Phone'] ?></td>
			<td><?php echo $rgrades['EMail'] ?></td>
			<td><?php echo $rgrades['hvHomeCarrier'] ?></td>
			<td><?php echo $rgrades['hvAutocarrier'] ?></td>				
			<td><?php echo $rgrades['Status_Desc'] ?></td>
			<td><?php echo $rgrades['Grade'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>