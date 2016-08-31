
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="manu_tbl">
				<thead>
					<tr>
						<th>Manufacturer</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($manufacturers as $r):  ?>
					<tr>
	 					<td><?php echo $r['Manufacturer']; ?></td>
	 					<td>
	 						<a style="cursor:pointer;" class="text-primary" id="manu_edit" data-attr="<?php echo $r['MFG_ID']; ?>">
								<i class="fa fa-pencil"></i>&nbsp;Edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="manu_delete" data-attr="<?php echo $r['MFG_ID']; ?>">
								<i class="fa fa-trash"></i>&nbsp;Delete</a>
	 					</td>
	 				</tr>
	 				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!--/end table-->

		<form class="form form-validate floating-label" novalidate="novalidate" id="manu_form">
			<div class="card-body style-default-light">
    			<div class="col-sm-4">
				<div class="form-group">
					<input type = "hidden" name="manufacturer_id" id = "manufacturer_id" value = "">
					<input type = "hidden" name = "update" id = "update_manufacturer" value ="">
					
					<input type="text" name="manu_des" class="form-control dirty" id="manu_des" 
					required value="">
					
					<label for="Manufacturer">Manufacturer</label>
				</div>
				
			</div>
				

			<hr>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<a href="" class="btn ink-reaction btn-raised btn-primary" id = "reset_manu"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Reset </a>
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id=""><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>