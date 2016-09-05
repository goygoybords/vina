<?php 

	$id = $_GET['id'];
	require 'exportToPDF/multicelltable.php';
	require 'export_script.php';


	$cust = customers_info($id);
	$phones = getPhone($id);
	$home = home_list($cust['Customer_ID']);
	$veh = vehicle_list($cust['Customer_ID']);
	$fam = family_list($cust['Customer_ID'],$id);
	$notes = note_list($cust['Customer_ID']);
	$events = array();
	extract($cust);

	foreach ($home as $h) 
	{
		$events['id'] = $h['Address_ID'];
		array_push($events);
	}
	$home_detail = home_list_detail($events['id']);

	$pdf = new PDF();
	$pdf->AddPage('P','legal');
	$pdf->AddFont("helvetica");
	$pdf->SetFont("helvetica");
	$pdf->Ln();
	$pdf->SetFontSize(40);
	$pdf->SetTextColor(72,72,72);
	$pdf->Cell(150,5,"",0);
	$pdf->Cell(47,5,"VINAOUTSOURCE",0,0,"R");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetDrawColor(126,126,126);
	$pdf->SetTextColor(72,72,72);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFontSize(16);
	$pdf->Cell(150,5,"CUSTOMER INFORMATION");
	$pdf->SetFontSize(8);
	$pdf->Ln();

	$pdf->Cell(195,1,"","B");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(27,5,"NAME:",0,0,"L","False");
	$pdf->Cell(60,5,$Last_Name." ".$First_Name,0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");
	$pdf->Cell(50,5,"MARTIAL STATUS:",0,0,"L","False");
	$pdf->Cell(50,5,$Marital,0,0,"R","False");
	$pdf->Ln();
	$pdf->Cell(27,5,"GENDER:",0,0,"L","False");
	$pdf->Cell(60,5,$Gender_ID,0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");
	$pdf->Cell(50,5,"RELATION:",0,0,"L","False");
	$pdf->Cell(50,5,$Relationship,0,0,"R","False");
	$pdf->Ln();
	$pdf->Cell(27,5,"DATE OF BIRTH:",0,0,"L","False");
	$pdf->Cell(60,5,date('Y-m-d', $DOB ),0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");
	$pdf->Cell(50,5,"STATUS:",0,0,"L","False");
	$pdf->Cell(50,5,$Status_Desc,0,0,"R","False");

	$pdf->Ln();
	$pdf->Cell(27,5,"DRIVERS LICENSE:",0,0,"L","False");
	$pdf->Cell(60,5,$DL,0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");
	$pdf->Cell(50,5,"SSN:",0,0,"L","False");
	$pdf->Cell(50,5,$ssn,0,0,"R","False");

	$pdf->Ln();
	$pdf->Cell(27,5,"DL STATE:",0,0,"L","False");
	$pdf->Cell(60,5,$cdlstate,0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");
	$pdf->Cell(50,5,"BUSINESS NAME:",0,0,"L","False");
	$pdf->Cell(50,5,$businessname,0,0,"R","False");

	$pdf->Ln();
	$pdf->Cell(27,5,"SOURCE:",0,0,"L","False");
	$pdf->Cell(60,5,$Orig_Source,0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");
	$pdf->Cell(50,5,"LANGUAGE:",0,0,"L","False");
	$pdf->Cell(50,5,$Language_Name,0,0,"R","False");


	$pdf->Ln();
	$pdf->Cell(27,5,"EMAIL:",0,0,"L","False");
	$pdf->Cell(60,5,$EMail,0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");
	$pdf->Cell(50,5,"FOLLOW UP DATE:",0,0,"L","False");
	$pdf->Cell(50,5,date('Y-m-d' , $Review_Date),0,0,"R","False");

	$pdf->Ln();
	$pdf->Cell(27,5,"CAMPAIGN:",0,0,"L","False");
	$pdf->Cell(60,5,$title,0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");

	$pdf->Ln();
	$pdf->Cell(27,5,"PHONE NUMBERS:",0,0,"L","False");
	$pdf->Cell(60,5,$phones[0],0,0,"R","False");
	$pdf->Cell(10,5,"",0,0,"R","False");

	/* END REFEREE INFORMATION */
	$pdf->Ln();
	$pdf->Ln();

	/* FAMILY INFORMATION */
	$pdf->SetFontSize(16);
	$pdf->Cell(150,5,"FAMILY INFORMATION");
	$pdf->SetFontSize(8);
	$pdf->Ln();


	$pdf->Ln();
	$pdf->Ln();

	$pdf->Cell(50,9,"NAME",1,0,"L","True");
	$pdf->Cell(50,9,"RELATION",1,0,"L","True");
	$pdf->Cell(50,9,"SSN",1,0,"L","True");
	$pdf->Cell(50,9,"STATUS",1,0,"L","True");
	$pdf->Ln();

	// /* FAMILY TABLE  */
	$pdf->SetWidths(array(50,50,50,50));
	foreach ($fam as $f ) 
	{
		$pdf->Row(array($f['First_Name']." ".$f['Last_Name'], $f['Relationship'], $f['ssn'], $f['Status_Desc']));
	}
		
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFontSize(16);
	$pdf->Cell(150,5,"HOME INFORMATION");
	$pdf->SetFontSize(8);
	$pdf->Ln();
	$pdf->Ln();

	$pdf->Cell(60,9,"ADDRESS 1",1,0,"L","True");
	$pdf->Cell(60,9,"ADDRESS 2",1,0,"L","True");
	$pdf->Cell(30,9,"CITY",1,0,"L","True");
	$pdf->Cell(30,9,"STATE",1,0,"L","True");
	$pdf->Cell(20,9,"ZIP CODE",1,0,"L","True");
	$pdf->Ln();


	// /* Home Table */
	$pdf->SetWidths(array(60,60,30,30,20));
	if(count($home) > 0 )
	{
		foreach ($home as $h ) 
		{
			$pdf->Row(array($h['Address1'], $h['Address2'] ,$h['City'], $h['State_Name'], $h['Zip']));
		   
		}
	}
	else
		$pdf->Row(array("", "" ,"", "", "" ));

	$pdf->Ln();
	$pdf->Ln();

	$pdf->Cell(21,9,"BUILD DATE",1,0,"L","True");
	$pdf->Cell(20,9,"AREA",1,0,"L","True");
	$pdf->Cell(15,9,"LEVEL",1,0,"L","True");
	$pdf->Cell(15,9,"ALARM",1,0,"L","True");
	$pdf->Cell(20,9,"GARAGE",1,0,"L","True");
	$pdf->Cell(40,9,"COMPANY",1,0,"L","True");
	$pdf->Cell(20,9,"COVERAGE",1,0,"L","True");
	$pdf->Cell(20,9,"PREMIUM",1,0,"L","True");
	$pdf->Cell(30,9,"EXTERIOR WALLS",1,0,"L","True");

	$pdf->Ln();


	/* Home Table */
	 $pdf->SetWidths(array(21,20,15,15,20,40,20,20,30));
	if(count($home_detail) > 0 )
	{
		foreach ($home_detail as $h ) 
		{
			if($h['Alarm'] == 1)
				$alarm = "Has Alarm";
			else
				$alarm = "None";

			$pdf->Row(array($h['Build_Date'], $h['SqFt'] ,
				$h['Levels'], $alarm, $h['Garage'], $h['Company'],$h['Coverage'],
				$h['Premium'], $h['Exterior_Wall']) );
		}
	}
	else
		$pdf->Row(array("", "" ,"", "", "" ,"","","",""));

	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFontSize(16);
	$pdf->Cell(150,5,"VEHICLE INFORMATION");
	$pdf->SetFontSize(8);
	$pdf->Ln();
	$pdf->Ln();


	$pdf->Cell(30,9,"PLATE",1,0,"L","True");
	$pdf->Cell(40,9,"MANUFACTURER",1,0,"L","True");
	$pdf->Cell(20,9,"MODEL",1,0,"L","True");
	$pdf->Cell(30,9,"YEAR",1,0,"L","True");
	$pdf->Cell(30,9,"CARRIER",1,0,"L","True");
	$pdf->Cell(30,9,"PREMIUM",1,0,"L","True");
	
	$pdf->Ln();

	$pdf->SetWidths(array(30,40,20,30,30,30));
	if(count($veh) > 0)
	{
		foreach ($veh as $h ) 
		{
			$pdf->Row(array($h['vin'], $h['Manufacturer'] ,$h['Model'], 
				$h['Model_Year'], $h['Company'], $h['Premium'] ));
		}
	}
	$pdf->Ln();
	$pdf->Ln();
	
	$pdf->Cell(30,9,"EXPIRY DATE",1,0,"L","True");
	$pdf->Cell(40,9,"BODY INJURY",1,0,"L","True");
	$pdf->Cell(20,9,"COLLISION",1,0,"L","True");
	$pdf->Cell(30,9,"MEDICAL",1,0,"L","True");
	$pdf->Cell(30,9,"RENTAL",1,0,"L","True");
	$pdf->Cell(30,9,"TOWING",1,0,"L","True");
	$pdf->SetWidths(array(30,40,20,30,30,30));
	$pdf->Ln();
	if(count($veh) > 0)
	{
		foreach ($veh as $h ) 
		{
			$expiry = date('Y-m-d', $h['Expire_Date'] );
			$pdf->Row(array($expiry,
				$h['Bodily_Injury'], $h['Collision'], $h['Medical'] , $h['Rental'], $h['Towing']
				));
		}
	}

	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFontSize(16);
	$pdf->Cell(150,5,"NOTES");
	$pdf->SetFontSize(8);
	$pdf->Ln();
	$pdf->Ln();

	$pdf->Cell(30,9,"REVIEWED BY",1,0,"L","True");
	$pdf->Cell(30,9,"REVIEWED DATE",1,0,"L","True");
	$pdf->Cell(20,9,"NOTE TYPE",1,0,"L","True");
	$pdf->Cell(60,9,"SUBJECT",1,0,"L","True");
	$pdf->Cell(60,9,"NOTES",1,0,"L","True");
	$pdf->Ln();
	$pdf->SetWidths(array(30,30,20,60,60));
	if(count($veh) > 0)
	{
		foreach ($notes as $h ) 
		{
			if($h['Type'] == 1 or $h['Type'] == 0)
				$option = "Other";
			else if($h['Type'] == 2)
				$option = "Home";
			else if($h['Type'] == 3)
				$option = "Vehicle";


			$review_date = date('Y-m-d', $h['Review_Date'] );

			$pdf->Row(array($h['firstname']." ".$h['lastname'], $review_date, $option, 
				$h['Note_Subj'], $h['Note_Text'] ));
		}
	}
	else
		$pdf->Row(array("", "" ,"", "", "",));

	// EXPORTING PART
	$pdf->Output("exports/".$Customer_ID.".pdf","F");
	$file = "exports/".$Customer_ID.".pdf";
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean(); #THIS!
    flush();
    readfile($file);
?>