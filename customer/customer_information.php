<?php
	session_start();
	
if(isset($_SESSION['userID']))
{

	@$uname = $_SESSION['userN'];
	@$userid = $_SESSION['userID'];
	@$alvl = $_SESSION['userALvl'];
	@$fn = $_SESSION['fn'];
	@$ln = $_SESSION['ln'];
	
	set_include_path('../include');
	
	include 'start.html';
	require('header.php');
	require("db/dbconnect.php");
	opendb();
	// customer lists
	include("../pscripts/customer/customer_lists.php");

	@$lang = languages($db);
	@$source = status_source($db);
	@$relations = status_relation($db);
	@$marital = status_marital($db);
	@$stat = status_customer($db);
	@$policytype = policy_type($db);
	@$status_qoute = status_qoute($db);
	@$users = user($db);
	@$pState = states($db);
	@$autoViolation = auto_violation($db);
	@$marital_status = status_marital($db);
	@$status_survey = status_survey($db);
	@$status_q = status_q($db);
	if(isset($_GET['ret']))
	{
		@$cusid = $_GET['ret'];
		if($cusid!='' || $cusid!=null)
		{
			@$customers_info = customers_info($db,$cusid);
			@$naic = business_name($db, $cusid);
			@$cusidb = $customers_info['customerids'];
			@$policy = customers_policy($db,$cusidb);
			@$claim = customer_claim($db,$cusid);
			@$qouteC = customer_quotes($db, $cusid);
			@$customers = customers($db,$cusid);
			@$listfam = family_list($db, $cusid);
			@$vehicle = vehicle_list($db,$cusidb);
			@$notes = customer_note($db, $cusidb);
			@$home_list = home_list($db,$cusidb);
		}

	}else{
		@$naic = business_name($db, $cusid);
		@$policy = customers_policy($db,$cusidb=0);
		@$claim = customer_claim($db,$cusid);
		@$customers_info = customers_info($db,$cusid);
		@$customers = customers($db,$cusid);
		@$qouteC = customer_quotes($db, $cusid=0);
		@$listfam = family_list($db, $cusid);
		@$vehicle = vehicle_list($db,$cusidb);
		@$notes = customer_note($db, $cusidb);
		@$home_list = home_list($db,$cusid);
	}
	
	closedb();
		
	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * from campaign WHERE active = 1";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
																
	$customer_id = substr($cusidb,0,-3);
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
				<div class="row">
					<div class="col-lg-offset-0 col-md-12">
						<div class="card card-underline">
							<div class="card-head">
								<header><i class="fa fa-fw fa-group"></i> Customer Information </header>
							</div><!--end .card-head -->
							<div class="card-body">
								<div id="msg_inf"></div>

								<div class="col-lg-12 col-md-12 col-sm-12">
									<form class="form form-validate floating-label" novalidate="novalidate" id="customer_add_top">
										<input type="hidden" name="inf" id="inf" value="<?php echo $cusid; ?>">
										<input type="hidden" name="c_ids" id="c_ids" value="<?php echo $cusidb; ?>">
										<input type="hidden" name="userid" id="userid" class="useridD" value="<?php echo $userid; ?>">
<!-- 										<div class="card-body style-default-light"> -->
											<div class="card-body">
							        		<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="lname" class="form-control" id="lname" required data-rule-minlength="2" value="<?php echo $customers_info['customerlname']; ?>">
													<label for="Lastname">Lastname *</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="fname" class="form-control" id="fname" required data-rule-minlength="3" value="<?php echo $customers_info['customerfname']; ?>">
													<label for="Firstname">Firstname *</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="mname" class="form-control" id="mname" required data-rule-minlength="3" value="<?php echo $customers_info['customermname']; ?>">
													<label for="Middlename">Middlename</label>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<select id="gender" name="gender" class="form-control">
														<option value="" selected>&nbsp;</option>
														<option value="M" <?php if($customers_info['customergender']=="M"){ echo "selected"; } ?>>Male</option>
														<option value="F" <?php if($customers_info['customergender']=="F"){ echo "selected"; } ?>>Female</option>
													</select>
													<label for="gender">Gender *</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group control-width-normal">
													<div class="input-group date" data-provide="datepicker">
														<div class="input-group-content">
															<?php

																if($customers_info['customerdbo']!='' || $customers_info['customerdbo']!=NULL || $customers_info['customerdbo']!=0)
																{
																	$dob = @date('m/d/Y', $customers_info['customerdbo']);
																}else{
																	$dob = "";
																}
															 ?>
															<input type="text" class="form-control" name="dob" id="datepicker" value="<?php echo $dob; ?>">
															<label>Birth Date</label>
														</div>
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													</div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<input type="text" class="form-control" name="dlicense" maxlength="20" id="Driverlicense" value="<?php 
															if($customers_info['DL']!=""){
															echo sprintf( '%08d', $customers_info['DL'] );	
															} ?> ">
													<label for="Dlicense">Driver License (DL)</label>
													</div>
												</div>
											<div class="col-lg-3">
												<div class="form-group">
													<input type="text" class="form-control" name="ssnumber" maxlength="20" id="ssnumber" value="<?php echo $customers_info['ssn']; ?>">
													<label for="Ssn">SSN</label>
													</div>
												</div>											
												<div class="col-sm-3">
													<div class="form-group">
														<select class="form-control" name="dlstate" id="dlstate">
															<option value="0">&nbsp;</option>
															<?php
																foreach($pState as $states){
															?>
																<option value="<?php echo $states['State_Abbreviation']; ?>" <?php if($states['State_Abbreviation']==$customers_info['cdlstate']){ echo "selected"; } ?>><?php echo $states['State_Abbreviation']; ?></option>
															<?php } ?>
														</select>
														<label for="dlstate">DL State</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">

														<select id="marital" name="marital" class="form-control">
															<option value="" selected>&nbsp;</option>
															<?php foreach($marital as $mar){ ?>
															<option value="<?php echo $mar['smid']; ?>" <?php if($customers_info['smaritalID']==$mar['smid']){ echo "selected"; } ?>><?php echo $mar['smarital']; ?></option>
															<?php } ?>
														</select>
														<label for="marital">Marital Status</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="insured" name="insured" class="form-control">
															<?php foreach ($relations as $re) { ?>
															<option value="<?php echo $re['srid']; ?>" <?php if($re['srid']==$customers_info['customerelationid']){ echo "selected"; }?>><?php echo $re['srship']; ?></option>
															<?php } ?>
														</select>
														<label for="insured">Relation</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="status" name="status" class="form-control">
															<option value="" selected>&nbsp;</option>
														<?php foreach($stat as $cstat){ ?>
															<option value="<?php echo $cstat['scid']; ?>" <?php if($cstat['scid']==$customers_info['customerstat']){ echo "selected"; } ?>><?php echo $cstat['scdesc']; ?></option>
														<?php } ?>
														</select>
														<label for="status">Status</label>
													</div>
												</div>

												<div class="col-sm-12">
													<div class="form-group">
														<textarea name="bname" id="bname" class="form-control" rows="3"><?php echo $customers_info['businessname']; ?></textarea>
														<label>Business Name</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="source" name="source" class="form-control">
															<option value="" selected>&nbsp;</option>
															<?php foreach($source as $src){ ?>
															<option value="<?php echo $src['ssid']; ?>" <?php if($src['ssid']==$customers_info['customersourceid']){ echo "selected"; } ?>><?php echo $src['ssource']; ?></option>
															<?php } ?>
														</select>
														<label for="source">Source</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="language" name="language" class="form-control">
															<option value="" selected>&nbsp;</option>
															<?php foreach ($lang as $lan) { ?>
															<option value="<?php echo $lan['Language_ID']; ?>" <?php if($lan['Language_ID']==$customers_info['customerlang']){ echo "selected"; } ?>><?php echo $lan['Language_Name']; ?></option>
															<?php } ?>
														</select>
														<label for="language">Language</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="email" class="form-control" name="email" id="email" required value="<?php echo $customers_info['customeremail']; ?>">
														<label for="email">Email</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group control-width-normal">
													<?php
														if($customers_info['customerdatereview']!='' || $customers_info['customerdatereview']!=0 || $customers_info['customerdatereview']!=NULL )
														{
															$revDate = @date('m/d/Y', $customers_info['customerdatereview']);
														}else{
															$revDate = '';
														}
													 ?>
														<div class="input-group date" data-provide="datepicker">
															<div class="input-group-content">
																<input type="text" class="form-control" name="followupdate" id="datepicker" value="<?php echo $revDate; ?>">
																<label>Follow up Date</label>
															</div>
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														</div>
													</div>
												</div>

												<div class="phone-wrapper">
													<div class="col-wrapper col-sm-12">
															<div class="col-lg-12">
																<div class="col-sm-3">
													<div class="form-group control-width-normal">
														<div class="form-group" >
															<div class="input-group-content">
															
																<select id = "campaign_id" name = "campaign_id" class = "form-control dirty">
																	<option></option>
																		<?php foreach ($result as $r ) : ?>
																		<option value = "<?php echo $r['campaign_id'] ?>" <?php if($r['campaign_id'] == $customers_info['campaign_id']) echo "selected";  ?> > <?php echo $r['title']; ?></option>
																	<?php endforeach; ?>
																</select>
																<label>Choose Campaign</label>
															</div>
							
														</div>
													</div>
												</div>

															</div>
														<input type="hidden" name="phoneid" id="phoneid" value="<?php echo $customers_info['phoneid']; ?>">
													<?php if(!is_array(isJson($customers_info['cphone']))){ ?>
														
															<div class="col-lg-12">
															<div class="col-sm-3" style="padding:0;">
																<div class="form-group">
																	<select id="phonetype" name="phonetype[]" class="form-control">
																		<option value="0" selected>&nbsp;</option>
																		<option value="30" <?php if($customers_info['cphonetype']==30){ echo "selected"; } ?>>Work</option>
																		<option value="40" <?php if($customers_info['cphonetype']==40){ echo "selected"; } ?>>Home</option>
																		<option value="50" <?php if($customers_info['cphonetype']==50){ echo "selected"; } ?>>Business</option>
																		<option value="60" <?php if($customers_info['cphonetype']==60){ echo "selected"; } ?>>Cellular</option>
																	</select>
																	<label for="phonetype"><b>Phone Type</b></label>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<div class="input-group">
																		<div class="input-group-content">
																			
																			<input type="text" maxlength="10" class="form-control" name="phone[]" id="phone" value="<?php echo $customers_info['cphone']; ?>">
																			
																			<label><b>Tel/Cell Number</b></label>
																		</div>
																	</div>
																</div>
															</div>
															</div>
														<?php }else{ ?>
															
														<?php $count = 0; for($c = 0 ; $c < count(json_decode($customers_info['cphone'])) ; $c++){ $count++;
								                              $conts = json_decode($customers_info['cphone']);
								                              $type = json_decode($customers_info['cphonetype']);
								                             ?> 
								                            <div class="col-lg-12" style="padding-left:0;margin-left:0;" id="parent">
								                            <?php if($count!=1) { ?><a style="cursor:pointer;" class="text-danger pull-left" id="delPhone" title="click to delete phone number" style="font-weight:larger;margin: -1em 0;">x</a><?php } ?>
														    <div class="col-sm-3" style="padding:0;">
																<div class="form-group">
																	<select id="phonetype" name="phonetype[]" class="form-control">
																		<option value="0" selected>&nbsp;</option>
																		<option value="30" <?php if($type[$c]==30){ echo "selected"; } ?>>Work</option>
																		<option value="40" <?php if($type[$c]==40){ echo "selected"; } ?>>Home</option>
																		<option value="50" <?php if($type[$c]==50){ echo "selected"; } ?>>Business</option>
																		<option value="60" <?php if($type[$c]==60){ echo "selected"; } ?>>Cellular</option>
																	</select>
																	<label for="phonetype"><b>Phone Type</b></label>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<div class="input-group">
																		<div class="input-group-content">
																			<input type="text" maxlength="10" class="form-control" name="phone[]" id="phone" value="<?php echo $conts[$c]; ?>">
																			
																			<label><b>Tel/Cell Number</b></label>
																		</div>
																	</div>
																</div>
															</div>
															</div>
								                         <?php }
													 	 } ?>
														
													</div>
												</div>
												<!-- add phone number button -->
														<span class="add_phone_group"><i class="md md-add-circle"></i> Add Phone #</span>
										</div>
										<div class="pull-right">
											<div class="form-group">
												<a href="" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Refresh Page</a>
												<button type="submit" class="btn ink-reaction btn-raised btn-success savedtop"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
											</div>
										</div>

									</form>
								</div>
							</div>
					<!--end information-->
						<?php if(!isset($_GET['ret']) && empty($_GET['ret'])){ $style="style='display:none'"; }else{ $style=""; } ?>
							<div class="card-body" id="tabsinfo" <?php echo $style; ?>>
								<div class="col-md-12">
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
												<li><a href="#rating">Rating</a></li>
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
											<div class="tab-pane" id="rating"><?php include '../forms/rating_form.php'; ?></div>
											<div class="tab-pane" id="notes"><?php include '../forms/note_form.php'; ?></div>
											<div id="familyrefresh">
												<button class="btn btn-primary btn-sm ref"><i class="fa fa-spinner fa-spin"></i> Refresh form</button>
											</div>
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
	include('sidebar.php');
	include('end.html');
?>

<script type="text/javascript" src="../assets/custom/customer_add_top.js"></script>
<script type="text/javascript" src="../assets/custom/js/policy.js"></script>

<script type="text/javascript" src="../assets/custom/js/claim.js"></script>
<script type="text/javascript" src="../assets/custom/js/note.js"></script>
<script type="text/javascript" src="../assets/custom/js/rating.js"></script>
<script type="text/javascript" src="../assets/custom/js/quote2.js"></script>

<script>
	$('.dataTable#notetbl').dataTable({
        "aaSorting": [[4,'DESC']]
	});
	$.fn.dataTable.ext.errMode = 'none';
	$('.dataTable').dataTable();
	$('.dataTable').dataTable({
		"orderCellsTop": true,
        "aLengthMenu": [[10, 25, 50, -1],[ 10, 25, 50, 'All']],
        "iDisplayLength": 10
	});

</script>
<?php }else{ ?>
	<p class="text-warning">Oopps! This page is empty! Redirecting.....</p>
<?php  echo"<meta http-equiv='refresh' content='0; URL=/'>"; } ?>