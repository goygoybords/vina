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
	require 'campaign_scripts/campaign_scripts.php';
	$campaign = getCampaignDetails();
	$type = getCampaignType();
	$providers = getCampaignProviders();
	

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
								<header><i class="fa fa-fw fa-group"></i> Campaign Information </header>
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
												<li class="active"><a href="#campaign"> Campaign</a></li>
												<li><a href="#camp_type">Campaign Type</a></li>
											</ul>
										</div>   
										<div class="card-body tab-content">
											<div class="tab-pane active" id="campaign"><?php include('campaign_forms/campaign_add.php'); ?></div>
											<div class="tab-pane" id="camp_type"><?php include("campaign_forms/campaign_type.php"); ?></div>
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


<script type="text/javascript" src="../assets/custom/campaign/campaign.js"></script>
<script type="text/javascript" src="../assets/custom/campaign/type.js"></script>


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