<?php 

	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");

	$unixtime=time();
	opendb();

			$uid = $_POST['uid'];
			$cid = $_POST['cid'];
			$qNotes= mysqli_query($db, " SELECT CN.Note_ID,
												CN.IBO_UserID as uid,
												CN.Customer_ID as noteC_ID,
												CN.Type as noteType,
												CN.Review_Date as noteRDate,
												-- from_unixtime(CN.Review_Date, '%m/%d/%Y %h:%i:%s') as noteRDate,
												CN.Note_Subj as noteSub,
												CN.Note_Text as noteTxt,
												UD.firstname as udFn,
												UD.lastname as udLn,
												U.IBO_UserName as usname
												FROM customer_note CN
												LEFT JOIN user U on CN.IBO_UserID=U.IBO_UserID
												LEFT JOIN user_detail UD on CN.IBO_UserID=UD.IBO_UserID
												WHERE CN.Customer_ID='".$cid."' AND CN.IBO_UserID='".$uid."'
												ORDER BY CN.Review_Date DESC
												");
			$getNotes = fetch_all_array($qNotes);
			$subj = "";
			$type = "";
			$nm = "";
			$date = "";
			$datas = array();
			$count = 1;
			foreach ($getNotes as $note) {
				if($note['noteSub']!=''){
					$subj =  $note['noteSub'];
				}else{
					$subj =  "<span class='text-primary'>none</span>";
				}
				if($note['noteType']==1){
					$type =  "Other";
				}else if($note['noteType']==2){
					$type =  "Home";
				}else if($note['noteType']==3){
					$type =  "Vehicle";
				}else if($note['noteType']==0 || $note['noteType'] ==''){
					$type =  "<span class='text-primary'>none</span>";
				}
				if($note['udFn']=='' && $note['usname']!='' ){ 
						$nm =  "<span class='text-info'>".$note['usname']."</span>"; 
				}else if( $note['udFn']!='' && $note['usname']=='' ){ 
					$nm =  "<span class='text-info'>".$note['udFn']."</span>"; 
				}else if($note['udFn']!='' && $note['usname']!='' ){
					$nm =  "<span class='text-info'>".$note['udFn']."</span>";  
				}
				
				if($note['noteRDate']!=0){ $date = @date("m/d/Y h:i a",$note['noteRDate']); }else{ $date = "<span class='text-info'>Date unavailable.</span>"; }
				$nt = "<tr>
					<td>".$subj."</td>
					<td>".$type."</td>
					<td>".@nl2br(ucfirst($note['noteTxt']))."</td>
					<td>".$nm."</td>
					<td>".$date."</td>
					</tr>";
					array_push($datas, $nt);
			}
			// print_r($datas);
			echo json_encode($datas);
 ?>