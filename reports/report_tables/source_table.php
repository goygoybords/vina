<?php
$resultsources = get_reportsource($db, $sourceselected);
$resultcount = count($resultsources);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer" id="reportdata">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th>Status</th>
			<th>Policy Type</th>
			<th>Policy No.</th>
			<th>Company</th>
			<th>Premium</th>
			<th>Renew Premium</th>
			<th>Home Carrier</th>
			<th>Auto Carrier</th>				
			<th>Bind Date</th>
			<th>Expire Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultsources as $rsources){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rsources['CustomerID']?>" target="_blank"><?php echo $rsources['Last_Name'].", ".$rsources['First_Name']?></a></td>
			<td><?php echo $rsources['Address1'] ?></td>
			<td><?php echo $rsources['City'] ?></td>
			<td><?php echo $rsources['State_ID'] ?></td>
			<td><?php echo $rsources['Zip'] ?></td>

			<td><?php echo $rsources['Status_Desc'] ?></td>
			<td><?php echo $rsources['Policy_Type'] ?></td>
			<td><?php echo $rsources['PolicyNo'] ?></td>
			<td><?php echo $rsources['Company'] ?></td>
			<td><?php echo $rsources['Premium'] ?></td>
			<td><?php echo $rsources['RenewPremium'] ?></td>
			<td><?php echo $rsources['hvHomeCarrier'] ?></td>
			<td><?php echo $rsources['hvAutocarrier'] ?></td>			
			<td><?php echo date("m/d/Y ",$rsources['Bind_Date']) ?></td>
			<td><?php echo date("m/d/Y ",$rsources['Expire_Date']) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>