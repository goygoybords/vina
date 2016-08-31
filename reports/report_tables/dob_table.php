<?php
$resultdob = get_reportdob($db, $unix_dob_sdate->getTimestamp(),$unix_dob_edate->getTimestamp());
$resultcount = count($resultdob);
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
			<th>Home Carrier</th>
			<th>Auto Carrier</th>			
			<th>Status</th>
			<th>Birthdate</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultdob as $rdob){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rdob['CustomerID']?>" target="_blank"><?php echo $rdob['Last_Name'].", ".$rdob['First_Name']?></td>
			<td><?php echo $rdob['Address1'] ?></td>
			<td><?php echo $rdob['State_ID'] ?></td>
			<td><?php echo $rdob['Zip'] ?></td>
			<td><?php echo $rdob['City'] ?></td>
			<td><?php echo $rdob['Phone'] ?></td>
			<td><?php echo $rdob['hvHomeCarrier'] ?></td>
			<td><?php echo $rdob['hvAutocarrier'] ?></td>				
			<td><?php echo $rdob['Status_Desc'] ?></td>
			<td><?php echo date("m/d/Y ",$rdob['DOB']); ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>