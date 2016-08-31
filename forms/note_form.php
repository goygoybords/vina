<!-- if claim note is NOT EMPTY: show table else hide-->
	<div class="card-body">
		<div class="table-responsive" style="min-height: auto;max-height: 300px;overflow-y: scroll;">

			<table class="table table-condensed table-hover" id="notetbl">
				<thead>
					<th>Subject</th>
					<th>Type</th>
					<th>Notes</th>
					<th>Added by</th>
					<th>Date Added</th>
				</thead>
				<tbody>
				<?php foreach($notes as $not){ 
					opendb();
					$qnotes = mysqli_query($db,"SELECT
										CN.Note_ID,
										CN.IBO_UserID as uid,
										CN.Customer_ID as noteC_ID,
										CN.Type as noteType,
										CN.Review_Date as noteRDate,
										CN.Note_Subj as noteSub,
										CN.Note_Text as noteTxt,
										UD.firstname as udFn,
										UD.lastname as udLn,
										U.IBO_UserName as usname
										FROM customer_note CN
										LEFT JOIN user U on CN.IBO_UserID=U.IBO_UserID
										LEFT JOIN user_detail UD on CN.IBO_UserID=UD.IBO_UserID
										WHERE CN.Note_ID='".$not['latest']."'
										
										ORDER BY CN.Review_Date DESC
										"); // GROUP BY CN.IBO_UserID
						$getNotes = fetch_all_array($qnotes);
						closedb();
					foreach($getNotes as $note){
					?>

					<tr>
						<td><?php $subj = ""; 
						if($note['noteSub']!=''){
							$subj =  $note['noteSub'];
						}else{
							$subj =  "<span class='text-primary'>none</span>";
						}
						echo $subj;
						 ?></td>
						<td><?php $type = ""; if($note['noteType']==1){
							$type =  "Other";
						}else if($note['noteType']==2){
							$type =  "Home";
						}else if($note['noteType']==3){
							$type =  "Vehicle";
						}else if($note['noteType']==0 || $note['noteType'] ==''){
							$type =  "<span class='text-primary'>none</span>";
						}
						echo $type;
						 ?></td>
						<td class="showmore<?php echo $note['Note_ID']; ?>" ><?php echo ucfirst(mb_strimwidth($note['noteTxt'], 0, 150, "<span class='text-info showmore' data-attr='".$note['Note_ID']."' data-sh='more' style='cursor:pointer;'>&nbsp;> show more</span>"));  ?></td>
						<td><?php if($note['udFn']=='' && $note['usname']!='' ){ 
									echo "<span class='text-info'>".$note['usname']."</span>"; 
							}else if( $note['udFn']!='' && $note['usname']=='' ){ 
								echo "<span class='text-info'>".$note['udFn']."</span>"; 
							}else if($note['udFn']!='' && $note['usname']!='' ){
								echo "<span class='text-info'>".$note['udFn']."</span>";  
							} ?>
						</td>
						<td><?php if($note['noteRDate']!=0){ echo @date("m/d/Y h:i a",$note['noteRDate']); }else{ echo "<span class='text-info'>Date unavailable.</span>"; } ?></td>
						
					</tr>
				<?php } 
				} ?>
				</tbody>
			</table>
			<!-- <td>
							<a style="cursor:pointer;" class="text-info viewnote" data-cid="<?php //echo $note['noteC_ID'] ?>" data-uid="<?php //echo $note['uid'] ?>" data-toggle="modal" data-target="#watchNotes"><i class="md md-visibility md-fw col-sm-1"></i>&nbsp; View All</a>
						</td> -->
		</div>
	</div>

	<form class="form form-validate floating-label" novalidate="novalidate" id="noteform">
		<input type="hidden" class="userid" name="userid" value="<?php echo $userid; ?>">
		<input type="hidden" name="cust_id" class="cust_id" value="<?php echo $cusidb;?>">
		<div class="card-body style-default-light">
			<div class="col-sm-6">
				<div class="form-group">
					<select id="type" name="type" class="form-control">
						<option value="">&nbsp;</option>
						<option value="1">Other</option>
						<option value="2">Home</option>
						<option value="3">Vehicle</option>
					</select>
					<label for="type">Type</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" name="subj" id="subj">
					<label for="subject">Subject</label>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<textarea name="note" id="note" class="form-control notesF" rows="4" style="max-width:100%;"></textarea>
					<label>Note (s)</label>
				</div>
			</div>
		</div>
		<div class="pull-right">
			<div class="form-group" id="savebtnnote">
				<!-- <button type="button" class="btn ink-reaction btn-raised btn-info" id="donenote">Done</button> -->
				<button type="submit" class="btn ink-reaction btn-raised btn-success" id="donenote"><i class="md md-save md-fw"> </i> &nbsp;Save</button>
			</div>
		</div>
	</form>
	<!-- modal -->
	<div class="modal fade" id="watchNotes" role="dialog">
	    <div class="modal-dialog modal-lg">
	      	<div class="modal-content modal-lg" style="min-height: 500px;max-height: 500px;overflow-y: scroll;">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h4 class="modal-title">Notes</h4>
	        	</div>
				<div class="modal-body col-lg-12" id="noteTableBox">
					<div class="table-responsive" id="notetblView">
						
					</div>
				</div>
	        	<div class="modal-footer">
	          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	</div>
			</div>
		</form>
		</div>
	</div>
