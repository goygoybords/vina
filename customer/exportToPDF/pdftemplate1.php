<?php

require 'multicelltable.php';
// class PDF extends FPDF{}
$pdf = new PDF();


$pdf->AddPage('P','legal');
$pdf->AddFont("helvetica");
$pdf->SetFont("helvetica");
// $pdf->Cell(150,5,$pdf->Image("",$pdf->GetX(),$pdf->GetY()),0);
// $pdf->Ln();
// $pdf->SetFontSize(10);
// $pdf->SetTextColor(72,72,72);
// $pdf->Cell(150,5,"",0);
// $pdf->Cell(47,5,"CheckThemPlease",0,0,"R");
// $pdf->Ln();
// $pdf->Cell(150,5,"",0);
// $pdf->Cell(47,5,"www.checkthemplease.com.au",0,0,"R");
// $pdf->Ln();
// $pdf->Cell(150,5,"",0);
// $pdf->Cell(47,5,"admin@checkthemplease.com.au",0,0,"R");
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Cell(150,5,"",0);
// $pdf->Cell(47,5,"Date/Time: "."",0,0,"R");
// $pdf->Ln();
// $pdf->Ln();
/* REFEREE INFORMATION */
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
$pdf->Cell(60,5,"Filjumar Jumamoy",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");
$pdf->Cell(50,5,"MARTIAL STATUS:",0,0,"L","False");
$pdf->Cell(50,5,"vcvcv",0,0,"R","False");
$pdf->Ln();
$pdf->Cell(27,5,"GENDER:",0,0,"L","False");
$pdf->Cell(60,5,"bvbvbvbvbvb",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");
$pdf->Cell(50,5,"RELATION:",0,0,"L","False");
$pdf->Cell(50,5,"oiiuoioio",0,0,"R","False");
$pdf->Ln();
$pdf->Cell(27,5,"DATE OF BIRTH:",0,0,"L","False");
$pdf->Cell(60,5,"xcxcxcxc",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");
$pdf->Cell(50,5,"STATUS:",0,0,"L","False");
$pdf->Cell(50,5,"cvbcvbvcbcvbvcb",0,0,"R","False");

$pdf->Ln();
$pdf->Cell(27,5,"DRIVERS LICENSE:",0,0,"L","False");
$pdf->Cell(60,5,"license",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");
$pdf->Cell(50,5,"SSN:",0,0,"L","False");
$pdf->Cell(50,5,"ssn",0,0,"R","False");

$pdf->Ln();
$pdf->Cell(27,5,"DL STATE:",0,0,"L","False");
$pdf->Cell(60,5,"sate",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");
$pdf->Cell(50,5,"BUSINESS NAME:",0,0,"L","False");
$pdf->Cell(50,5,"cvbcvbvcbcvbvcb",0,0,"R","False");

$pdf->Ln();
$pdf->Cell(27,5,"SOURCE:",0,0,"L","False");
$pdf->Cell(60,5,"sate",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");
$pdf->Cell(50,5,"LANGUAGE:",0,0,"L","False");
$pdf->Cell(50,5,"cvbcvbvcbcvbvcb",0,0,"R","False");


$pdf->Ln();
$pdf->Cell(27,5,"EMAIL:",0,0,"L","False");
$pdf->Cell(60,5,"sate",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");
$pdf->Cell(50,5,"FOLLOW UP DATE:",0,0,"L","False");
$pdf->Cell(50,5,"cvbcvbvcbcvbvcb",0,0,"R","False");

$pdf->Ln();
$pdf->Cell(27,5,"CAMPAIGN:",0,0,"L","False");
$pdf->Cell(60,5,"camp",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");

$pdf->Ln();
$pdf->Cell(27,5,"PHONE NUMBERS:",0,0,"L","False");
$pdf->Cell(60,5,"camp",0,0,"R","False");
$pdf->Cell(10,5,"",0,0,"R","False");

/* END REFEREE INFORMATION */
$pdf->Ln();
$pdf->Ln();

/* FAMILY INFORMATION */
$pdf->SetFontSize(16);
$pdf->Cell(150,5,"FAMILY INFORMATION");
$pdf->SetFontSize(8);
$pdf->Ln();

// $pdf->Cell(195,1,"","B");
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Cell(27,5,"NAME:",0,0,"L","False");
// $pdf->Cell(60,5,"asdasdasD",0,0,"R","False");
// $pdf->Cell(10,5,"",0,0,"R","False");
// $pdf->Cell(50,5,"POSITION APPLICANT HELD WITH REFEREE:",0,0,"L","False");
// $pdf->Cell(50,5,"zxczxcxzczxczxc",0,0,"R","False");
// $pdf->Ln();
// $pdf->Cell(27,5,"EMAIL:",0,0,"L","False");
// $pdf->Cell(60,5,"123123213",0,0,"R","False");
// $pdf->Cell(10,5,"",0,0,"R","False");
// $pdf->Cell(50,5,"PHONE:",0,0,"L","False");
// $pdf->Cell(50,5,"sdfsdfdsfsdfsdfdsfdsf",0,0,"R","False");
/* END FAMILY INFORMATION */

// $pdf->Ln();
// $pdf->Ln();
// $pdf->SetFontSize(10);
// $pdf->Cell(150,5,"Can you confirm that the applicant worked for your company over the following period?");
// $pdf->SetFontSize(8);
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(50,9,"NAME",1,0,"L","True");
$pdf->Cell(50,9,"RELATION",1,0,"L","True");
$pdf->Cell(50,9,"SSN",1,0,"L","True");
$pdf->Cell(50,9,"STATUS",1,0,"L","True");
$pdf->Ln();

/* FAMILY TABLE  */
$pdf->SetWidths(array(50,50,50,50));

$pdf->Row(array("sdsdsd","vcvcvcv","ssdsdsd","sdsdsdsd"));

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


/* Home Table */
$pdf->SetWidths(array(60,60,30,30,20));
$pdf->Row(array("sdsdsd","vcvcvcv","ssdsdsd","sdsdsdsd", "asdasd"));
$pdf->Ln();
$pdf->Ln();

$pdf->SetFontSize(16);
$pdf->Cell(150,5,"VEHICLE INFORMATION");
$pdf->SetFontSize(8);
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(15,9,"ID",1,0,"L","True");
$pdf->Cell(40,9,"MANUFACTURER",1,0,"L","True");
$pdf->Cell(40,9,"MODEL",1,0,"L","True");
$pdf->Cell(15,9,"YEAR",1,0,"L","True");
$pdf->Cell(50,9,"CARRIER",1,0,"L","True");
$pdf->Cell(19,9,"PREMIUM",1,0,"L","True");
$pdf->Cell(25,9,"EXPIRY DATE",1,0,"L","True");
$pdf->Ln();



/* Table 3 */
$pdf->SetWidths(array(15,40,40,15,50,19,25));

// $pdf->Row(array("How did you rate the person's overall performance?","       ".$questionone,$commentone));
// $pdf->Row(array("How would you rate the person's attendance?","       ".$questiontwo,$commenttwo));
// $pdf->Row(array("How would you rate the person's ability to get along with management and follow their instructions?","       ".$questionthree,$commentthree));
// $pdf->Row(array("How would you rate the person's ability to get along with co-workers?","       ".$questionfour,$commentfour));
// $pdf->Row(array("How would you rate the person's work ethic?","       ".$questionfive,$commentfive));
// $pdf->Row(array("How good would you rate the person knowledge of the job and industry?","       ".$questionsix,$commentsix));
// $pdf->Row(array("How good would you rate the person computer/technology skills specific to the job?","       ".$questionseven,$commentseven));
// $pdf->Row(array("How would you rate their problem solving skills?","       ".$questioneight,$commenteight));
// $pdf->Row(array("How would you rate the person's organisation skills?","       ".$questionnine,$commentnine));
// $pdf->Row(array("How well would you rate the person's time management and ability to meet strict deadlines?","       ".$questionten,$commentten));
// $pdf->Row(array("Are you aware of any workers compensations claims that the person was involved in?","       ".$ynone2,$yncommentone));
// $pdf->Row(array("Are there any issues or concerns that you think their next employer should be aware of?","       ".$yntwo2,$yncommenttwo));
// $pdf->Row(array("Is the person someone who you would be happy to continue working with or if they no longer work for you would you consider re-employing them?","       
// 	".$ynthree2,$yncommentthree));

$pdf->Output("test.pdf","F");
?>