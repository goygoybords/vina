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
	include("../pscripts/customer/customer_lists.php");
	@$customers_cout = customer_list_sample_count($db);
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
				<!-- Button - add new customer and add family memmbers -->
				<div class="row">
					<div class="col-lg-offset-0 col-md-12">
						<div class="card card-underline">
							<div class="card-head">
								<header><i class="fa fa-fw fa-group"></i> Customer</header>
							</div><!--end .card-head -->
							<div class="col-lg-offset-0 col-md-12">
								<div class="card-body style-default-bright">
									<div class="card-body">
										<a class="btn ink-reaction btn-raised btn-success" href="customer_add.php" target="_blank">
											<label> Add New Customer </label>
										</a>
									</div><!--end .card -->
								</div><!--end .col -->
								<div class="col-md-12">
									<div class="card-body table-responsive">
										<div class="col-lg-12">
											<div class="col-lg-3 col-md-3 col-sm-12 pull-left" style="padding-left:0;">
												<div class="col-lg-12" style="padding-left:0;">
													<label>Show </label> 
													<select id="pageSelect">
														<option value="10">10</option>
														<option value="25">25</option>
														<option value="50">50</option>
													</select>
													entries
												</div>
											</div>
											
											<div class="col-lg-6 col-md-12 col-sm-12 pull-right" style="margin-bottom:1em;">
												<form id="search">
														<div class="col-lg-4 col-md-4 col-sm-12">
															<select id="searchby" class="form-control">
																<option value="0">--Search by--</option>
																<option value="1">Full Name</option>
																<option value="2">Policy</option>
																<option value="3">Address</option>
																<option value="4">Email</option>
																<option value="5">Phone #</option>
																<option value="6">Business Name</option>
															</select>
														</div>
														<div class="col-lg-5 col-md-5 col-sm-12" style="padding: 0;">
															<input class="form-control searched" type="search" name="search" placeholder="Search...">
														</div>
														<div class="col-lg-3 col-md-12 col-sm-12">
														<button type="submit" class="btn btn-success btn-md">Search</button>
														</div>
												</form>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-12 col-md-12 col-sm-12 pull-left" style="padding-left:0;">
												<div class="col-lg-12" style="padding-left:0;">
													<label>Sort by: </label> 
													<select id="sortby" class="sortkeys">
														<option value=""></option>
														<option value="0">Status</option>
														<option value="1">Date Review</option>
														<option value="2">First Name</option>
														<option value="3">Last Name</option>
														<option value="4">Policy</option>
														<option value="5">Address</option>
														<option value="6">Email</option>
														<option value="7">Phone #</option>
														<option value="8">Business Name</option>
													</select>
													<select id="order" class="sortkeys">
														<option value="DESC">Descending</option>
														<option value="ASC">Ascending</option>
													</select>
												</div>
											</div>
										</div>
										<div id="pageData"></div>
										<hr>
									</div>
								</div>
							</div>
						</div><!--end .card -->
						
					</div>
				</div>
			</div>
		</section>
	</div><!--end #content-->
	<!-- END CONTENT -->
</div>
<!-- END BASE -->

<?php 
	include 'sidebar.php'; 
	include 'end.html';
	
?>
<script>
	$('.dataTable').dataTable({
		"orderCellsTop": true,
        "aLengthMenu": [[10, 25, 50, 100, -1],[ 10, 25, 50, 100, 'All']],
        "iDisplayLength": 10,
		"aaSorting": [[6,'desc']],
		"responsive": true
	});
</script>

<?php }else{ ?>
	<p class="text-warning">Oopps! This page is empty! Redirecting.....</p>
<?php echo"<meta http-equiv='refresh' content='0; URL=/'>"; } ?>
<script type="text/javascript" src="../assets/custom/js/customer_search.js"></script>
<style>
	div.pagination {
		padding: 3px;
		margin: 3px;
		text-align:center;
		}
		 
		div.pagination a {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #AAAADD;
		 
		text-decoration: none; /* no underline */
		color: #0c9838;
		}
		div.pagination a:hover, div.digg a:active {
		border: 1px solid #0c9838;
		 
		color: #000;
		}
		div.pagination span.current {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #0c9838;
		 
		font-weight: bold;
		background-color: #0c9838;
		color: #FFF;
		}
		div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
		 
		color: #DDD;
		}
		 
</style>
