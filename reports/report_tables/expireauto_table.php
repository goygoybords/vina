<?php
$resultexpireauto = get_reportexpireauto($db, $unix_expireauto_sdate->getTimestamp(),$unix_expireauto_edate->getTimestamp());
$resultcount = count($resultexpireauto);
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
			<th>Model</th>
			<th>Model Year</th>
			<th>Premium</th>
			<th>Expiration Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultexpireauto as $raxpireauto){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $raxpireauto['CustomerID']?>" target="_blank"><?php echo $raxpireauto['Last_Name'].", ".$raxpireauto['First_Name']?></a></td>
			<td><?php echo $raxpireauto['Address1'] ?></td>

			<td><?php echo $raxpireauto['Zip'] ?></td>
			<td><?php echo $raxpireauto['City'] ?></td>
			<td><?php echo $raxpireauto['Phone'] ?></td>
			<td><?php echo $raxpireauto['hvHomeCarrier'] ?></td>
			<td><?php echo $raxpireauto['hvAutocarrier'] ?></td>			
			<td><?php echo $raxpireauto['Status_Desc'] ?></td>
			<td><?php echo $raxpireauto['Model'] ?></td>
			<td><?php echo $raxpireauto['Model_Year'] ?></td>
			<td><?php echo $raxpireauto['Premium'] ?></td>
			<td><?php echo date("m/d/Y ",$raxpireauto['Expire_Date']) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>