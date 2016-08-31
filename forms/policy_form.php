<!-- if claim rating is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-condensed table-hover dataTable" id="policytbl">
				<thead>
					<th>Carrier</th>
					<th>Policy Type</th>
					<th>Policy Number</th>
					<th>Premium</th>
					<th>Renewed Premium</th>
					<th>Bind Date</th>
					<th>Expiration Date</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php if(count($policy)!=0){ ?>
					<?php foreach($policy as $pol){ ?>
					<tr>
						<td><?php echo $pol['Company'] ?></td>
						<td><?php echo $pol['Policy_Type'] ?></td>
						<td><?php echo $pol['PolicyNo'] ?></td>
						<td> $ <?php echo $pol['Premium'];?></td>
						<td> $ <?php echo $pol['RenewPremium'];?></td>
						<td><?php 
							if($pol['Bind_Date'] ==0 || $pol['Bind_Date']==='' )
								{ 
									echo "n/a";  
								}else{
									echo @date("m/d/Y ", $pol['Bind_Date'] );
								}
						?></td>
						<td>
							<?php 
							if($pol['Expire_Date'] ==0 || $pol['Expire_Date']==='' )
								{ 
									echo "n/a";  
								}else{
									echo @date("m/d/Y ", $pol['Expire_Date'] );
								}
						?>
						</td>
						<td><?php echo $pol['StatusDesc'] ?></td>
						<td>
							<a style="cursor:pointer;" class="text-primary" id="policyedit" data-attr="<?php echo $pol['PID']; ?>"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="policydelete" data-attr="<?php echo $pol['PID']; ?>"><i class="fa fa-trash"></i>&nbsp;delete</a>
						</td>
					</tr>
					<?php } 
				} ?>
				</tbody>
			</table>
			<p class="text-warning"><?php if(count($policy)==0){ echo "No Data Found.";} ?></p>
		</div>
	</div>
	<!--/end table-->
	<form class="form form-validate floating-label" novalidate="novalidate" id="policyform">
		<input type="hidden" name="inf" class="inf" value="">
		<input type="hidden" name="polUp" id="polUp" value="">
		<input type="hidden" name="polID" id="polID" value="<?php echo $_GET['ret'] ?>">
		<input type="hidden" name="pol_ID" id="pol_ID" value="<?php echo $cusidb ?>">

		<div class="card-body style-default-light" id="policy_data">
    		<div class="col-sm-4">
				<div class="form-group">
					<select id="carrier" name="carrier" class="form-control">
						<?php opendb(); echo carrier_list($db); closedb(); ?>
					</select>
					<label for="carrier">Carrier</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<select id="policyType" name="policyType" class="form-control">
						<?php foreach($policytype as $ptype){ ?>
							<option value="<?php echo $ptype['Policy_Code'] ?>"><?php echo $ptype['Policy_Type'] ?></option>
						<?php } ?>
					</select>
					<label for="policyType">Policy Type </label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="pnumber" name="pnumber" required data-rule-minlength="3">
					<label for="pnumber">Policy No.</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<select id="status" name="status" class="form-control">
						<option value="0">&nbsp;</option>
						<option value="5"> Active</option>
						<option value="10"> Terminated</option>
						<option value="15"> Can Status</option>
						<option value="20"> Cancelled</option>
					</select>
					<label for="status">Status</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group" id="forpamount">
					<input type="number" step="0.01" min="1" value="0.00" class="form-control" id="pamount" name="pamount" required data-rule-minlength="3">
					<label for="pamount">Premium Amount ($)</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control bind_date" name="bind_date" id="datepicker">
							<label>Bind Date</label>
						</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control expire_date" name="expire_date" id="datepicker">
							<label>Expiration Date</label>
						</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>			
	</form>
