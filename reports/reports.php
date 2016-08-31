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

	require("db/dbconnect.php");
	opendb();
	include("sqlscripts/sqlscripts.php");
	include '../pscripts/reports/reportscripts.php';

	include 'start.html';
	include 'header.php';

$allanguages = language_list($db);
$allassignees = assignees_list($db);
$allstatusresults = statusresult_list($db);
$allstatuscustomer = statuscustomer_list($db);
$allreferrals = referral_list($db);
$allcarriers = carrier_list($db);
$allsources = source_list($db);
//print_r($allanguages);
?>	
		

<!-- BEGIN BASE-->
<div id="base">
	<!-- BEGIN CONTENT-->
	<div id="content">
		<!-- BEGIN Customer content -->
		<section id="reports">
			<div class="section-body">
				<!-- Button - add new customer and add family memmbers -->
				<div class="row">
					<div class="col-lg-offset-0 col-md-12">
						<div class="card card-underline style-default-bright">
							<div class="card-head">
								<header><i class="fa fa-fw fa-table"></i> Reports</header>
							</div><!--end .card-head -->

							<div class="col-lg-offset-0 col-md-12">
								<?php include 'reports_select.php'; ?>								
							</div>

							<div class="col-lg-offset-0 col-md-12">

<!-- 								<div class="card-body">
									<!-- <div class="pull-left"><h3 class="reportname">Please select report</h3></div>						
									<div class="pull-right">							
										<button type="button" class="btn ink-reaction btn-raised btn-success" id="exportCSV" ><i class="md md-save md-fw"> </i> &nbsp;Export CSV</button>
									</div>
								</div> -->
								<div class="card-body table-responsive">			
									<div class="report_wrapper">
										<div id="report_result"></div>
									</div>
								</div> 
							</div>
						</div>
					</div><!--end .col -->
				</div><!--end .card -->
			</div>
		</section>
	</div><!--end #content-->
	<!-- END CONTENT -->
</div>
<?php 
	include '../include/sidebar.php';
	include '../include/end.html';
?>
<script src="../include/js/reports/reports.js"></script>

<?php }else{ ?>
	<p class="text-warning">Oopps! This page is empty! Redirecting.....</p>
<?php echo"<meta http-equiv='refresh' content='0; URL=/'>"; } ?>

