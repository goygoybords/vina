
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="type_tbl">
				<thead>
					<tr>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($type as $r ) :?>
					<tr>
	 					<td><?php echo $r['description']; ?></td>
	 					<td>
	 						<a style="cursor:pointer;" class="text-primary" id="type_edit" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-pencil"></i>&nbsp;Edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="type_delete" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-trash"></i>&nbsp;Delete</a>
	 					</td>
	 				</tr>
	 				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!--/end table-->

		<form class="form form-validate floating-label" novalidate="novalidate" id="type_form">
		<input type = "hidden" name="type_id" id = "type_id" value = "">
		<input type = "hidden" name = "update" id = "update_type" value ="">
		
		<div class="card-body style-default-light">
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control dirty" id="type_des" name="type_des" required  value="" >
					<label for="Description">Description</label>
				</div>
			</div>
			
			<hr>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<a href="" class="btn ink-reaction btn-raised btn-primary" id = "reset_camp"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Reset </a>
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id=""><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>