<!-- if vehicle data is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table dataTable table-condensed table-hover" id="vehicletable">
				<thead>
					<tr>
						<th>ID#</th>
						<th>Manufacturer</th>
						<th>Model</th>
						<th>Year</th>
						<th>Make(Style)</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				 <?php $count = 1;
				if(count($vehicle)!=0){
					foreach($vehicle as $vehicle){
						echo '<tr>
							<td>'.$vehicle['vin'].'</td>
							<td>'.$vehicle['Manufacturer'].'</td>
							<td>'.$vehicle['Model'].'</td>
							<td>'.$vehicle['Model_Year'].'</td>
							<td>'."Temporary Make Style".'</td>
							<td>
								<a style="cursor:pointer;" class="text-primary vehicle-edit-btn" data-value="'.$vehicle['vpid'].'"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;
								<a style="cursor:pointer;" class="text-danger vehicle-del-btn" vehicID="'.$vehicle['caiVID'].'" data-value="'.$vehicle['vpid'].'"><i class="fa fa-trash"></i>&nbsp;delete</a>
							</td>
						</tr>';
						}
				}
				?>
				</tbody>
			</table>
			<?php if(count($vehicle)==0){ echo "<p class='text-warning'>No Data Found.</p>";} ?>
		</div>
	</div>
	<!--/end table-->

	<form class="form form-validate floating-label" id="formvehicletab" novalidate="novalidate">
		<input type="hidden" name="inf" class="inf" value="">
		<input type="hidden" name="vehicleid" id="vehicleID" value="">
		<input type="hidden" name="vehicleinfoid"  id="vehicleinfoID" value="">
		<input type="hidden" name="customerid"  value="<?php echo $cusid; ?>" id="CustomerID">
		<div class="card-body style-default-light">
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" name="vin" id="vehicleVIN" required data-rule-number="true">
					<label for="Lastname">Vehicle Identification No.</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<select id="vehiclemanufacturer" name="manufacturer" class="form-control">
						<option value="">&nbsp;</option>
						<?php
							opendb();
							$query = mysqli_query($db, "SELECT * FROM `mfg_vehicle`" );

							$getexterior_wall = fetch_all_array($query);
							closedb();
							foreach($getexterior_wall as $wall){
								echo "<option value='".$wall['MFG_ID']."'>".$wall['Manufacturer']."</option>";
							}
							?>
					</select>
					<label for="manufacturer">Manufacturer</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="vehiclemodel" name="model" required data-rule-minlength="3">
					<label for="vehiclemodel">Model</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<input type="text" class="form-control" id="vehiclemodelyear" name="modelyear" required data-rule-minlength="3">
					<label for="Middlename">Model Year</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<select id="vehiclecarrier" name="carrier" class="form-control">
						<option value="">&nbsp;</option>
						<?php opendb(); echo carrier_list($db); closedb(); ?>
					</select>
					<label for="carrier">Carrier</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control" id="vehicleexpirationdate" name="expirationdate">
							<label>Expiration Date</label>
						</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<input type="text" class="form-control" id="vehiclepremium" name="premium" required data-rule-minlength="3">
					<label for="Middlename">Premium</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehicleterm" name="term" class="form-control">
						<option value="">&nbsp;</option>
						<option value="6">6</option>
						<option value="12">12</option>
					</select>
					<label for="Middlename">Term</label>
				</div>
			</div>
			<!-- <div class="col-sm-2">
			Term
			</br>
				<label class="radio-inline radio-styled">
					<input type="radio" id="vehicleterm6" name="term" value="6"><span>6</span>
				</label>
				<label class="radio-inline radio-styled">
					<input type="radio" id="vehicleterm12" name="term" value="12"><span>12</span>
				</label>
			</div> -->
			<div class="col-sm-4">
				<div class="form-group">
					<select id="vehiclebodyinjury" name="bodyinjury" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="25/50">25/50</option>
						<option value="30/60">30/60</option>
						<option value="50/100">50/100</option>
						<option value="100/300">100/300</option>
						<option value="200/300">200/300</option>
						<option value="250/500">250/500</option>
						<option value="300/300">300/300</option>
						<option value="300/500">300/500</option>
						<option value="500/500">500/500</option>
						<option value="500/1000">500/1000</option>
					</select>
					<label for="Middlename">Body Injury</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<select id="vehicleproperty" name="property" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="150">150</option>
						<option value="200">200</option>
						<option value="250">250</option>
						<option value="300">300</option>
						<option value="400">400</option>
						<option value="500">500</option>
					</select>
					<label for="Middlename">Property</label>
				</div>
			</div>

			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehiclecollision" name="collision" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="150">150</option>
						<option value="200">200</option>
						<option value="250">250</option>
						<option value="500">500</option>
						<option value="600">600</option>
						<option value="700">700</option>
						<option value="750">750</option>
						<option value="1000">1000</option>
						<option value="1250">1250</option>
						<option value="1500">1500</option>
						<option value="2000">2000</option>
					</select>
					<label for="Middlename">Collis</label>
				</div>
			</div>

			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehiclecomp" name="comp" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="150">150</option>
						<option value="200">200</option>
						<option value="250">250</option>
						<option value="500">500</option>
						<option value="600">600</option>
						<option value="700">700</option>
						<option value="750">750</option>
						<option value="1000">1000</option>
						<option value="1250">1250</option>
						<option value="1500">1500</option>
						<option value="2000">2000</option>
					</select>
					<label for="Middlename">Comp</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehiclemedical" name="medical" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="1000">1000</option>
						<option value="2000">2000</option>
						<option value="5000">5000</option>
						<option value="10000">10000</option>
						<option value="250000">250000</option>
						<option value="750000">750000</option>
						<option value="100000">100000</option>
					</select>
					<label for="Middlename">Medical</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehiclepip" name="pip" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="2500">2500</option>
						<option value="5000">5000</option>
						<option value="10000">10000</option>
						<option value="250000">250000</option>
						<option value="500000">500000</option>
						<option value="750000">750000</option>
						<option value="100000">100000</option>
					</select>
					<label for="Middlename">PIP</label>
				</div>
			</div>

			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehiclerental" name="rental" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="20">20</option>
						<option value="25">25</option>
						<option value="30">30</option>
						<option value="35">35</option>
						<option value="40">40</option>
						<option value="45">45</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>
					<label for="Middlename">Rental</label>
				</div>
			</div>

			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehicletowing" name="towing" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="50">50</option>
						<option value="80">80</option>
						<option value="120">120</option>
					</select>
					<label for="Middlename">Towing</label>
				</div>
			</div>

			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehiclebody" name="body2" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="25/50">25/50</option>
						<option value="30/60">30/60</option>
						<option value="50/100">50/100</option>
						<option value="100/300">100/300</option>
						<option value="200/300">200/300</option>
						<option value="250/500">250/500</option>
						<option value="300/300">300/300</option>
						<option value="300/500">300/500</option>
						<option value="500/500">500/500</option>
						<option value="500/1000">500/1000</option>
					</select>
					<label for="Middlename">Body</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<select id="vehicleproperty" name="property2" class="form-control">
						<option value="">&nbsp;</option>
						<option value="0">0</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="150">150</option>
						<option value="200">200</option>
						<option value="250">250</option>
						<option value="300">300</option>
						<option value="400">400</option>
						<option value="500">500</option>
					</select>
					<label for="Middlename">Property</label>
				</div>
			</div>

			<div class="col-sm-2">

			</div>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>