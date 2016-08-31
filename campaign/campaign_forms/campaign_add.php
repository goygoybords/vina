
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="camp_tbl">
				<thead>
					<tr>
						<th>Title</th>
						<th>Campaign Type</th>
						<th>Cost Per Lead</th>
						<th>Note</th>
						<th>Campaign Group</th>
						<th>Campaign Provider</th>
						<th>Active</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($campaign as $r ) :?>
					<tr>
	 					<td><?php echo $r['title']; ?></td>
	 					<td><?php echo $r['description']; ?></td>
	 					<td><?php echo $r['cost_per_lead']; ?></td>
	 					<td><?php echo $r['note']; ?></td>
	 					<td><?php echo $r['campaign_group']; ?></td>
	 					<td><?php echo $r['Company']; ?></td>
	 					<td><?php if( $r['active'] == 1) echo "Active"; ?></td>
	 					<td>
	 						<a style="cursor:pointer;" class="text-primary" id="camp_edit" data-attr="<?php echo $r['campaign_id']; ?>">
								<i class="fa fa-pencil"></i>&nbsp;Edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="camp_delete" data-attr="<?php echo $r['campaign_id']; ?>">
								<i class="fa fa-trash"></i>&nbsp;Delete</a>
	 					</td>
	 				</tr>
	 				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!--/end table-->

		<form class="form form-validate floating-label" novalidate="novalidate" id="camp_form">
		<input type = "hidden" name="camp_id" id = "camp_id" value = "">
		<input type = "hidden" name = "update" id = "update_camp" value ="">
		
		<div class="card-body style-default-light">
    		<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control dirty" id="camp_title" name="camp_title"  >
					<label for="Title">Title</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control dirty" id="camp_alt_title" name="camp_alt_title"   >
					<label for="Alternate Title">Alternate Title</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<select id="campaign_type" name="campaign_type" class="form-control dirty"  >
						<option value=""></option>
						<?php foreach ($type as $t ): ?>
							<option value="<?php echo $t['id']; ?>"><?php echo $t['description']; ?></option>
						<?php endforeach; ?>
					</select>
					<label for="Campaign Type">Campaign Type</label>
				</div>
			</div>

			<div class="col-sm-2">
				<div class="form-group">
					<input type="text" class="form-control dirty" id="cost_per_lead" name="cost_per_lead" >
					<label for="Cost Per Lead">Cost Per Lead</label>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<input type="email" class="form-control dirty" id="campaign_email" name="campaign_email" >
					<label for="Campaign Email">Email</label>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control dirty" id="campaign_group" name="campaign_group"  >
					<label for="Campaign Group">Campaign Group</label>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<select id="campaign_providers" name="campaign_providers" class="form-control dirty"  >
						<option value=""></option>
						<?php foreach ($providers as $p ): ?>
							<option value="<?php echo $p['id']; ?>"><?php echo $p['Company']; ?></option>
						<?php endforeach; ?>
					</select>
					<label for="Campaign Providers">Campaign Providers</label>
				</div>
			</div>
		

				<div class="col-lg-12">
					<div class="col-sm-4">
						<div class="form-group">
							<textarea name = "campaign_note" id = "campaign_note" class = "form-control dirty" rows="3" cols="30"></textarea>
							<label for="Campaign Note">Note</label>
						</div>
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