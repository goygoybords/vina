<?php
$resultproductionsum = get_productionsum($db, $unix_productionsum_sdate->getTimestamp(),$unix_productionsum_edate->getTimestamp(),$productionsum);
$resultcount = count($resultproductionsum);
?>
<span class="pull-right">Total Rows: <?php echo $resultcount;?></span>
<table class="table table-striped no-margin dataTable no-footer" id="reportdata">
	<thead>
		<tr>
			<th>Producer</th>
			<th>Auto Total</th>
			<th>Home Total</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($resultproductionsum as $rprodsum){?>
		<tr>
			<td><?php echo $rprodsum['IBO_UserName']?></td>
			<td><?php echo $rprodsum['autosum'] ?></td>
			<td><?php echo $rprodsum['homesum'] ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php include 'reportDatatable.php'?>