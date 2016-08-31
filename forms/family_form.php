
<!-- if home data is NOT EMPTY: show table else hide-->

	<div class="card-body">
		<div class="table-responsive">
			<table class="table dataTable table-condensed table-hover" id="familytable">
				<thead>
					<tr>
						<th>Customer</th>
						<th>Relation</th>
						<th>SSN</th>
						<th>Gender</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						opendb();
						$qMembers = mysqli_query($db, "SELECT C.*,
						  							C.Customer_ID as c_id,
						  							CS.CSSN as ssn,
						  							SR.Relationship as re,
						  							SC.Status_Desc as stat
						  							FROM customers C
						 							LEFT JOIN customer_secinfo CS ON CS.Customer_ID = C.Customer_ID
						 							LEFT JOIN status_relation SR ON C.Relation_ID=SR.Relation_ID
						 							LEFT JOIN status_customer SC ON C.Status_ID=SC.Status_ID
						 							WHERE C.Customer_ID LIKE '".$customer_id."%' AND C.CustomerID!='".$cusid."'
					  							");
						$getfOwn = fetch_all_array($qMembers);
						closedb();
						foreach ($getfOwn as $family) {
							$gender = "";
							if($family['Gender_ID'] == 'F'){
								$gender = "Female";
							}else if($family['Gender_ID'] == 'M'){
								$gender = "Male";
							}else{
								$gender = "";
							}
								
					?>
						<tr>
		 					<td><?php echo $family['Last_Name'].', '.$family['First_Name']; ?></td>
		 					<td><?php echo $family['re']; ?></td>
		 					<td><?php echo $family['ssn'] ?></td>
		 					<td><?php echo $gender ?></td>
							<td><?php echo $family['stat'] ?></td>
		 					<td>
		 						<a style="cursor:pointer;" class="text-primary family-edit-btn" CusID="<?php echo $family['c_id'] ?>" data-value="<?php echo $family['CustomerID'] ?>"><i class="md md-edit md-fw col-sm-1"></i>&nbsp;edit</a>&emsp;
		 						<a style="cursor:pointer;" class="text-danger family-del-btn" data-value-c_id="<?php echo $family['c_id'] ?>" data-value-cid="<?php echo $family['CustomerID'] ?>"><i class="md md-delete md-fw"></i>&nbsp;delete</a>
		 					</td>
		 				</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php if(count($getfOwn)==0){ echo "<p class='text-warning'>No Data Found.</p>";} ?>
		</div>
	</div>

	<!--/end table-->

	<form class="form form-validate floating-label" novalidate="novalidate" id="formfamilytab">
		<input type="hidden" name="inf" class="inf" value="">
		<input type="hidden" name="cus_iD" id="cus_iD" value="<?php echo $cusidb; ?>">

		<input type="hidden" name="familyID" id="familyID" value="">
		<input type="hidden" name="CPID" id="CPID" class="CPID" value="">
		<input type="hidden" name="CID" id="CID" value="">
		<input type="hidden" name="BID" id="BID" class="BID" value="">
		<div class="card-body style-default-light">
    		<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="familyLastname" name="lastname" required data-rule-minlength="2" value="" required="required">
					<label for="Lastname">Lastname *</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="familyFirstname" name="firstname" required data-rule-minlength="3" value="" required="required">
					<label for="Firstname">Firstname *</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="familyMiddlename" name="middlename" required data-rule-minlength="3" value="">
					<label for="Middlename">Middlename</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<select id="familygender" name="gender" class="form-control" >
						<option value="" required="required">&nbsp;</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
					<label for="gender">Gender *</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control" name="dob" id="familybirthdate">
							<label>Birth Date</label>
						</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
						<input type="text" class="form-control" name="dllicense" id="familyDriverlicense">
						<label for="Dlicense">Driver License (DL)</label>
					</div>
				</div>
			<div class="col-sm-3">
				<div class="form-group">
<!-- 					<input type="text" class="form-control" maxlength="10" name="familyphone" id="familyphone"> -->
 						<input type="text" class="form-control" name="familyssnumber" id="thisfamilyssnumber">
					<label for="familyssnumber">SSN</label>
					</div>
				</div>			
				<div class="col-sm-3">
					<div class="form-group">
						<select class="form-control" name="dlstate" id="familydlstate">
							<option value="0">&nbsp;</option>
							<?php
								opendb();
								$qstate = mysqli_query($db,"SELECT * FROM united_states ORDER BY State_Abbreviation ASC");
								$pState = fetch_all_array($qstate);
								closedb();
								foreach($pState as $states){
							?>
								<option value="<?php echo $states['State_Abbreviation']; ?>"><?php echo $states['State_Abbreviation']; ?></option>
							<?php } ?>
						</select>
						<label for="dlstate">DL State</label>
					</div>
				</div>
				<!-- phone family members -->
				<div class="col-sm-12 phone-wrapper-fam">
					<!-- start -->
					<div class="col-sm-6" style="padding: 0;">
						<input type="hidden" name="familyphoneid" id="familyphoneid" value="">
						<div class="form-group">
							<div class="col-lg-12" style="padding: 0;">
								<div class="col-sm-5" style="padding: 0;">
									<div class="form-group">
										<select id="familyphonetype" name="familyphonetype[]" class="form-control">
											<option value="0" selected>&nbsp;</option>
											<option value="30">Work</option>
											<option value="40">Home</option>
											<option value="50">Business</option>
											<option value="60">Cellular</option>
										</select>
										<label for="familyphonetype"><b>Phone Type</b></label>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-content">
												<input type="text" class="form-control" maxlength="10" name="familyphone[]" id="familyphone">
												<label><b>Tel/Cell Number</b></label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end -->
				</div>
				<div class="col-sm-12">
					<span class="add_phone_group_fam" style="cursor:pointer;"><i class="md md-add-circle"></i> Add Phone #</span>
				</div>
				<!-- end of family members phone -->
				<div class="col-lg-12">
					<div class="col-sm-3" style="padding:0;">
						<div class="form-group">
							<select name="marital" id="familymarital" class="form-control">
								<option value="0" selected>&nbsp;</option>
								<?php
										foreach($marital_status as $marital){
											echo "<option value='".$marital['smid']."'>".$marital['smarital']."</option>";
										}
								?>
							</select>
							<label for="familymarital">Marital Status</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<select id="familyinsured" name="insured" class="form-control">
								<option value="">&nbsp;</option>
								<?php foreach($relations as $relation){
												echo '<option value="'.$relation['srid'].'">'.$relation['srship'].'</option>';
											}
								?>
							</select>
							<label for="insured">Relation</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<select id="familystatus" name="status" class="form-control">
								<option value="">&nbsp;</option>
								<?php
									foreach($stat as $status_customer){
										echo '<option value="'.$status_customer['scid'].'">'.$status_customer['scdesc'].'</option>';
									}
								?>
							</select>
							<label for="status">Status</label>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<textarea name="Bname" id="familyBname" class="form-control" rows="1"></textarea>
						<label>Business Name</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<select id="familysource" name="source" class="form-control">
							<option value="">&nbsp;</option>
							<?php
								foreach($source as $sc){
									echo '<option value="'.$sc['ssid'].'">'.$sc['ssource'].'</option>';
								}
							?>
							<option value="1">Source1</option>
						</select>
						<label for="source">Source</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<select id="familylanguage" name="language" class="form-control">
							<option value="">&nbsp;</option>
							<?php
								foreach($lang as $language){
									echo '<option value="'.$language['Language_ID'].'">'.$language['Language_Name'].'</option>';
								}

							?>
						</select>
						<label for="language">Language</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="email" class="form-control" id="familyemail" name="familyemail" required>
						<label for="familyemail">Email</label>
					</div>
				</div>

			<hr>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id=""><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>