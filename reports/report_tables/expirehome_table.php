<?php
$resultexpirehome = get_reportexpirehome($db, $unix_expirehome_sdate->getTimestamp(),$unix_expirehome_edate->getTimestamp());
$resultcount = count($resultexpirehome);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>

			<th>Zip</th>
			<th>City</th>
			<th>Phone</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>			
			<th>Status</th>
			<th>Expiration Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultexpirehome as $rexpireh){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rexpireh['CustomerID']?>" target="_blank"><?php echo $rexpireh['Last_Name'].", ".$rexpireh['First_Name']?></a></td>
			<td><?php echo $rexpireh['Address1'] ?></td>
			<td><?php echo $rexpireh['Zip'] ?></td>
			<td><?php echo $rexpireh['City'] ?></td>
			<td><?php echo $rexpireh['Phone'] ?></td>
			<td><?php echo $rexpireh['hvHomeCarrier'] ?></td>
			<td><?php echo $rexpireh['hvAutocarrier'] ?></td>			
			<td><?php echo $rexpireh['Status_Desc'] ?></td>
			<td><?php echo date("m/d/Y ",$rexpireh['Expire_Date']) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>