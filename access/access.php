<?php



	session_start();

if(isset($_SESSION['userID']) && $_SESSION['userALvl']==0)

{

	set_include_path('../include');

	@$uname = $_SESSION['userN'];

	@$userid = $_SESSION['userID'];

	@$alvl = $_SESSION['userALvl'];

	@$fn = $_SESSION['fn'];

	@$ln = $_SESSION['ln'];

	include 'start.html'; 

	include 'header.php';

	require("db/dbconnect.php");

	opendb();

	// customer lists

	include("../pscripts/user/users_lists.php");

	@$users = user_list($db);

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

						<div class="card card-underline style-default-bright">

							<div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10" id="msg_inf">



							</div>

							<div class="card-head">

								<header><i class="fa fa-fw fa-lock"></i> Account Access</header>

							</div><!--end .card-head -->

							<div class="col-lg-offset-1 col-md-10">

								<div class="card-body">

									<button type="button" class="btn ink-reaction btn-raised btn-success" id="addnewuser" data-toggle="modal" data-target="#addUser">

										<label> Add New User </label>

									</button>

									<a class="btn ink-reaction btn-raised btn-success pull-right" href="roles.php">

										<label> Edit Roles </label>

									</a>							

									<div class="modal fade" id="addUser" role="dialog">

									    <div class="modal-dialog">

									    

									      	<div class="modal-content modal-lg">

									        	<div class="modal-header">

									          		<button type="button" class="close" data-dismiss="modal">&times;</button>

									          		<h4 class="modal-title">Add New User</h4>

									        	</div>

									        	<form class="form" id="uform">

									        	<input type="hidden" name="u" id="u" value="">

												<div class="modal-body col-lg-12">

													<div class="col-lg-6 col-md-6 col-sm-12">

														<div class="form-group">

															<input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" minlength="3" >

														</div>

													</div>

													<div class="col-lg-6 col-md-6 col-sm-12">

														<div class="form-group">

															<input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" minlength="3">

														</div>

													</div>

													<div class="col-lg-6 col-md-6 col-sm-12">

														<div class="form-group">

															<input type="text" class="form-control" name="uname" id="uname" placeholder="Username" required minlength="3" required>

														</div>

													</div>															

													<div class="col-lg-6 col-md-6 col-sm-12">

														<div class="form-group">

															<input type="password" class="form-control" name="pword" id="pword" required placeholder="Password" minlength="3" required>

														</div>

													</div>

													<div class="col-lg-6 col-md-6 col-sm-12">

														<div class="form-group">

															<label><b>Role</b></label>

															<div class="col-lg-4 col-md-4 col-sm-12"> 

																<label class="radio-inline radio-styled">

																	<input type="radio" class="access" name="accessA" id="access0" attr="0"><span>Administrator </span>

																</label>

															</div>

															<div class="col-lg-4 col-md-4 col-sm-12"> 

																<label class="radio-inline radio-styled">

																	<input type="radio" class="access" name="accessA" id="access1" attr="1" checked><span> Staff </span>

																</label>

															</div>

														</div>

														<input type="hidden" name="access" id="access" value="1" id="access">

													</div>



												</div>

									        	<div class="modal-footer">

									        		<!--<div id="role">

									        			

									        		</div>-->

									        			

									        		<button type="submit" class="btn btn-success ink-reaction">Save</button>

									          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

									        	</div>

										        	

											</div>

										</form>

										</div>

									</div>





								</div><!--end card-body-->

							</div>



							<div class="col-lg-offset-1 col-md-10">

								<div class="card-body table-responsive">

									<table class="table table-condensed table-hover dataTable" id="accesstable">

										<thead>

											<th>First Name</th>

											<th>Last Name</th>

											<th>Username</th>

											<th>Role</th>

											<th>Date Updated</th>											

											<th>Action</th>

										</thead>

										<tbody>

											<?php foreach($users as $us){ ?>

												<tr>

													<td>

														<?php 

														if($us['firstname']==''){

															echo "<span class='text-warning'>To be updated.</span>";

														}else{ 

															echo $us['firstname'];

														}

														?>

													</td>

													<td>

														<?php 

														if($us['lastname']==''){

															echo "<span class='text-warning'>To be updated.</span>";

														}else{ 

															echo $us['lastname'];

														}

														?>

													</td>

													<td><?php echo $us['IBO_UserName'] ?></td>

													<td><?php if($us['Access_Level']==0){ echo "<span style='color:#FF1B1B;font-weight:bolder;'>Admin</span>"; }else{ echo "<span style='color:#0af;font-weight:bolder;'>Staff</span>"; } ?></td>

													<td class="text-info">

														<?php

														if($us['dateupdated']<=0 && $us['datecreated']>0)

														{

															echo @date("m/d/Y h:i a",$us['datecreated']);

														}else if($us['dateupdated']>0){

															echo @date("m/d/Y h:i a",$us['dateupdated']);

														}else if($us['datecreated']<=0 && $us['dateupdated']<=0){

															echo "";

														}

														

														

														?>

															

													</td>

													<td>

														<a style="cursor:pointer;" data-att="<?php echo $us['uid']; ?>" id="upduser" class="text-primary" data-toggle="modal" data-target="#addUser"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;

														<a style="cursor:pointer;" data-att="<?php echo $us['uid']; ?>" id="deluser" class="text-danger"><i class="fa fa-trash"></i>&nbsp;delete</a>

													</td>



												</tr>

											<?php } ?>

											

										</tbody>

									</table>

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

<script type="text/javascript" src="../assets/custom/unknown.js"></script>

<script>

	$.fn.dataTable.ext.errMode = 'none';

	$('#accesstable').dataTable({

		"orderCellsTop": true,

        "aLengthMenu": [[10, 25, -1],[ 10, 50, 'All']],

        "iDisplayLength": 10,

        "aaSorting": [[4,'desc']],

		"responsive": true

	});

</script>



<?php }else{ ?>

	<p class="text-warning">Oopps! This page is empty! Redirecting.....</p>

<?php echo"<meta http-equiv='refresh' content='0; URL=/'>"; } ?>