
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="calendar_tbl">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Beginning and Ending Dates</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($events as $r ) : ?>
					<tr>
	 					<td><?php echo $r['title']; ?></td>
	 					<td><?php echo $r['description']; ?></td>
	 					<td><?php echo date('Y-m-d', strtotime($r['start'])) ." - ". date('Y-m-d' , strtotime($r['end'])); ?></td>
	 					<td>
	 						<a style="cursor:pointer;" class="text-primary" id="cal_edit" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-pencil"></i>&nbsp;Edit</a>&emsp; 
							<a style="cursor:pointer;" class="text-danger" id="cal_delete" data-attr="<?php echo $r['id']; ?>">
								<i class="fa fa-trash"></i>&nbsp;Delete</a>
	 					</td>
	 				</tr>
	 				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!--/end table-->

		
		<form class="form form-validate floating-label" novalidate="novalidate" id="calendar_form">
		<input type = "hidden" name = "cal_id" id = "cal_id" value = "">
		<input type = "hidden" name = "update" id = "update_cal" value ="">
		
		<div class="card-body style-default-light">
    		<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control dirty" id="cal_title" name="cal_title" >
					<label for="Title">Title</label>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control dirty" id="cal_description" name="cal_description" >
				
					<label for="Description">Description</label>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control dirty cal_start_date" name="cal_start_date" id="datepicker" value="">
							<label>Start Date</label>
						</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">

							<input type="text" class="form-control dirty cal_end_date" name="cal_end_date" id="datepicker" value="">
							<label>End Date</label>
						</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>

			<hr>

		</div>
		<div class="pull-right">
			<div class="form-group">
				<a href="" class="btn ink-reaction btn-raised btn-primary" id = "reset_cal"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Reset </a>
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id=""><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>