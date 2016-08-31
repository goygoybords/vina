<!-- if claim data is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table dataTable table-condensed table-hover" id="claimtbl">
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
				<?php
					opendb();		
					$qclaim = mysqli_query($db, " SELECT CC.*,
													C.Last_Name as clnm,
													C.First_Name as cfnm,
													AV.Violation as aviolate
													FROM customer_claim CC
													LEFT JOIN customers C on CC.Customer_ID=C.Customer_ID
													LEFT JOIN auto_violation AV on CC.Incident_ID=AV.VT_ID
					 								WHERE C.Customer_ID LIKE '".$customer_id."%'
				  							");
					$getCl = fetch_all_array($qclaim);
					closedb();
					foreach ($getCl as $clm) {
							
					?>
						<tr>
							<td><?php echo $clm['clnm'].', '.$clm['cfnm'] ?></td>
							<td><?php echo $clm['aviolate'] ?></td>
							
							<td><?php 
							if($clm['Incident_Date'] ==0 || $clm['Incident_Date']=='' )
								{ 
									echo "n/a";  
								}else{
									echo @date("m/d/Y ", $clm['Incident_Date']);
								}
							?></td>
							<td>$ <?php echo $clm['Claim_Amount'] ?></td>
							<td>
								<?php if($clm['Driver_Fault']==1){ echo '<i class="fa fa-check text-success" aria-hidden="true"></i>'; }else{
									echo '<i class="fa fa-times text-danger" aria-hidden="true"></i>';
								} ?>
							</td>
							<td>
								<a style="cursor:pointer;" class="text-primary" id="editclaim" data-attr="<?php echo $clm['Claim_ID'] ?>"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;
								<a style="cursor:pointer;" class="text-danger" id="deleteclaim" data-attr="<?php echo $clm['Claim_ID'] ?>"><i class="fa fa-trash"></i>&nbsp;delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<p class="text-warning"><?php if(count($getCl)==0){echo "No Data Found."; } ?></p>
		</div>
	</div>

	<!--/end table-->

	<form class="form form-validate floating-label" id="claimform">
		<input type="hidden" name="inf" class="inf" value="">
		<input type="hidden" name="claimU" class="claimU" value="">
		<div class="card-body style-default-light">
			<!-- <div class="col-sm-10">
				<div class="form-group">
					<div class="checkbox checkbox-styled">
						<div class="mine">
						<label class="radio-inline radio-styled">
							<input type="radio" name="inlineRadioOptions" value="option1"><span> Add New Claim </span>
						</label>
						</div>
					</div>
				</div>
			</div> -->
			<div class="col-sm-4">
				<div class="form-group">
					<!-- required -->
					<input type="text" class="form-control" id="policynum" name="policynum"  data-rule-number="true">
					<label for="policynum">Policy Number</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<select id="Customer" name="Customer" class="form-control">
					<option value="">&nbsp;</option> 
					<?php
						opendb();
							$qfamiOwn = mysqli_query($db,"SELECT
							 							C.Last_Name,C.First_Name,C.CustomerID
														FROM customers C
														WHERE C.Customer_ID LIKE '".$customer_id."%' OR C.CustomerID LIKE  '".$cusid."%'
													");

							$getfown = fetch_all_array($qfamiOwn);
						closedb();
							foreach($getfown as $famOwn){
						?>
							<option value="<?php echo $famOwn['CustomerID']; ?>" ><?php echo $famOwn['Last_Name'].', '.$famOwn['First_Name']; ?></option>
							<?php } ?>
					</select>
					<label for="Customer">Customer</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<select id="typelost" name="typelost" class="form-control">
						<option value="">&nbsp;</option>
						<?php foreach($autoViolation as $av){ ?>
						<option value="<?php echo $av['vtID']; ?>" ><?php echo $av['vtVioldation'] ?></option>
						<?php } ?>
						
					</select>
					<label for="typelost">Type of Lost </label>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="col-sm-4">
					<div class="form-group">
						<input type="number" step="0.01" min="1" value="0.00" class="form-control cAmount" name="cAmount" id="cAmount">
						<label for="cAmount">Amount ($)</label>
					</div>
				</div>	
				<div class="col-sm-4">
					<div class="form-group control-width-normal">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-content">
								<input type="text" class="form-control clmdate" name="clmdate" id="datepicker">
								<label>Claim Date</label>
							</div>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>												
				<div class="col-sm-4">
					<div class="form-group control-width-normal">
						<div class="checkbox checkbox-styled">
							<label>
								<input type="checkbox" id="dfault" name="dfault">
								<span>Driver at Fault</span>
							</label>
						</div>
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