
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="stat_carriers_tbl">
				<thead>
					<th>NAIC</th>
					<th>Company</th>
					<th>Action</th>
					
				</thead>
				<tbody>
					<?php foreach ($carriers as $r ) : ?>
					<tr>
						<td><?php echo $r['NAIC']; ?></td>
						<td><?php echo $r['Company']; ?></td>
						<td>
							<a style="cursor:pointer;" class="text-primary" id="statcarriersedit" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-pencil"></i>&nbsp;Edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="statcarriersdel" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-trash"></i>&nbsp;Delete</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!--/end table-->

		<form class="form form-validate floating-label" novalidate="novalidate" id="stat_carriers_form">
			<input type = "hidden" name="carrier_id" id = "carrier_id" value = "">
			<input type = "hidden" name = "update" id = "update_carrier" value ="">
			<div class="card-body style-default-light">
    			<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control dirty" id="company_des" name="company_des" required >
						<label for="Company">Company</label>
					</div>
				</div>
			<hr>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<a href="" class="btn ink-reaction btn-raised btn-primary" id = "reset_carrier"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Reset </a>
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id=""><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>