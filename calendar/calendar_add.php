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

	$db = new PDO("mysql:host=localhost;dbname=vinaouts_vddb01","vinaouts_vdusr01","VDdb01!@#");
	$sql = "SELECT * FROM calendar_events WHERE status = 1 ORDER BY 1 DESC";
	$cmd = $db->query($sql);
	$events = $cmd->fetchAll();

	


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
								<header><i class="fa fa-fw fa-group"></i> Calendar Event Information </header>
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
												<li class="active"><a href="#status">Calendar</a></li>

											</ul>
										</div>   
										<div class="card-body tab-content">
											<div class="tab-pane active" id="status"><?php include("calendar_forms/calendar_list.php"); ?></div>

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


<script type="text/javascript" src="../assets/custom/calendar/calendar_list.js"></script>
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