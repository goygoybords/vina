<!-- if home data is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table dataTable table-condensed table-hover" id="hometable">
				<thead>
					<tr>
						<th>Address 1</th>
						<th>Address 2</th>
						<th>City</th>
						<th>State</th>
						<th>Zip Code</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php

				if(count($home_list)!=0){
					$count = 1;

					foreach($home_list as $homepolicy){
						$add = "";
						if($homepolicy['type']==1){ $add = "Main"; }else if($homepolicy['type']==2){ $add = "Secondary"; 
						}else if($homepolicy['type']==3){ $add = "Business"; }else if($homepolicy['type']==4){ $add = "Prior"; }
						echo '<tr>
							<td>'.$homepolicy['Address1'].'</td>
							<td>'.$homepolicy['Address2'].'</td>
							<td>'.$homepolicy['City'].'</td>
							<td>'.$homepolicy['State_ID'].'</td>
							<td>'.$homepolicy['Zip'].'</td>
							<td>'.$add.'</td>
							<td>
								<a style="cursor:pointer;" class="text-primary home-edit-btn" data-value="'.$homepolicy['HPID'].'"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;
								<a style="cursor:pointer;" class="text-danger home-del-btn" chp="'.$homepolicy['HPID'].'" chi="'.$homepolicy['chi'].'" caid="'.$homepolicy['caid'].'"><i class="fa fa-trash"></i>&nbsp;delete</a>
							</td>
						</tr>';
						}
				}
				?>
				</tbody>
			</table>
			<?php if(count($home_list)==0){ echo "<p class='text-warning'>No Data Found.</p>";} ?>
		</div>
	</div>
	<!--/end table-->

	<form class="form form-validate floating-label" novalidate="novalidate" id="homeform">
		<input type="hidden" name="inf" class="inf" id="cidddd" value="">
		<input type="hidden" id="caid" name="caid" class="inf" value="">
		<input type="hidden" id="chpid" name="chp" class="inf" value="">
		<input type="hidden" id="chiid" name="chi" class="inf" value="">

		<input type="hidden" id="cusids" name="cusids" value="<?php echo $cusid; ?>">
		<input type="hidden" id="cus_ids" name="cus_ids" value="<?php echo $cusidb; ?>">
		<div class="card-body style-default-light">
			<div class="col-sm-10">
				<div class="form-group">
					<div class="checkbox checkbox-styled">
						<div class="mine">
						<!-- <div class="col-sm-3">
							<label class="radio-inline radio-styled">
								<input type="radio" name="inlineRadioOptions" value="option1"><span> Primary Residence </span>
							</label>
						</div>
						<div class="col-sm-3">
							<label class="radio-inline radio-styled">
								<input type="radio" name="inlineRadioOptions" value="option2"><span> Rental </span>
							</label>
						</div>
						<div class="col-sm-3">
							<label class="radio-inline radio-styled">
								<input type="radio" name="inlineRadioOptions" value="option3"><span> Landlords </span>
							</label>
						</div>
						<div class="col-sm-3">
							<label class="radio-inline radio-styled">
								<input type="radio" name="inlineRadioOptions" value="option4"><span> Business </span>
							</label>
						</div> -->
						</div>
					</div>
				</div>

			</div>

			<br/><br/>
			<div class="col-sm-5">
				<div class="form-group">
					<input type="text" class="form-control" id="homeaddress1" name="address1" required data-rule-minlength="2">
					<label for="address1">Address 1 *</label>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
					<input type="text" class="form-control" id="homeaddress2" name="address2" required data-rule-minlength="3">
					<label for="address2">Address 2</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<select id="addtype" name="homeaddtype" class="form-control" id="homeaddtype">
						<option value="0">&nbsp;</option>
						<option value="1">Main</option>
						<option value="2">Secondary</option>
						<option value="3">Business</option>
						<option value="4">Prior</option>
					</select>
					<label for="homeaddtype">Address Type</label>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homecountry" name="country">
					<label for="country">Country </label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homecity" name="city">
					<label for="city">City *</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<select id="homestate" class="form-control" name="state">
						<option value="">&nbsp;</option>
						<?php opendb(); echo state_list($db); closedb(); ?>
					</select>
					<label for="state">State</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homezipcode" name="zipcode">
					<label for="zipcode">Zipcode *</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homebuilddate" name="builddate">
					<label for="builddate">Build Date</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homeroofdate" name="roofdate">
					<label for="zipcode">Roof Date</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homesqft" name="sqft">
					<label for="zipcode">Sq Ft.</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homelevels" name="levels">
					<label for="zipcode">Levels</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<!-- <input type="text" class="form-control" id="homegarage" name="garage"> -->

					<select id="homegarage" class="form-control" id="homegarage" name="garage">
						<option value="">&nbsp;</option>
						<?php  opendb(); echo garage_list($db); closedb(); ?>
					</select>
					<label for="zipcode">Garage</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homecapacity" name="capacity">
					<label for="zipcode">Capacity</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<!-- <input type="text" class="form-control" id="homeexteriorwall" name="exteriorwall"> -->
					<select id="homeexteriorwall" class="form-control" name="exteriorwall">
						<option value="">&nbsp;</option>
						<?php opendb(); echo exterior_wall_list($db); closedb(); ?>
					</select>
					<label for="zipcode">Exterior Wall</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="checkbox" id="homealarms" name="alarms">
					<label for="zipcode">Alarms</label>
				</div>
			</div>


			<div class="col-sm-4">
				<div class="form-group">
					<select id="homecarrier" name="carrier" class="form-control">
						<?php opendb(); echo carrier_list($db); closedb(); ?>
					</select>
					<label for="carrier">Carrier</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control" id="homeexpirationdate" name="expirationdate">
							<label>Expiration Date</label>
						</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" name="coverage" id="homecoverage">
					<label for="zipcode">Coverage</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" name="premium" id="homepremium">
					<label for="zipcode">Premium</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homedeductible" name="deductible">
					<label for="zipcode">Deductible</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homemedical" name="medical">
					<label for="zipcode">Medical</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homelossofuse" name="lossofuse">
					<label for="zipcode">Loss of Use</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="homeliability" name="liability">
					<label for="zipcode">Liability</label>
				</div>
			</div>
		</div><!--end .card-body -->

		<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>