<form id="reports_form" method="post" accept-charset="utf-8" class="form form-validate floating-label">
<div class="card-body">
	<div class="col-md-3">
		<div class="form-group">
			<select class="form-control static dirty" id="report_select" name="report_select" >
				<option value="assigned">Assigned</option>
				<option value="language">Language</option>
				<option value="production">Production</option>
				<option value="productionsum">Production-Sum</option>
				<option value="prospect">Prospect</option>
				<option value="quoted">Quoted</option>
				<option value="referral">Referral</option>
				<!-- <option value="score">Score</option> -->
				<option value="status">Status</option>
				<option value="source">Source</option>
				<option value="binddate">Bind Date</option>
				<option value="carrierauto">Carrier-Auto</option>
				<option value="carrierhome">Carrier-Home</option>
				<option value="dob">DOB</option>
				<option value="expireauto">Expire-Auto</option>
				<option value="expirehome">Expire-Home</option>
				<option value="followup">Follow Up</option>
				<option value="grade">Grade</option>
			</select>
	  		<label for="sel1">Reports</label>
		</div>
	</div>

	<div class="col-md-6 reportselections" id="rassigned">
	  	<div class="form-group">
		  <select class="form-control" id="sel1" name="assignees">
			<?php
				foreach($allassignees as $assign){ ?>
					<option value="<?php echo $assign['IBO_UserID']?>"><?php echo $assign['IBO_UserName']?></option>
			<?php	} ?>
		  </select>
		  <label for="sel1">Assigned To</label>
		</div>
	</div>

	<div class="col-md-6 reportselections" id="rlanguage">
		<div class="form-group col-md-5">	  
		  <select class="form-control" id="sel1" name="languages">
		    <!-- <option>Language</option> -->
				
			<?php
				
				foreach($allanguages as $language){ ?>
					<option value="<?php echo $language['Language_ID']?>"><?php echo $language['Language_Name']?></option>
			<?php	} ?>
		  </select>
		  <label for="sel1">Language</label>
		</div>
		<div class="form-group col-md-5">	  
		  <select class="form-control" id="sel1" name="status_language">
				<option value="0"></option>
			<?php
				foreach($allstatuscustomer as $statuscres){ ?>
					<option value="<?php echo $statuscres['Status_ID']?>"><?php echo $statuscres['Status_Desc']?></option>
			<?php	} ?>
		  </select>
		  <label for="sel1">Status</label>
		</div>		
	</div>

	<div class="col-md-6 reportselections" id="rproduction">
	  	<div class="form-group col-md-4">
			<select class="form-control" id="sel1" name="producers">
			<?php
				foreach($allassignees as $assign){ ?>
					<option value="<?php echo $assign['IBO_UserID']?>"><?php echo $assign['IBO_UserName']?></option>
			<?php	} ?>
			</select>
			<label for="sel1">Producers</label>
		</div>
		<div class="form-group col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="production_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>

		<div class="form-group col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="production_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6 reportselections" id="rproductionsum">
	  	<div class="form-group col-md-4">
	  		<label for="sel1">Producers</label>
			<select class="form-control" id="sel1" name="producerssum">
			<?php
				foreach($allassignees as $assign){ ?>
					<option value="<?php echo $assign['IBO_UserID']?>"><?php echo $assign['IBO_UserName']?></option>
			<?php	} ?>
			</select>
		</div>

		<div class="form-group col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="productionsum_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>

		<div class="form-group col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="productionsum_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group col-md-5 reportselections" id="rprospect">
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="prospect_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="prospect_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>	
	</div>

	<div class="form-group col-md-5 reportselections" id="rquoted">
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="quote_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="quote_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>		
	</div>

	<div class="form-group col-md-6 reportselections" id="rreferral">
	  <select class="form-control" id="sel1" name="referralassignees">
		<?php
			foreach($allreferrals as $refers){ ?>
				<option value="<?php echo $refers['Referral_FName']."_".$refers['Referral_LName']?>"><?php echo $refers['Referral_FName']." ".$refers['Referral_LName']?></option>
		<?php	} ?>
	  </select>
	  <label for="sel1">Referred by</label>
	</div>

	<div class="col-md-6 reportselections" id="rscore">
		<div class="form-group col-md-4">
			  <select class="form-control" id="sel1" name="score_from">
				<?php
				$i = 0;
					for($i=0;$i<20;$i++){ ?>
						<option value=<?php echo $i?> ><?php echo $i?></option>
				<?php	} ?>
			  </select>
			  <label for="sel1">Score From</label>
		</div>
		<div class="form-group col-md-4">
			  <select class="form-control" id="sel1" name="score_to">
				<?php
				$i = 0;
					for($i=0;$i<20;$i++){ ?>
						<option value=<?php echo $i?> ><?php echo $i?></option>
				<?php	} ?>
			  </select>
		  <label for="sel1">Score to</label>
		</div>
	</div>

	<div class="col-md-6 reportselections" id="rstatus">
	  	<div class="form-group" >
		  <select class="form-control" id="sel1" name="status_result">
			<?php
				foreach($allstatusresults as $statusres){ ?>
					<option value="<?php echo $statusres['Result_ID']?>"><?php echo $statusres['Result_Desc']?></option>
			<?php	} ?>
		  </select>
		  <label for="sel1">Status</label>
		</div>
	</div>


	<div class="col-md-6 reportselections" id="rsource">
	  	<div class="form-group" >
		  <select class="form-control" id="sel1" name="sources">
			<?php
				foreach($allsources as $rsources){ ?>
					<option value="<?php echo $rsources['Orig_Source_ID']?>"><?php echo $rsources['Orig_Source']?></option>
			<?php	} ?>
		  </select>
		  <label for="sel1">Source</label>
		</div>
	</div>

	<div class="form-group col-md-5 reportselections" id="rbinddate">
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="binddate_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="binddate_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>		
	</div>

	<div class="form-group col-md-5 reportselections" id="rcarrierauto">
		<div class="col-md-4">
			<div class="control-width-normal">
				<select class="form-control" id="sel1" name="rcarriersauto">
				<?php
					foreach($allcarriers as $rcarriers){ ?>
						<option value="<?php echo $rcarriers['NAIC']?>"><?php echo $rcarriers['Company']?></option>
				<?php	} ?>
				</select>
			</div>
		</div>		
	</div>

	<div class="form-group col-md-5 reportselections" id="rcarrierhome">
		<div class="col-md-4">
			<div class="control-width-normal">
				<select class="form-control" id="sel1" name="rcarriershome">
				<?php
					foreach($allcarriers as $rcarriers){ ?>
						<option value="<?php echo $rcarriers['NAIC']?>"><?php echo $rcarriers['Company']?></option>
				<?php	} ?>
				</select>
			</div>
		</div>	
	</div>

	<div class="form-group col-md-5 reportselections" id="rdob">
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="dob_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="dob_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>		
	</div>

	<div class="form-group col-md-5 reportselections" id="rexpireauto">
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="expireauto_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="expireauto_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>		
	</div>

	<div class="form-group col-md-5 reportselections" id="rexpirehome">
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="expirehome_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="expirehome_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>		
	</div>	

	<div class="form-group col-md-5 reportselections" id="rfollowup">
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="followup_sdate" value="">
						<label>Start Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="control-width-normal">
				<div class="input-group date" data-provide="datepicker">
					<div class="input-group-content">
						<input type="text" class="form-control dirty" id="datepicker" name="followup_edate" value="">
						<label>End Date</label>
					</div>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
		</div>		
	</div>		

	<div class="col-md-6 reportselections form-horizontal" id="rgrade">
		<div class="form-group col-md-8">
			<div class="checkbox checkbox-styled">
				<label>
					<input type="checkbox" value="A" name="A">
					<span>A</span>
				</label>
			</div>
	  		<div class="checkbox checkbox-styled">
				<label>
					<input type="checkbox" value="B" name="B">
					<span>B</span>
				</label>
			</div>
	  		<div class="checkbox checkbox-styled">
				<label>
					<input type="checkbox" value="C" name="C">
					<span>C</span>
				</label>
			</div>
	  		<div class="checkbox checkbox-styled">
				<label>
					<input type="checkbox" value="D" name="D">
					<span>D</span>
				</label>
			</div>
	  		<div class="checkbox checkbox-styled">
				<label>
					<input type="checkbox" value="E" name="E">
					<span>E</span>
				</label>
			</div>
	  		<div class="checkbox checkbox-styled">
				<label>
					<input type="checkbox" value="F" name="F">
					<span>F</span>
				</label>
			</div>														
		</div>
	</div>

	<div class="pull-left">
		<div class="form-group" style="padding-top: 0px;margin-top: -6px;">
			<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Search</button>
			<?php if($_SESSION['userALvl']== 0){//admin ?>
				<button type="button" class="btn ink-reaction btn-raised btn-success" id="exportCSV" ><i class="md md-save md-fw"> </i> &nbsp;Export CSV</button>
			<?php } ?>
			
		</div>
	</div>									
</div><!--end card-body-->
</form>