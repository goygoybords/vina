
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="statustbl">
				<thead>
					<tr>
						<th>DESCRIPTION</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($getStatCust as $r):  ?>
					<tr>
	 					<td><?php echo $r['Status_Desc']; ?></td>
	 					<td>
	 						<a style="cursor:pointer;" class="text-primary" id="stat_edit" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-pencil"></i>&nbsp;Edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="stat_delete" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-trash"></i>&nbsp;Delete</a>
	 					</td>
	 				</tr>
	 				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!--/end table-->

		<form class="form form-validate floating-label" novalidate="novalidate" id="status_cust_form">
			<div class="card-body style-default-light">
    			<div class="col-sm-4">
				<div class="form-group">
					<input type = "hidden" name="stat_cust_id" id = "stat_cust_id" value = "">
					<input type = "hidden" name = "update" id = "update_cust_stat" value ="">
					
					<input type="text" name="stat_desc" class="form-control dirty" id="stat_desc" 
					required value="">
					
					<label for="Status Description">Status Description</label>
				</div>
				
			</div>
				

			<hr>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<a href="" class="btn ink-reaction btn-raised btn-primary" id = "reset_cust"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Reset </a>
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id=""><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>