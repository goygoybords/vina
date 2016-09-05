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

	require 'calendar_scripts.php';

	$id =  $_GET['id'];

	$specific = getSpecificEvent($id);
	
	print_r($specific);
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
										<form class="form form-validate floating-label" novalidate="novalidate" id="calendar_form">
											<div class="card-body style-default-light">
									    		<div class="col-sm-3">
													<div class="form-group">
														<input type="text" class="form-control dirty" value = "<?php echo $specific['title']; ?>" disabled >
														<label for="Title">Title</label>
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" class="form-control dirty" value = "<?php echo $specific['description']; ?>" disabled >
														<label for="Description">Description</label>
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" class="form-control dirty" value = "<?php echo $specific['start']; ?>" disabled >
														<label for="Start">Start Date</label>
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" class="form-control dirty" value = "<?php echo $specific['end']; ?>" disabled >
														<label for="End">End Date</label>
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" class="form-control dirty" disabled 
														value = "<?php echo $specific['First_Name'].' '.$specific['Last_Name']; ?>">
														<label for="customer">Customer</label>
													</div>
												</div>

												<div class="col-sm-3">
													<div class="form-group">
														<input type="text" class="form-control dirty" disabled 
														value = "<?php echo $specific['IBO_UserName']; ?>">
														<label for="user">User</label>
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