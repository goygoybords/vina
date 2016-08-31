<?php
$resultlanguages = get_reportlanguage($db,$language,$langstatus);
$resultcount = count($resultlanguages);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer" id="reportdata">
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address 1</th>
			<th>BirthDate</th>
			<th>Phone</th>		
			<th>Email</th>
			<th>ZIP</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultlanguages as $rlangs){?>
		<tr>
			<td><a href="../customer/customer_information?ret=<?php echo $rlangs['CustomerID']?>" target="_blank"><?php echo $rlangs['Last_Name']." ".$rlangs['First_Name']?></a></td>
			<td><?php echo $rlangs['Address1'] ?></td>
			<td><?php echo date("m/d/Y ",$rlangs['DOB']) ?></td>
			<td><?php echo $rlangs['Phone'] ?></td>	
			<td><?php echo $rlangs['EMail'] ?></td>
			<td><?php echo $rlangs['Zip'] ?></td>
			<td><?php echo $rlangs['Status_Desc'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>