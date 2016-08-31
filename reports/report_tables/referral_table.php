<?php
$resultreferrals = get_reportreferral($db, $fname,$lname);
$resultcount = count($resultreferrals);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>

<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultreferrals as $rrefers){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rrefers['CustomerID']?>" target="_blank"><?php echo $rrefers['Last_Name'].", ".$rrefers['First_Name']?></a></td>
			<td><?php echo $rrefers['Address1'] ?></td>
			<td><?php echo $rrefers['City'] ?></td>
			<td><?php echo $rrefers['State_ID'] ?></td>
			<td><?php echo $rrefers['EMail'] ?></td>
			<td><?php echo $rrefers['Phone'] ?></td>
			<td><?php echo $rrefers['hvHomeCarrier'] ?></td>
			<td><?php echo $rrefers['hvAutocarrier'] ?></td>
			<td><?php echo $rrefers['Status_Desc'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>