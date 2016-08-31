<?php
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
					<div class="col-lg-offset-1 col-md-10">
						<div class="card card-underline style-default-bright">
							<div class="card-head">
								<header><i class="fa fa-fw fa-lock"></i> Account Access</header>
							</div><!--end .card-head -->
							<div class="col-lg-offset-1 col-md-10">
								<form class="form form-validate floating-label" novalidate="novalidate">
									<div class="card-body">								
										<div class="col-sm-3">
											<div class="form-group">
												<input type="text" class="form-control" id="Lastname" required data-rule-minlength="12" value="Sample First Name">
												<label for="pamount">Firstname</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="text" class="form-control" id="pamount" value="Sample Last Name">
												<label for="pamount">Lastname</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="text" class="form-control" id="pamount" value="Sample UserName">
												<label for="pamount">Username</label>
											</div>
										</div>															
										<div class="col-sm-3">
											<div class="form-group">
												<input type="password" class="form-control" id="pamount" value="...">
												<label for="pamount">Password</label>
											</div>
										</div>
										<div class="col-sm-8">
											<div class="form-group">
												<div class="col-sm-4"> 
													<label class="radio-inline radio-styled">
														<input type="radio" name="inlineRadioOptions" value="option1" checked><span>Administrator </span>
													</label>
												</div>
												<div class="col-sm-4"> 
													<label class="radio-inline radio-styled">
														<input type="radio" name="inlineRadioOptions" value="option2"><span> Staff </span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="pull-right">
										<div class="form-group">
											<button type="button" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div><!--end .row -->
			</div><!--end .section-body -->
		</section>
	</div><!--end #content-->
	<!-- END CONTENT -->
</div>

<?php 
	include '../include/sidebar.php'; 
	include '../include/end.html';
?>