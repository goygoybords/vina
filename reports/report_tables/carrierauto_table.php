<?php
$resultcarriersauto = get_reportcarrierauto($db,$carrierauto);
$resultcount = count($resultcarriersauto);
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
			<th>Auto Carrier</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultcarriersauto as $rcauto){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rcauto['CustomerID']?>" target="_blank"><?php echo $rcauto['Last_Name'].", ".$rcauto['First_Name']?></a></td>
			<td><?php echo $rcauto['Address1'] ?></td>
			<td><?php echo $rcauto['City'] ?></td>
			<td><?php echo $rcauto['State_ID'] ?></td>
			<td><?php echo $rcauto['Zip'] ?></td>
			<td><?php echo $rcauto['EMail'] ?></td>
			<td><?php echo $rcauto['Status_Desc'] ?></td>
			<td><?php echo $rcauto['Company'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>