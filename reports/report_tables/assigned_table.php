<?php
$resultassignees = get_reportassignees($db,$assigned);
$resultcount = count($resultassignees);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer" id="listcus">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address 1</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>
			<th>Status</th>
			<th>Assigned To</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultassignees as $rassign){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rassign['CustomerID'] ?>" target="_blank" ><?php echo $rassign['Last_Name'].", ".$rassign['First_Name']?></a></td>
			<td><?php echo $rassign['Address1'] ?></td>
			<td><?php echo $rassign['City'] ?></td>
			<td><?php echo $rassign['State_ID'] ?></td>
			<td><?php echo $rassign['Zip'] ?></td>
			<td><?php echo $rassign['EMail'] ?></td>
			<td><?php echo $rassign['Phone'] ?></td>
			<td><?php echo $rassign['hvHomeCarrier'] ?></td>
			<td><?php echo $rassign['hvAutocarrier'] ?></td>
			<td><?php echo $rassign['Status_Desc'] ?></td>
			<td><?php echo $rassign['IBO_UserName'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>