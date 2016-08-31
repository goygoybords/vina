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
	@$pState = states($db);


	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
		$sql = "SELECT * from campaign WHERE active = 1";
		$cmd = $db->query($sql);
		$result = $cmd->fetchAll();
																
	closedb();
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
								<div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10" id="msg_inf">

								</div>

								<div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10">
									<form class="form form-validate floating-label" novalidate="novalidate" id="customer_add_top">
										<div class="card-body style-default-light">
							        		<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="lname" class="form-control" id="lname" required data-rule-minlength="2" value="">
													<label for="Lastname">Lastname *</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="fname" class="form-control" id="fname" required data-rule-minlength="3" value="">
													<label for="Firstname">Firstname *</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="mname" class="form-control" id="mname" required data-rule-minlength="3" value="">
													<label for="Middlename">Middlename</label>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<select id="gender" name="gender" class="form-control">
														<option value="" selected>&nbsp;</option>
														<option value="M">Male</option>
														<option value="F">Female</option>
													</select>
													<label for="gender">Gender *</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group control-width-normal">
													<div class="input-group date" data-provide="datepicker">
														<div class="input-group-content">
															<input type="text" class="form-control" name="dob" id="datepicker" value="">
															<label>Birth Date</label>
														</div>
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<input type="text" class="form-control" name="dlicense" maxlength="20" id="Driverlicense" value="">
													<label for="Dlicense">Driver License (DL)</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select class="form-control" name="dlstate" id="dlstate">
															<option value="0">&nbsp;</option>
															<?php
																foreach($pState as $states){
															?>
																<option value="<?php echo $states['State_Abbreviation']; ?>"><?php echo $states['State_Abbreviation']; ?></option>
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
															<option value="<?php echo $mar['smid']; ?>"><?php echo $mar['smarital']; ?></option>
															<?php } ?>
														</select>
														<label for="marital">Marital Status</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="insured" name="insured" class="form-control">
															<?php foreach ($relations as $re) { ?>
															<option value="<?php echo $re['srid']; ?>"><?php echo $re['srship']; ?></option>
															<?php } ?>
														</select>
														<label for="insured">Relation</label>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<select id="status" name="status" class="form-control">
															<option value="" selected>&nbsp;</option>
														<?php foreach($stat as $cstat){ ?>
															<option value="<?php echo $cstat['scid']; ?>"><?php echo $cstat['scdesc']; ?></option>
														<?php } ?>
														</select>
														<label for="status">Status</label>
													</div>
												</div>

												<div class="col-sm-4">
													<div class="form-group">
														<textarea name="bname" id="bname" class="form-control" rows="3"></textarea>
														<label>Business Name</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<select id="source" name="source" class="form-control">
															<option value="" selected>&nbsp;</option>
															<?php foreach($source as $src){ ?>
															<option value="<?php echo $src['ssid']; ?>"><?php echo $src['ssource']; ?></option>
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
															<option value="<?php echo $lan['Language_ID']; ?>"><?php echo $lan['Language_Name']; ?></option>
															<?php } ?>
														</select>
														<label for="language">Language</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<input type="email" class="form-control" name="email" id="email" required value="">
														<label for="email">Email</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group control-width-normal">
														<div class="input-group date" data-provide="datepicker">
															<div class="input-group-content">
																<input type="text" class="form-control" name="followupdate" id="datepicker" value="">
																<label>Follow up Date</label>
															</div>
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														</div>
													</div>
												</div>

												<div class="col-sm-2">
													<div class="form-group control-width-normal">
														<div class="form-group" >
															<div class="input-group-content">
															
																<select id = "campaign_id" name = "campaign_id" class = "form-control dirty">
																	<option></option>
																		<?php foreach ($result as $r ) : ?>
																		<option value = "<?php echo $r['campaign_id'] ?>"> <?php echo $r['title']; ?></option>
																	<?php endforeach; ?>
																</select>
																<label>Choose Campaign</label>
															</div>
							
														</div>
													</div>
												</div>

												<div class="phone-wrapper">
													<div class="col-wrapper col-sm-12">
															
								                            <div class="col-lg-12" style="padding-left:0;margin-left:0;">


														    <div class="col-sm-2">
																<div class="form-group">
																	<select id="phonetype" name="phonetype[]" class="form-control">
																		<option value="0" selected>&nbsp;</option>
																		<option value="30">Work</option>
																		<option value="40">Home</option>
																		<option value="50">Business</option>
																		<option value="60">Cellular</option>
																	</select>
																	<label for="phonetype"><b>Phone Type</b></label>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<div class="input-group">
																		<div class="input-group-content">
																			<input type="hidden" name="phoneid" id="phoneid" value="">
																			<input type="text" maxlength="10" class="form-control" name="phone[]" id="phone" value="">
																			
																			<label><b>Phone Number</b></label>
																		</div>
																	</div>
																</div>
															</div>
															</div>

														
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

<?php }else{ ?>
	<p class="text-warning">Oopps! This page is empty! Redirecting.....</p>
<?php  echo"<meta http-equiv='refresh' content='0; URL=/'>"; } ?>