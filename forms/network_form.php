<!-- if claim data is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table dataTable table-condensed table-hover" id="networktbl">
				<thead>
					<tr>
						<th>Customer</th>
						<th>Type of Lost</th>
						<!-- <th>Incident</th> -->
						<th>Claim Date</th>
						<th>Amount</th>
						<th>Fault</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<tr>
							<td></td>
						</tr>
				</tbody>
			</table>
			<p class="text-warning"></p>
		</div>
	</div>

	<!--/end table-->

	<form class="form form-validate floating-label" id="claimform">
		<div class="card-body style-default-light">
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="policynum" name="policynum"  data-rule-number="true">
					<label for="policynum">Policy Number</label>
				</div>
			</div>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>