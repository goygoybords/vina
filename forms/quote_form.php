<!-- if claim quote is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table dataTable table-condensed table-hover" id="quotetbl">
				<thead>
					<tr>
						<th>Carrier</th>
						<th>Policy</th>
						<th>Status</th>
						<th>QuoteSum</th>
						<!-- <th>YearTotal</th> -->
						<th>QuoteDate</th>
						<th>Bind</th>
						<th>Effective</th>
						<th>Updated By</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(count($qouteC)!=0)
					{
					 foreach($qouteC as $qout){ ?>
					
					<tr>
						<td><?php echo $qout['carCom']; ?></td>
						<td><?php echo $qout['Policy_Type']; ?></td>
						<td><?php echo $qout['QStatus_Desc']; ?></td>
						<td>$ <?php echo $qout['Quote']; ?></td>
						<!--$qout['YearTotal']-->
						<td>
						<?php 
							if($qout['qdate'] == 0 || $qout['qdate'] =='' )
								{ 
									echo "n/a";  
									
								}else{
									 echo @date("m/d/Y ", $qout['qdate'] );
								}
							?>
								
						</td>
						<td>
							<?php 
							if($qout['qbind'] == 0 || $qout['qbind'] =='' )
								{ 
									echo "n/a";  
									
								}else{
									 echo @date("m/d/Y ", $qout['qbind'] );
								}
							?>
								
						</td>
						<td><?php 
							if($qout['qeff'] == 0 || $qout['qeff'] =='' )
								{ 
									 echo "n/a";  
									
								}else{
									echo @date("m/d/Y ", $qout['qeff'] );
								}
							?>
								
							</td>
						<td><span class='text-info'><?php echo $qout['ufname']; ?></span></td>
						<td>
							<a style="cursor:pointer;" class="text-primary" id="qoutedit" data-attr="<?php echo $qout['qouteid']; ?>"><i class="fa fa-pencil"></i>&nbsp;edit</a>&emsp;
							<a style="cursor:pointer;" class="text-danger" id="qoutdelete" data-attr="<?php echo $qout['qouteid']; ?>"><i class="fa fa-trash"></i>&nbsp;delete</a>
						</td>
					</tr>
					<?php } 
					} ?>
				</tbody>
			</table>
			<p class="text-warning"><?php if(count($qouteC)==0){ echo "No Data Found.";} ?></p>
		</div>
	</div>
	<!--/end table-->
	<form class="form form-validate floating-label" novalidate="novalidate" id="qouteform">
		<input type="hidden" name="inf" class="inf" value="">
		<input type="hidden" name="qouteU" class="qouteU" value="">
		<input type="hidden" name="cid" id="cid" value="<?php echo $_GET['ret'];?>">
		<input type="hidden" name="c_id" class="c_id" value="<?php echo $cusidb;?>">
		<input type="hidden" id="producer" class="producer" name="producer" value="<?php echo $userid; ?>">
		<div class="card-body style-default-light" id="quote_data">
			<!-- <div class="col-sm-10">
				<div class="form-group">
					<div class="checkbox checkbox-styled">
						<div class="mine">
						<label class="radio-inline radio-styled">
							<input type="radio" name="inlineRadioOptions" value="option1"><span> Add New Quote </span>
						</label>
						<label class="radio-inline radio-styled">
							<input type="radio" name="inlineRadioOptions" value="option2"><span> Add Quote Line Item </span>
						</label>
						</div>
					</div>
				</div>
			</div> -->
			<div class="col-sm-4">
				<div class="form-group">
					<select id="carr" name="carr" class="form-control">
						<?php opendb(); echo carrier_list($db); closedb(); ?>
					</select>
					<label for="carr">Carrier </label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<select id="polType" name="polType" class="form-control">
						<?php foreach($policytype as $ptype){ ?>
							<option value="<?php echo $ptype['Policy_Code'] ?>"><?php echo $ptype['Policy_Type'] ?></option>
						<?php } ?>
						<!-- <option value="">&nbsp;</option>
						<option value="1">Auto </option>
						<option value="2">Home </option>
						<option value="3">Landlords </option>
						<option value="3">Pup </option>
						<option value="3">Renters </option>
						<option value="3">Condo </option>
						<option value="3">Life </option>
						<option value="3">Mobile </option>
						<option value="3">Home </option>
						<option value="3">RV </option>
						<option value="3">Commercial Auto </option>
						<option value="3">Commercial </option>
						<option value="3">Inland Marine </option> -->
					</select>
					<label for="polType">Policy Type</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<select id="qstatus" name="qstatus" class="form-control">
						<?php foreach($status_qoute as $qt){ ?>
							<option value="<?php echo $qt['QStatus_ID'] ?>"><?php echo $qt['QStatus_Desc'] ?></option>
						<?php } ?>
					</select>
					<label for="qstatus">Status </label>
				</div>
			</div>
			<!-- <div class="col-sm-3">
				<div class="form-group">
					<select id="producer" name="producer" class="form-control">
						<option value="" selected>&nbsp;</option>
						<?php //foreach($users as $us){ ?>
							<option value="<?php //echo $us['IBO_UserID'] ?>"><?php //echo $us['IBO_UserName'] ?></option>
						<?php //} ?>
					</select>
					<label for="producer">Producer </label>
				</div>
			</div> -->
			<div class="col-sm-3">
				<div class="form-group">
						<input type="text" class="form-control" id="premium" name="premium" value="">
						<label for="premium">Premium </label>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group control-width-normal">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-content">
								<input type="text" class="form-control qdate" name="qdate" id="datepicker">
								<label>Quote Date</label>
							</div>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group control-width-normal">
					<div class="input-group date" data-provide="datepicker">
						<div class="input-group-content">
							<input type="text" class="form-control bindate" name="bindate" id="datepicker">
							<label>Bind Date</label>
						</div>
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group control-width-normal">
						<div class="input-group date" data-provide="datepicker">
							<div class="input-group-content">
								<input type="text" class="form-control effdate" name="effdate" id="datepicker">
								<label>Effective Date</label>
							</div>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<textarea name="note" id="note" class="form-control" rows="4"></textarea>
						<label>Note (s)</label>
					</div>
				</div>
		</div><!--end .card-body -->

		<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn ink-reaction btn-raised btn-success"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>		
	</form>