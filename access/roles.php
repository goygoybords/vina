<?php
	session_start();
if(isset($_SESSION['userID']))
{
	set_include_path('../include');
	@$uname = $_SESSION['userN'];
	@$userid = $_SESSION['userID'];
	@$alvl = $_SESSION['userALvl'];
	@$fn = $_SESSION['fn'];
	@$ln = $_SESSION['ln'];
	include '../include/start.html'; 
	include '../include/header.php';

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
						<div class="card card-underline style-default-bright">
							<div class="card-head">
								<header><i class="fa fa-fw fa-lock"></i> Account Access</header>
							</div><!--end .card-head -->

							<div class="col-lg-offset-1 col-md-10">
								<div class="card-body table-responsive">
								<h3>Administrator</h3>
									<!--<table class="table search_mod">
										<thead>
											<tr>
												<th>Module</th>
												<th>View</th>
												<th>Add</th>
												<th>Edit</th>
												<th>Execute</th>
												<th>Check All</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Search</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
										</tbody>
									</table>-->
									<!--end table search-->								
									<table class="table customer_mod">
										<thead>
											<tr>
												<th>Module</th>
												<th>View</th>
												<th>Add</th>
												<th>Edit</th>
												<th>Execute</th>
												<th>Check All</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Customer</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Submodule</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>												
											</tr>											
											<tr>
												<td>Customer Information</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Family</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Home</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Vehicle</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Violation</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Claim</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Quote</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Rating</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Note</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
										</tbody>
									</table>
									<!--end table customer-->
									<table class="table report_mod">
										<thead>
											<tr>
												<th>Module</th>
												<th>View</th>
												<th>Add</th>
												<th>Edit</th>
												<th>Export</th>
												<th>Check All</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Report</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
										</tbody>
									</table>
									<!--end table report-->
								</div>
								<hr>
								<div class="card-body table-responsive">
								<h3>Staff</h3>
									<!--<table class="table search_mod">
										<thead>
											<tr>
												<th>Module</th>
												<th>View</th>
												<th>Add</th>
												<th>Edit</th>
												<th>Execute</th>
												<th>Check All</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Search</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
										</tbody>
									</table>-->
									<!--end table search-->								
									<table class="table customer_mod">
										<thead>
											<tr>
												<th>Module</th>
												<th>View</th>
												<th>Add</th>
												<th>Edit</th>
												<th>Execute</th>
												<th>Check All</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Customer</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Submodule</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>												
											</tr>											
											<tr>
												<td>Customer Information</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Family</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Home</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Vehicle</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Violation</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Claim</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Quote</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Rating</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
											<tr>
												<td>Note</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
										</tbody>
									</table>
									<!--end table customer-->
									<table class="table report_mod">
										<thead>
											<tr>
												<th>Module</th>
												<th>View</th>
												<th>Add</th>
												<th>Edit</th>
												<th>Export</th>
												<th>Check All</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Report</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>
												<td>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" id="cb5"><span></span>
														</label>
													</div>
												</td>												
											</tr>
										</tbody>
									</table>
									<!--end table report-->
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

<?php }else{ ?>
	<p class="text-warning">Oopps! This page is empty! Redirecting.....</p>
<?php echo"<meta http-equiv='refresh' content='0; URL=/'>"; } ?>