<?php

//set_include_path('../../include');
require("../../include/db/dbconnect.php");
opendb();
include("../../include/sqlscripts/sqlscripts.php");
include('reportscripts.php');

if(count($_POST)){

	$selectedreport = $_POST['report_select'];
	//echo $selectedreport;

	if($selectedreport == "assigned"){
		$assigned = $_POST['assignees'];
		
		include('../../reports/report_tables/assigned_table.php');

	}else if($selectedreport == "language"){
		$language = $_POST['languages'];
		$langstatus = $_POST['status_language'];
		include('../../reports/report_tables/language_table.php');
	}else if($selectedreport == "production"){
		$producers = $_POST['producers'];
		$production_sdate = $_POST['production_sdate'];
		$production_edate = $_POST['production_edate'];
		$unix_production_sdate = new DateTime($production_sdate);
		$unix_production_edate = new DateTime($production_edate);

		//var_dump(get_production($db, $unix_production_sdate->getTimestamp(),$unix_production_edate->getTimestamp(),$producers));
		include('../../reports/report_tables/production_table.php');

	}else if($selectedreport == "productionsum"){
		$productionsum = $_POST['producerssum'];
		$productionsum_sdate = $_POST['productionsum_sdate'];
		$productionsum_edate = $_POST['productionsum_edate'];
		$unix_productionsum_sdate = new DateTime($productionsum_sdate);
		$unix_productionsum_edate = new DateTime($productionsum_edate);

		include('../../reports/report_tables/productionsum_table.php');

	}else if($selectedreport == "prospect"){
		$prospect_sdate = $_POST['prospect_sdate'];
		$prospect_edate = $_POST['prospect_edate'];
		$unix_prospect_sdate = new DateTime($prospect_sdate);
		$unix_prospect_edate = new DateTime($prospect_edate);

		include('../../reports/report_tables/prospect_table.php');

	}else if($selectedreport == "quoted"){
		$quote_sdate = $_POST['quote_sdate'];
		$quote_edate = $_POST['quote_edate'];
		$unix_quote_sdate = new DateTime($quote_sdate);
		$unix_quote_edate = new DateTime($quote_edate);

		include('../../reports/report_tables/quoted_table.php');

	}	else if($selectedreport == "referral"){
		$referral = $_POST['referralassignees'];
		list($fname,$lname) = explode("_", $referral);
		//echo $fname."<-f";
		
		include('../../reports/report_tables/referral_table.php');

	}else if($selectedreport == "score"){
		$scorefrom = $_POST['score_from'];
		$scoreto = $_POST['score_to'];

		get_reportscore($db,$scorefrom,$scoreto);
		//inc table with function call

	}else if($selectedreport == "status"){
		$statusresult = $_POST['status_result'];
		
		include('../../reports/report_tables/status_table.php');

	}else if($selectedreport == "source"){
		$sourceselected = $_POST['sources'];
		//var_dump(get_reportsource($db, $sourceselected));

		include('../../reports/report_tables/source_table.php');

	}else if($selectedreport == "binddate"){
		$binddate_sdate = $_POST['binddate_sdate'];
		$binddate_edate = $_POST['binddate_edate'];
		$unix_binddate_sdate = new DateTime($binddate_sdate);
		$unix_binddate_edate = new DateTime($binddate_edate);

		include('../../reports/report_tables/binddate_table.php');

	}else if($selectedreport == "carrierauto"){
		$carrierauto = $_POST['rcarriersauto'];
		//echo $carrierauto;

		include('../../reports/report_tables/carrierauto_table.php');	

	}else if($selectedreport == "carrierhome"){
		$carrierhome = $_POST['rcarriershome'];
		//echo $carrierhome;
		include('../../reports/report_tables/carrierhome_table.php');	

	}else if($selectedreport == "dob"){
		$dob_sdate = $_POST['dob_sdate'];
		$dob_edate = $_POST['dob_edate'];
		$unix_dob_sdate = new DateTime($dob_sdate);
		$unix_dob_edate = new DateTime($dob_edate);

		include('../../reports/report_tables/dob_table.php');

	}else if($selectedreport == "expireauto"){
		$expireauto_sdate = $_POST['expireauto_sdate'];
		$expireauto_edate = $_POST['expireauto_edate'];
		$unix_expireauto_sdate = new DateTime($expireauto_sdate);
		$unix_expireauto_edate = new DateTime($expireauto_edate);

		include('../../reports/report_tables/expireauto_table.php');

	}else if($selectedreport == "expirehome"){
		$expirehome_sdate = $_POST['expirehome_sdate'];
		$expirehome_edate = $_POST['expirehome_edate'];
		$unix_expirehome_sdate = new DateTime($expirehome_sdate);
		$unix_expirehome_edate = new DateTime($expirehome_edate);

		include('../../reports/report_tables/expirehome_table.php');

	}else if($selectedreport == "followup"){
		$followup_sdate = $_POST['followup_sdate'];
		$followup_edate = $_POST['followup_edate'];
		$unix_followup_sdate = new DateTime($followup_sdate);
		$unix_followup_edate = new DateTime($followup_edate);

		include('../../reports/report_tables/followup_table.php');

	}else if($selectedreport == "grade"){
		$grade_a = $grade_b = $grade_c = $grade_d = $grade_e = $grade_f = "";
		$grades = array();
		if (isset($_POST['A'])) array_push($grades,"'".$_POST['A']."'");
		if (isset($_POST['B'])) array_push($grades,"'".$_POST['B']."'");
		if (isset($_POST['C'])) array_push($grades,"'".$_POST['C']."'");
		if (isset($_POST['D'])) array_push($grades,"'".$_POST['D']."'");
		if (isset($_POST['E'])) array_push($grades,"'".$_POST['E']."'");
		if (isset($_POST['F'])) array_push($grades,"'".$_POST['F']."'");

		$selected_grades = implode(",",$grades);

		//get_reportgrade($db,$selected_grades);
		include('../../reports/report_tables/grade_table.php');
	}		
}

?>