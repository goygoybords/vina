<!-- if violation data is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table dataTable table-condensed table-hover" id="violationtable">
				<thead>
					<tr>
						<th>Driver</th>
						<th>Violation</th>
						<th>Date</th>
						<th>Amount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php //@$vio = violation_list($db,$cusid); $count = 1;

					// $qclaim = mysqli_query($db,"SELECT  DISTINCT(CAV.Customer_ID),CAV.id as cavid, C.Last_Name,
					// 									C.First_Name,
					// 									AV.Violation,
					// 									CAV.Violation_Date,
					// 									CAV.Violation_Amount
					// 									FROM customer_auto_violation CAV
					// 									LEFT JOIN customers C on CAV.Customer_ID=C.Customer_ID
					// 									LEFT JOIN customer_network CN on (CN.CustomerID = C.CustomerID OR CN.CustomerIDOrigin = C.CustomerID)
					// 									LEFT JOIN auto_violation AV on CAV.VT_ID=AV.VT_ID
					// 									WHERE ( CN.CustomerID='".$cusid."' OR CN.CustomerIDOrigin='".$cusid."' )							
					// 					");
					// $getCl = fetch_all_array($qclaim);
					// if(count($getCl)!=0){
					// 	foreach($getCl as $violation){
					// 				echo '<tr>
					// 					<td>'.$violation['Last_Name'].', '.$violation['First_Name'].'</td>
					// 					<td>'.$violation['Violation'].'</td>
					// 					<td>'.strftime("%m/%d/%Y",$violation['Violation_Date']).'</td>
					// 					<td>$'.$violation['Violation_Amount'].'</td>
					// 					<td>
					// 						<a style="cursor:pointer;" class="text-primary violation-edit-btn" data-value="'.$violation	['cavid'].'"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;
					// 						<a style="cursor:pointer;" class="text-danger violation-del-btn" data-value="'.$violation['cavid'].'"><i class="fa fa-trash "></i>&nbsp;delete</a>
					// 					</td>
					// 				</tr>';
					// 	}
					// }
				?>
				<?php
					opendb();
					$qclaimV = mysqli_query($db, " SELECT CAV.id as cavid, C.Last_Name,
														C.First_Name,
														AV.Violation,
														CAV.Violation_Date,
														CAV.Violation_Amount
														FROM customer_auto_violation CAV
														LEFT JOIN customers C on CAV.Customer_ID=C.Customer_ID
														LEFT JOIN auto_violation AV on CAV.VT_ID=AV.VT_ID
					 									WHERE C.Customer_ID LIKE '".$customer_id."%'
				  							");
					$getV = fetch_all_array($qclaimV);
					closedb();
					foreach ($getV as $violation) {
							
					?>
						<tr>
		 					<td><?php echo $violation['Last_Name'].', '.$violation['First_Name'] ?></td>
							<td><?php echo $violation['Violation'] ?></td>
							<td><?php echo @date("m/d/Y",$violation['Violation_Date']) ?></td>
							<td>$<?php echo $violation['Violation_Amount'] ?></td>
							<td>
								<a style="cursor:pointer;" class="text-primary violation-edit-btn" data-value="<?php echo $violation['cavid'] ?>"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;
								<a style="cursor:pointer;" class="text-danger violation-del-btn" data-value="<?php echo $violation['cavid'] ?>"><i class="fa fa-trash "></i>&nbsp;delete</a>
							</td>
		 				</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php if(count($getV)==0){ echo "<p class='text-warning'>No Data Found.</p>";} ?>
		</div>
	</div>
	<!--/end table-->

	<form class="form form-validate floating-label" id="violationform" novalidate="novalidate">
		<input type="hidden" name="inf" class="inf" value="">
		<input type="hidden" id="violationid" name="violationid" class="inf" value="">
		<input type="hidden" name="vioCID" id="vioCID" value="">

		<div class="card-body style-default-light">
			<div class="col-sm-3">
				<div class="form-group">
					<select id="violationdriver" name="violationdriver" class="form-control">
						<option value="">&nbsp;</option>
						<!-- owner -->
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
					<label for="Lastname">Driver</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<select id="violation" name="violation" class="form-control">
						<option value="">&nbsp;</option>
						<?php opendb(); echo list_of_violation($db); closedb(); ?>
					</select>
					<label for="violation">Violation</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control" id="violationdate" name="violationdate">
							<label>Violation Date</label>
						</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="violationamount" required data-rule-number="true" name="violationamount">
					<label for="carrier">Violation Amount</label>
				</div>
			</div>

		</div>
		<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>