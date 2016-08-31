<?php 

	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");

	$unixtime=time();
	opendb();

			$cus_id = $_POST['cus_id'];
			$datas = array();
			$nm = "";
			$qnotesM = mysqli_query($db,"SELECT CN.Customer_ID as cid,CN.IBO_UserID as uid,CN.Note_ID as latest
										FROM customer_note CN
										WHERE CN.Customer_ID='".$cus_id."'
										
										ORDER BY CN.Review_Date DESC
										"); // GROUP BY CN.IBO_UserID MAX(CN.Note_ID) as latest
			$getNotesM = fetch_all_array($qnotesM);
			foreach ($getNotesM as $noteM) {
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
										WHERE CN.Note_ID='".$noteM['latest']."'
										
										ORDER BY CN.Review_Date DESC
										"); // GROUP BY CN.IBO_UserID
			$getNotes = fetch_all_array($qnotes);

			foreach ($getNotes as $note) {
				if($note['noteSub']!=''){
						$subj =  $note['noteSub'];
					}else{
						$subj =  "<span class='text-primary'>none</span>";
					}
					
					$type = ""; if($note['noteType']==1){
						$type =  "Other";
					}else if($note['noteType']==2){
						$type =  "Home";
					}else if($note['noteType']==3){
						$type =  "Vehicle";
					}else if($note['noteType']==0 || $note['noteType'] ==''){
						$type =  "<span class='text-primary'>none</span>";
					}
					if($note['udFn']=='' && $note['usname']!='' ){ 
						$us = "<span class='text-info'>".$note['usname']."</span>"; 
					}else if( $note['udFn']!='' && $note['usname']=='' ){ 
						$us = "<span class='text-info'>".$note['udFn']."</span>"; 
					}else if($note['udFn']!='' && $note['usname']!='' ){
						$us = "<span class='text-info'>".$note['udFn']."</span>";  
					}
					if($note['noteRDate']!=0){ $dte = @date("m/d/Y h:i a",$note['noteRDate']); }else{ $dte = "<span class='text-info'>Date unavailable.</span>"; }
				$nm = '<tr>
					<td>'.$subj.'</td>
					<td>'.$type.'</td>
					<td class="showmore'.$note['Note_ID'].'" >'.ucfirst(mb_strimwidth($note['noteTxt'], 0, 150, "<span class='text-info showmore' data-attr='".$note['Note_ID']."' data-sh='more' style='cursor:pointer;'>&nbsp;> show more</span>")).'</td>
					<td>'.$us.'</td>
					<td>'.$dte.'</td>
				</tr>';
				array_push($datas, $nm);
			}
		}
		echo json_encode($datas);
 ?>