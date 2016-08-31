<?php
	include '../include/start.html'; 
	include '../include/header.php';
	$policy = '';
	$claim = '';
	$cusid='';
?>	
		

<!-- BEGIN BASE-->
<div id="base">

	<!-- BEGIN OFFCANVAS LEFT -->
	<div class="offcanvas">
	</div><!--end .offcanvas-->
	<!-- END OFFCANVAS LEFT -->

	<!-- BEGIN CONTENT-->
	<div id="content">

		<!-- BEGIN Customer content -->
		<section>
			<div class="section-body">
				<!-- Button - add new customer and add family memmbers -->
				<div class="row">
					<div class="col-lg-offset-1 col-md-10">
						<div class="card card-underline">
							<div class="card-head">
								<header><i class="fa fa-fw fa-group"></i> Add New Customer</header>
							</div><!--end .card-head -->
							<div class="card-body">
								<div class="col-lg-offset-1 col-md-10">
									<form class="form form-validate floating-label" novalidate="novalidate">
										<div class="card-body style-default-light">
							        		<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" id="Lastname" required data-rule-minlength="2">
													<label for="Lastname">Lastname *</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" id="Firstname" required data-rule-minlength="3" >
													<label for="Firstname">Firstname *</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" id="Middlename" required data-rule-minlength="3">
													<label for="Middlename">Middlename</label>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<select id="select1" name="gender" class="form-control">
														<option value="">&nbsp;</option>
														<option value="30">Male</option>
														<option value="40">Female</option>
													</select>
													<label for="gender">Gender *</label>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group control-width-normal">
													<div class="input-group date" data-provide="datepicker">
														<div class="input-group-content">
															<input type="text" class="form-control" id="datepicker">
															<label>Birth Date</label>
														</div>
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
														<input type="text" class="form-control" id="Driverlicense">
														<label for="Dlicense">Driver License (DL)</label>
													</div>
												</div>
											<div class="col-sm-2">
												<div class="form-group">
														<input type="text" class="form-control" id="ssn" name="ssn">
														<label for="sssn">SSN</label>
													</div>
												</div>											
												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" class="form-control" id="dlstate">
														<label for="dlstate">DL State</label>
													</div>
												</div>												
												<div class="col-sm-3">
													<div class="form-group">
														<select id="marital" name="marital" class="form-control">
															<option value="">&nbsp;</option>
															<option value="30">Single</option>
															<option value="40">Married</option>
															<option value="40">Complicated</option>
														</select>
														<label for="marital">Marital Status</label>
													</div>
												</div>	
												<div class="col-sm-3">
													<div class="form-group">
														<select id="insured" name="insured" class="form-control">
															<option value="">&nbsp;</option>
															<option value="30">Insured</option>
															<option value="40">Uninsured</option>
														</select>
														<label for="insured">Relation</label>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<select id="status" name="status" class="form-control">
															<option value="">&nbsp;</option>
															<option value="1">Status1</option>
														</select>
														<label for="status">Status</label>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<textarea name="Bname" id="Bname" class="form-control" rows="1"></textarea>
														<label>Business Name</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="source" name="source" class="form-control">
															<option value="">&nbsp;</option>
															<option value="1">Source1</option>
														</select>
														<label for="source">Source</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="language" name="language" class="form-control">
															<option value="">&nbsp;</option>
															<option value="30">English</option>
															<option value="40">French</option>
														</select>
														<label for="language">Language</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<input type="email" class="form-control" id="email" required>
														<label for="email">Email</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group control-width-normal">
														<div class="input-group date" data-provide="datepicker">
															<div class="input-group-content">
																<input type="text" class="form-control" id="datepicker">
																<label>Follow up Date</label>
															</div>
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														</div>
													</div>
												</div>
												<div class="phone-wrapper">
													<div class="col-wrapper col-sm-12">
														<div class="col-sm-3">
															<div class="form-group">
																<select id="marital" name="marital" class="form-control">
																	<option value="">&nbsp;</option>
																	<option value="30">Work</option>
																	<option value="40">Home</option>
																	<option value="40">Business</option>
																</select>
																<label for="marital">Phone Type</label>
															</div>
														</div>													
														<div class="col-sm-3">
															<div class="form-group">
																<div class="input-group">
																	<div class="input-group-content">
																		<input type="text" class="form-control" id="add">
																		<label>Phone Number(s)</label>
																	</div>
																</div>
															</div>
														</div>
														<span class="add_phone_group"><i class="md md-add-circle"></i></span>
													</div>
												</div>											
										</div>
										<div class="pull-right">
											<div class="form-group">
												<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
											</div>
										</div>
										
									</form>
								</div>
							</div>
					<!--end information-->

							<div class="card-body">
								<div class="col-lg-offset-1 col-md-10">
									<div class="card">
										<div class="card-head">
											<ul class="nav nav-tabs" data-toggle="tabs">
												<li class="active"><a href="#family">Family</a></li>
												<li><a href="#home">Home</a></li>
												<li><a href="#vehicle">Vehicle</a></li>
												<li><a href="#violation">Violation</a></li>
												<li><a href="#claim">Claim</a></li>
												<li><a href="#quote">Quote</a></li>
												<li><a href="#policy">Policy</a></li>
												<li><a href="#notes">Note</a></li>
											</ul>
										</div>
										<div class="card-body tab-content">
											<div class="tab-pane active" id="family"><?php include '../forms/family_form.php'; ?></div>
											<div class="tab-pane" id="home"><?php include '../forms/home_form.php'; ?></div>
											<div class="tab-pane" id="vehicle"><?php include '../forms/vehicle_form.php'; ?></div>
											<div class="tab-pane" id="violation"><?php include '../forms/violation_form.php'; ?></div>
											<div class="tab-pane" id="claim"><?php include '../forms/claim_form.php'; ?></div>
											<div class="tab-pane" id="quote"><?php include '../forms/quote_form.php'; ?></div>
											<div class="tab-pane" id="policy"><?php include '../forms/policy_form.php'; ?></div>
											<div class="tab-pane" id="notes"><?php include '../forms/note_form.php'; ?></div>
										</div>
									</div>
								</div>
							</div>
						<!-- end tabs -->
						</div>
					</div><!--end .card -->	
				</div>
			</div>
		</section>
	</div><!--end #content-->
	<!-- END CONTENT -->
</div>
<!-- END BASE -->

<?php 
	include '../include/sidebar.php'; 
	include '../include/end.html';
?>