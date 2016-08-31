<?php 

	ini_set('memory_limit', '-1');
	set_include_path('../../include');
	require("db/dbconnect.php");
	require("sqlscripts/sqlscripts.php");
	$unixtime=time();
	opendb();

			$id = $_POST['id'];
			$qQoute = mysqli_query($db, "SELECT
											customer_quote.Quote,
											customer_quote.IBO_UserID,
											customer_quote.YearTotal,
											customer_quote.QuoteDate,
											customer_quote.Bind as qbind,
											customer_quote.Effective as qeff,
											customer_quote.Note as qNote,
											customer_quote.Quote_ID,
											customer_quote.Customer_ID,
											customer_quote.CustomerID,
											carriers.NAIC as carCom,
											policy.Policy_Type,
											status_quote.QStatus_Desc,
											status_quote.QStatus_ID as qid
											FROM customer_quote
											LEFT JOIN carriers on customer_quote.NAIC=carriers.NAIC
											LEFT JOIN policy on customer_quote.Policy_Code=policy.Policy_Code
											LEFT JOIN status_quote on customer_quote.QStatus_ID=status_quote.QStatus_ID
											WHERE customer_quote.QID='".$id."'
											");
			$getQ = mysqli_fetch_assoc($qQoute);
					// carrier 
			echo json_encode($getQ);
 ?>