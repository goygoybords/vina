<!-- if claim note is NOT EMPTY: show table else hidse-->


	<div class="card-body">

		<div class="table-responsive" style="min-height: auto;max-height: 300px;overflow-y: scroll;">

			<table class="table table-condensed table-hover  " id="ratingtbl">
				<thead>
					<th>Customer</th>
					<th>Assignee</th>
					<th>Score</th>
					<th>Grade</th>
					<th>Follow Up Date</th>
					<th>Review Date</th>
					<th>Referral</th>
					<th>Survey</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php 
					$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
					
					$sql = "SELECT c.RID, c.Customer_ID, c.Score, c.Grade, c.FollowUp, c.Review_Date,
					c.Referral_Lname, c.Referral_Fname,
					cu.Last_Name, cu.First_Name, 
							u.IBO_UserName, q.Question
							FROM customer_rating c
							JOIN customers cu
							ON c.Customer_ID = cu.Customer_ID
							JOIN user u
							ON c.AssignTo = u.IBO_UserID
							JOIN status_survey q
							ON c.Survey = q.Question_ID
							WHERE c.Customer_ID LIKE ? and c.is_active = 1
							ORDER BY 1 DESC";
					$cmd = $db->prepare($sql);
					$cmd->execute(array($customer_id."%"));
					$result = $cmd->fetchAll();	
				
					foreach($result as $r): 
				?>
				<tr>
					<td><?php echo $r['First_Name']." ".$r['Last_Name']; ?></td>
					<td><?php echo $r['IBO_UserName']; ?></td>
					<td><?php echo $r['Score']; ?></td>
					<td><?php echo $r['Grade']; ?></td>
					<td><?php echo date('Y-m-d', $r['FollowUp']); ?></td>
					<td><?php echo date('Y-m-d', $r['Review_Date']); ?></td> 
					<td><?php echo $r['Referral_Lname']." ".$r['Referral_Fname']; ?></td>
					<td><?php echo $r['Question']; ?></td>
					<td>
						<a style="cursor:pointer;" class="text-danger" id="ratingdelete" data-attr="<?php echo $r['RID']; ?>">
							<i class="fa fa-trash"></i>&nbsp;delete</a>

						<!-- <a href = "../ajaxrequest/customertabs_update/rating_tab_delete?id=<?php echo $r['RID'];?>&customer=<?php echo $_GET['ret']; ?>" 
						style="cursor:pointer;" 
						class="text-danger rating-del-btn" id="ratingdelete" onclick="return confirm('Are you sure you want to delete this record?');">
						<i class="fa fa-trash"></i>&nbsp;delete</a> -->
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
				<?php if(count($result)==0){ echo "<p class='text-warning'>No Data Found.</p>";} ?>
			</table>
		</div> 
	</div>

	<form class = "form form-validate floating-label" novalidate="novalidate" id = "rating-form">
	<!-- <form class="form form-validate floating-label" novalidate="novalidate" id="ratingform"> -->
		<div class="card-body style-default-light">
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="form-group">
						<select id="Customer" name="customer" class="form-control">
						<option value="">&nbsp;</option> 
						<?php
							opendb();
								$qfamiOwn = mysqli_query($db,"SELECT
								 							C.Last_Name,C.First_Name,C.CustomerID,C.Customer_ID
															FROM customers C
															WHERE C.Customer_ID LIKE '".$customer_id."%' OR C.CustomerID LIKE  '".$cusid."%'
														");

								$getfown = fetch_all_array($qfamiOwn);
							closedb();
								foreach($getfown as $famOwn){
							?>
								<option value="<?php echo $famOwn['Customer_ID']; ?>" ><?php echo $famOwn['Last_Name'].', '.$famOwn['First_Name']; ?></option>
								<?php } ?>
						</select>
						<label for="Customer">Customer</label>
					</div>
				</div>
				<div class="col-lg-8">
					<!-- <div class="col-lg-12"><label>Referral</label></div> -->
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="text" name="lname" id="lname" value="" class="form-control">
							<label for="lname">Last Name </label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="text" name="fname" id="fname" value="" class="form-control">
							<label for="fname">First Name </label>
						</div>
					</div>
				</div>
			</div>
			
			<!-- start of line two -->
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="form-group">
						<select name="score" id="score" class="form-control">
							<option></option>
							<?php $i=1; for($i; $i<=18; $i++){ ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<label for="score">Score</label>
					</div>
				</div>
				<div class="col-lg-8">
					<!-- <div class="col-lg-12"><label>Referral</label></div> -->
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<select name="grade" id="grade" class="form-control">
								<option></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								<option value="F">F</option>
							</select>
							<label for="grade">Grade</label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<select name="assign" id="assign" class="form-control">
								<option></option>
								<?php foreach($users as $us){ ?>
									<option value="<?php echo $us['IBO_UserID'] ?>"><?php echo $us['IBO_UserName'] ?></option>
								<?php } ?>
							</select>
							<label for="ass">Assign To</label>
						</div>
					</div>
				</div>
			</div>

			<!-- end of line two -->

			<!-- start of line 3 -->
			<div class="col-lg-12">
				<div class="col-lg-4">
					<div class="form-group">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-content form-group">
								<input type="text" class="form-control fdate" name="fdate" id="fdate">
								<label for="survey">Follow Up Date</label>
							</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>

				<div class="col-lg-8">
					<!-- <div class="col-lg-12"><label>Referral</label></div> -->
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<select name="survey" id="survey" class="form-control">
								<option></option>
								<?php foreach($status_survey as $surv){ ?>
									<option value="<?php echo $surv['Question_ID']; ?>"><?php echo $surv['Question']; ?></option>
								<?php } ?>
							</select>
						<label for="survey">Survey</label>
						</div>
					</div>
					
				</div>
			</div>

			<!-- end of line 3 -->

			<div class="col-lg-8">
			
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="col-lg-12"><label>Questions: </label></div>
					<?php foreach($status_q as $q): ?>
						<div class="checkbox checkbox-styled">
							<label>
								<input type="checkbox" name="question[]" id="question" value="<?php echo $q['Question_ID'] ?>">
								<span><?php echo $q['Question'] ?></span>
							</label>
						</div>
					<?php endforeach; ?>	
				</div>

			</div>
			<div class="col-lg-12">
				<!-- <div class="col-sm-3 form-group">
					<select id="ptype" name="ptype" class="form-control">
						<?php foreach($policytype as $ptype){ ?>
							<option value="<?php echo $ptype['Policy_Code'] ?>"><?php echo $ptype['Policy_Type'] ?></option>
						<?php } ?>
					</select>
					<label for="ptype">Policy Type </label>
				</div>
				<div class="col-sm-4 form-group">
						<select id="carrier" name="carrier" class="form-control">
							<?php opendb(); echo carrier_list($db); closedb(); ?>
						</select>
						<label for="carrier">Carrier</label>
				</div>
				<div class="col-sm-2 form-group">
						<input type="text" class="form-control" id="pnumber" name="pnumber" required data-rule-minlength="3">
						<label for="pnumber">Policy No.</label>
				</div> -->
				<!-- <div class="col-sm-2 form-group">
					<select id="status" name="status" class="form-control">
						<option value="0">&nbsp;</option>
						<option value="5"> Active</option>
						<option value="10"> Terminated</option>
						<option value="15"> Can Status</option>
						<option value="20"> Cancelled</option>
					</select>
					<label for="status">Status</label>
				</div>
				<div class="col-sm-3">
					<div class="form-group" id="forpamount">
						<input type="number" step="0.01" min="1" value="0.00" class="form-control" id="prem" name="prem" required data-rule-minlength="3">
						<label for="pamount">Premium($)</label>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group" id="forpamount">
						<input type="number" step="0.01" min="1" value="0.00" class="form-control" id="renew" name="renew" required data-rule-minlength="3">
						<label for="pamount">Renew Premium($)</label>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group control-width-normal">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-content">
								<input type="text" class="form-control bind_date" name="bind_date" id="datepicker">
								<label>Bind Date</label>
							</div>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div> -->
				<!-- <div class="col-sm-3">
					<div class="form-group control-width-normal">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-content">
								<input type="text" class="form-control expire_date" name="expire_date" id="datepicker">
								<label>Expiration Date</label>
							</div>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div> -->
			</div>
		</div>
		<div class="pull-right">
			<div class="form-group">
				<button name = "save" id = "btn-rating-save" 
				type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button> 
			</div>
		</div>		
	</form>


