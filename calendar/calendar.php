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
								<header><i class="fa fa-fw fa-group"></i> Calendar Events Information </header>
							</div><!--end .card-head -->
							<div class="card-body">
								<div id="msg_inf"></div>
							</div>
							<!-- <div class="card-body style-default-bright">
								<div class="card-body">
									<a class="btn ink-reaction btn-raised btn-success" href="calendar_add.php" target="_blank">
										<label> Add Calender Event </label>
									</a>
								</div>
							</div> -->
							<div id='calendar'></div>
					<!--end information-->
						
							<!-- <div class="card-body" id="tabsinfo" >
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

										</div>

									</div>
								</div>
							</div> -->
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

<!-- <script type="text/javascript" src="../assets/custom/calendar/calendar_main.js"></script> -->
<script type="text/javascript">
$(document).ready(function() {
		
		var now = "<?php echo date('Y-m-d'); ?>";
		$.ajax({
			type:'GET',
			url:'../ajaxrequest/calendar/calendar_getlist',
			success:function(data)
			{
				var parse = JSON.parse(data);
				console.log(parse);
				$('#calendar').fullCalendar('gotoDate', now);
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: now,
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: parse,
					eventClick: function(event) 
					{
				        if (event.url) {
				            window.open(event.url);
				            return false;
				        }
				    }
					
				});
				
				
			}
		});
		
		
	});
</script>



<?php }else{ ?>
	<p class="text-warning">Oopps! This page is empty! Redirecting.....</p>
<?php  echo"<meta http-equiv='refresh' content='0; URL=/'>"; } ?>