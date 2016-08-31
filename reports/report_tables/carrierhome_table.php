<?php
$resultcarriershome = get_reportcarrierhome($db, $carrierhome);
$resultcount = count($resultcarriershome);
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
			<th>Email</th>
			<th>Status</th>
			<th>Home Carrier</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultcarriershome as $rchome){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rchome['CustomerID']?>" target="_blank"><?php echo $rchome['Last_Name'].", ".$rchome['First_Name']?></a></td>
			<td><?php echo $rchome['Address1'] ?></td>
			<td><?php echo $rchome['City'] ?></td>
			<td><?php echo $rchome['State_ID'] ?></td>
			<td><?php echo $rchome['Zip'] ?></td>
			<td><?php echo $rchome['EMail'] ?></td>
			<td><?php echo $rchome['Status_Desc'] ?></td>
			<td><?php echo $rchome['Company'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>