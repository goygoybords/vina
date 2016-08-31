<div id="sidebar">
	<!-- BEGIN MENUBAR-->
	<div id="menubar" class="menubar-inverse ">
		<div class="menubar-fixed-panel">
			<div>
				<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="expanded">
				<a href="../search/search.php">
					<span class="text-lg text-bold text-primary ">InsBizOps - </span>
				</a>
			</div>
		</div>
		<div class="menubar-scroll-panel">

			<!-- BEGIN MAIN MENU -->
			<ul id="main-menu" class="gui-controls">

				<!-- BEGIN DASHBOARD -->
				<!-- <li>
					<a href="../search/search.php" >
						<div class="gui-icon"><i class="md md-search"></i></div>
						<span class="title">Search</span>
					</a>
				</li> -->
				<!--<end /menu-li -->

				<!-- BEGIN EMAIL -->
				<li>
					<!--<a href="../../html/customer/customerTab.php" class="active">-->
					<a href="../customer/customer.php">
						<div class="gui-icon"><i class="md md-group"></i></div>
						<span class="title">Customer</span>
					</a>
				<li>
					<a href="../reports/reports.php">
						<div class="gui-icon"><i class="fa fa-table"></i></div>
						<span class="title">Reports</span>
					</a>
				</li>
				<?php if($alvl==0){ ?>
				<li>
					<a href="../access/access.php">
						<div class="gui-icon"><i class="md md-lock md-fw"></i></div>
						<span class="title">Account Access</span>
					</a>
				</li>
				<?php } ?>
				<li>
					<a href="../calendar/calendar.php">
						<div class="gui-icon"><i class="fa fa-table"></i></div>
						<span class="title">Calendar</span>
					</a>
				</li>
				<li>
					<a href="../campaign/campaign.php">
						<div class="gui-icon"><i class="fa fa-table"></i></div>
						<span class="title">Campaign</span>
					</a>
				</li>
				<li>
					<a href="../status/status.php">
						<div class="gui-icon"><i class="fa fa-table"></i></div>
						<span class="title">Status</span>
					</a>
				</li>
			</ul><!--end .main-menu -->
			<!-- END MAIN MENU -->

			<!-- <div class="menubar-foot-panel">
				<small class="no-linebreak hidden-folded">
					<span class="opacity-75">Copyright &copy; 2016</span> <strong><i class="fa fa-cube fa-fw"></i>Qubetek</strong>
				</small>
			</div> -->
		</div><!--end .menubar-scroll-panel-->
	</div><!--end #menubar-->
	<!-- END MENUBAR -->

</div>