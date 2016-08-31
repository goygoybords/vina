
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="stat_source_tbl">
				<thead>
					<th>Source</th>
					<th>Action</th>
					
				</thead>
				<tbody>
					<?php foreach ($source as $r ) : ?>
					<tr>
						<td><?php echo $r['Orig_Source']; ?></td>
						<td>
							<a style="cursor:pointer;" class="text-primary" id="statsourceedit" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-pencil"></i>&nbsp;Edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="statsourcedel" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-trash"></i>&nbsp;Delete</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!--/end table-->

		<form class="form form-validate floating-label" novalidate="novalidate" id="stat_source_form">
			<input type="hidden" name="source_id" id = "source_id" value = "">
			<input type = "hidden" name = "update" id = "update" value ="">
			<div class="card-body style-default-light">
    			<div class="col-sm-4">
				


				<div class="form-group">
					<input type="text" class="form-control dirty" id="source_des" name="source_des" required >
					<label for="Source Description">Source Description</label>
				</div>
				
			</div>
				

			<hr>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<a href="" class="btn ink-reaction btn-raised btn-primary" id = "reset_source"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Reset </a>
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id=""><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>