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

	require 'status_scripts/status_scripts.php';
	$getStatCust = getStatusCustomer();
	$source = getStatusSource();
	$carriers = getStatusCarriers();
	$manufacturers = getStatusManufacturer();
	$violations = getStatusViolation();
	$policy_type = getStatusPolicy();
	


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
							</div>
					<!--end information-->
						
							<div class="card-body" id="tabsinfo" >
								<div class="col-md-12">
										<div class="card">
										<div class="card-head">
											<ul class="nav nav-tabs" data-toggle="tabs">
												<li class="active"><a href="#status">Status Customer</a></li>
												<li><a href="#source">Source</a></li>
												<li><a href="#carriers">Carriers</a></li>
												<li><a href="#policy">Manufacturer</a></li>
												<li><a href="#rating">Violation</a></li>
												<li><a href="#notes">Policy Type</a></li>
											</ul>
										</div>   
										<div class="card-body tab-content">
											<div class="tab-pane active" id="status"><?php include('status_form/status_customer.php'); ?></div>
											<div class="tab-pane" id="source"><?php include('status_form/status_source.php'); ?></div>
											<div class="tab-pane" id="carriers"><?php include('status_form/status_carriers.php'); ?></div>
											<div class="tab-pane" id="policy"><?php include('status_form/status_manufacturer.php'); ?></div>
											<div class="tab-pane" id="rating"><?php include('status_form/status_violation.php');  ?></div>
											<div class="tab-pane" id="notes"><?php include('status_form/status_policyType.php'); ; ?></div>
											
											<!-- <div id="familyrefresh">
												<button class="btn btn-primary btn-sm ref"><i class="fa fa-spinner fa-spin"></i> Refresh form</button>
											</div> -->
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



<script type="text/javascript" src="../assets/custom/status/source.js"></script>
<script type="text/javascript" src="../assets/custom/status/status_customer.js"></script>
<script type="text/javascript" src="../assets/custom/status/carriers.js"></script>
<script type="text/javascript" src="../assets/custom/status/manufacturer.js"></script>
<script type="text/javascript" src="../assets/custom/status/violation.js"></script>
<script type="text/javascript" src="../assets/custom/status/policy_type.js"></script>

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