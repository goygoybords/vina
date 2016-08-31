<?php
	ini_set('max_execution_time', 20500);
	//ini_set('memory_limit', '-1');

	function assignees_list($db,$limit=''){
		$query = "Select Distinct U.IBOUID, U.IBO_UserID, U.IBO_UserName, U.Access_Level, A.AppDataDesc As UserRole
					From user U
					Left Join appdata A On ((A.AppItem = 'AccessLevel') And (A.ADID = U.Access_Level))
					Where (U.Access_Level > 0)
					Order By U.IBO_UserName";
		$getassignees = mysqli_query($db,$query);
		$assignees = fetch_all_array( $getassignees );
		return $assignees;
	}

	function language_list($db,$limit=''){
		$languages = mysqli_query($db,"SELECT * FROM languages");
	    $getlanguages = fetch_all_array($languages);
		return $getlanguages;
	}
	function referral_list($db){
		$referral_query = "Select Distinct Referral_LName, Referral_FName
							From customer_rating
							Where ((Referral_LName Is Not Null) And (Referral_LName <> '')) Or
								((Referral_FName Is Not Null) And (Referral_FName <> ''))
								ORDER BY Referral_FName";
		$getreferralist = mysqli_query($db,$referral_query);
	    $result = fetch_all_array($getreferralist);
		return $result;	
	}
	function statusresult_list($db){
		$status_query = mysqli_query($db,"SELECT * FROM status_results");
	    $statusresults = fetch_all_array($status_query);
		return $statusresults;		
	}
	function statuscustomer_list($db){
		$statusc_query = mysqli_query($db,"SELECT * FROM status_customer");
	    $statuscresults = fetch_all_array($statusc_query);
		return $statuscresults;		
	}
	function carrier_list($db){
		$carriers_query = mysqli_query($db,"SELECT * FROM carriers");
	    $carriersresults = fetch_all_array($carriers_query);
		return $carriersresults;		
	}
	function source_list($db){
		$source_query = mysqli_query($db,"SELECT * FROM status_source");
	    $sourceresults = fetch_all_array($source_query);
		return $sourceresults;
	}

	function get_reportassignees($db,$emp){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$assignees_query = "Select C.Customer_ID, S.Status_Desc,
							C.DOB, C.Phone, C.Phone_Alt, C.EMail, U.IBO_UserName, L.Language_Name,
							R.Note, N.Note_Text, C.CustomerID, C.Status_ID, C.Language_ID, R.AssignTo, C.CustomerID,
							C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip,hv.hvHomeCarrier,hv.hvAutocarrier
						From customer_rating R
						Left Join customers C On (R.Customer_ID = C.Customer_ID)
							Inner Join customer_address A On C.Customer_ID = A.Customer_ID
						Left Join languages L On (C.Language_ID = L.Language_ID)
						Left Join status_customer S On (C.Status_ID = S.Status_ID)
						Left Join customer_note N On (C.Customer_ID = N.Customer_ID)
						Left Join user U On (R.AssignTo = U.IBO_UserID)
						Left Join customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						Where (R.AssignTo = '".$emp."') GROUP BY C.Customer_ID
						Order By C.Last_Name Asc";
						//echo $assignees_query;				
		$getassignees = mysqli_query($db,$assignees_query);
		$result = fetch_all_array($getassignees);
		return $result;
		//sample query OANH limit 10
	}

	function get_reportlanguage($db,$langID,$statID){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		if($statID==0){
			$language_query = "Select C.Customer_ID, S.Status_Desc, L.Language_Name,
								C.DOB, C.Phone, C.EMail, C.Status_ID, C.CustomerID,
								C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip
							From customers C
							Left Join customer_address A On ((C.Address_ID = A.Address_ID) Or (C.Customer_ID = A.Customer_ID)) 
							Left Join languages L On (C.Language_ID = L.Language_ID) 
							Left Join status_customer S On (C.Status_ID = S.Status_ID)
							Where (C.Language_ID = '".$langID."') GROUP BY C.Customer_ID
							Order By C.Customer_ID Asc";
		}else{
			$language_query = "Select C.Customer_ID, S.Status_Desc, L.Language_Name,
								C.DOB, C.Phone, C.EMail, C.Status_ID, C.CustomerID,
								C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip
							From customers C
							Left Join customer_address A On ((C.Address_ID = A.Address_ID) Or (C.Customer_ID = A.Customer_ID)) 
							Left Join languages L On (C.Language_ID = L.Language_ID) 
							Left Join status_customer S On (C.Status_ID = S.Status_ID)
							Where (C.Language_ID = '".$langID."') AND C.Status_ID=".$statID." GROUP BY C.Customer_ID
							Order By C.Customer_ID Asc";			
		}
						//echo $language_query;
		$getlanguages = mysqli_query($db,$language_query);
	    $result = fetch_all_array($getlanguages);
		return $result;						
	}
	function get_production($db, $startdate,$enddate,$userid){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$production_query = "Select C.CustomerID,C.Customer_ID, C.Last_Name,C.First_Name, 
						A.Address1,A.City,A.State_ID,A.Zip, U.IBO_UserName, S.Status_Desc,Q.Effective, I.Company, Q.IBO_UserID,hv.hvHomeCarrier,hv.hvAutocarrier
						From customer_quote Q 
						Left Join customers C On (Q.Customer_ID = C.Customer_ID) 
						Left Join customer_address A On ((Q.Customer_ID = A.Customer_ID) Or (C.Address_ID = A.Address_ID)) 
						Left Join user U On (Q.IBO_UserID = U.IBO_UserID) 
						Left Join carriers I On (Q.NAIC = I.NAIC)
						Left Join status_customer S On (C.Status_ID = S.Status_ID)
						Left Join customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						Where ((Q.Effective > ".$startdate.") And (Q.Effective <= ".$enddate."))
					And (Q.IBO_UserID Like '".$userid."%' ) GROUP BY C.Customer_ID
				Order By U.IBO_UserName, Q.Effective Desc";
		//echo $production_query;	
		$getproduction = mysqli_query($db,$production_query);
		$result = fetch_all_array($getproduction);
		return $result;

		//sample query 06/14/2011 TIM
	}

	function get_productionsum($db, $startdate,$enddate,$userid){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$productionsum_query = "SELECT c.IBO_UserID,u.IBO_UserName, auto.*,home.* FROM customer_quote c LEFT JOIN (Select IBO_UserID , sum(Quote) as autosum FROM customer_quote where Policy_Code = 30 AND ((Effective >=".$startdate.") AND (Effective <=".$enddate.")) Group By IBO_UserID) as auto ON c.IBO_UserID = auto.IBO_UserID 
			LEFT JOIN 
			(Select IBO_UserID , sum(Quote) as homesum FROM customer_quote where Policy_Code = 40 AND ((Effective >=".$startdate.") AND (Effective <=".$enddate.")) Group By IBO_UserID) as home ON c.IBO_UserID = home.IBO_UserID
			LEFT JOIN user u ON c.IBO_UserID = u.IBO_UserID
			WHERE c.IBO_UserID = '".$userid."'
		GROUP BY c.IBO_UserID";
		//echo $productionsum_query;
		$getproductionsum = mysqli_query($db,$productionsum_query);
		$result = fetch_all_array($getproductionsum);
		return $result;
			//sample query Tim 6/14/2011
	}

	function get_reportprospect($db, $startdate,$enddate){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$prospect_query = "Select C.CustomerID,C.Customer_ID, S.Status_Desc,
							C.Phone, H.Called, H.Call_Count, R.Result_Desc, H.Result_ID, U.IBO_UserName, H.AssignTo,
							C.Status_ID,hv.hvHomeCarrier,hv.hvAutocarrier,
							C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip,C.Review_Date
						From customers C
						Left Join customer_address A On ((C.Address_ID = A.Address_ID) Or (C.Customer_ID = A.Customer_ID)) 
						Left Join customer_rating H On (C.Customer_ID = H.Customer_ID) 
							Left Join status_results R On (H.Result_ID = R.Result_ID) 
							Left Join user U On (H.AssignTo = U.IBO_UserID) 
						Left Join status_customer S On (C.Status_ID = S.Status_ID)
						Left Join customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						Where ((C.Review_Date >= ".$startdate.") And (C.Review_Date <= ".$enddate.")) And
							(C.Status_ID = 30)
						Order By C.Review_Date Desc";
		$getprospects = mysqli_query($db,$prospect_query);
	    $result = fetch_all_array($getprospects);
		return $result;	
//sample query Aug 1,2013
// Select C.Customer_ID, S.Status_Desc, C.Last_Name + ', ' + C.First_Name As Customer, A.Address1 + ' ' + A.Address2 + ', ' + A.City + ' ' + A.State_ID + ' ' + A.Zip As Address, C.Phone, H.Called, H.Call_Count, R.Result_Desc, H.Result_ID, U.IBO_UserName, H.AssignTo, C.Status_ID, C.CustomerID, C.Last_Name, C.First_Name, A.Address1,A.Address2,A.City,A.State_ID,A.Zip From customers C Left Join customer_address A On ((C.Address_ID = A.Address_ID) Or (C.Customer_ID = A.Customer_ID)) Left Join customer_rating H On (C.Customer_ID = H.Customer_ID) Left Join status_results R On (H.Result_ID = R.Result_ID) Left Join user U On (H.AssignTo = U.IBO_UserID) Left Join status_customer S On (C.Status_ID = S.Status_ID) Where ((C.Review_Date >= 1375333200) And (C.Review_Date <= 1375419600)) And (C.Status_ID = 30) Order By C.Review_Date Desc, Customer Asc

	}
	function get_reportquoted($db, $startdate,$enddate){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$quoted_query = "Select C.Customer_ID, P.QStatus_Desc,T.Policy_Type As Policy, R.Grade,U.IBO_UserName, 
							K.Company, Q.Quote, Q.QuoteDate, Q.Bind, Q.Effective,  
							C.DOB, C.Phone, C.Phone_Alt,
							C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip, C.CustomerID,
							Q.IBO_UserID, Q.QStatus_ID,hv.hvHomeCarrier,hv.hvAutocarrier
						From customer_quote Q
							Left Join customers C On (Q.Customer_ID = C.Customer_ID) 
							Left Join customer_address A On C.Address_ID = A.Address_ID
							Left Join status_quote P On (Q.QStatus_ID = P.QStatus_ID)
							Left Join policy T On (Q.Policy_Code = T.Policy_Code)
							Left Join user U On (Q.IBO_UserID = U.IBO_UserID)
							Left Join carriers K On (Q.NAIC = K.NAIC)
							Left Join customer_rating R On (Q.Customer_ID = R.Customer_ID)
							Left Join customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						Where ((Q.QuoteDate >= ".$startdate.") And (Q.QuoteDate <= ".$enddate."))
						Order By Q.QuoteDate Desc, Q.Policy_Code";
						//echo $quoted_query;
		$getquoted = mysqli_query($db,$quoted_query);
	    $result = fetch_all_array($getquoted);
		return $result;
		//sample query 03/09/2011 to 03/11/2011
	}
	function get_reportreferral($db, $fname,$lname){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$referral_query = "Select C.Customer_ID, S.Status_Desc, C.Last_Name, C.First_Name , 
							A.Address1 , A.City , A.State_ID ,A.Zip As Address, C.DOB, C.Phone, C.Phone_Alt , 
							C.EMail, C.Status_ID, C.CustomerID, Referral_LName, Referral_FName,hv.hvHomeCarrier,hv.hvAutocarrier
							From customer_rating R 
							Left Join customers C On R.Customer_ID = C.Customer_ID
							Inner Join customer_address A On C.Customer_ID = A.Customer_ID
							Left Join status_customer S On C.Status_ID = S.Status_ID
							Left Join customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
							Where ((Lower(R.Referral_LName) Like '".$lname."%') AND (Lower(R.Referral_FName) Like '".$fname."%' ))";
						//echo $referral_query;
		$getreferral = mysqli_query($db,$referral_query);
	    $result = fetch_all_array($getreferral);
		return $result;	

		//sample query: Lori Le limit 20
	}
	function get_reportscore($db, $scorefrom,$scoreto){//skipped
		$score_query = "Select C.Customer_ID, S.Status_Desc, R.Score, 
						C.DOB, C.Phone ,C.Phone_Alt , C.EMail, C.Status_ID, C.CustomerID,
						C.Last_Name, C.First_Name, A.Address1,A.Address2,A.City,A.State_ID,A.Zip
					From customer_rating R
					Left Join customers C On (R.Customer_ID = C.Customer_ID)
						Inner Join customer_address A On C.Address_ID = A.Address_ID
					Left Join status_customer S On (C.Status_ID = S.Status_ID)
					Where R.Score BETWEEN ".$scorefrom." AND ".$scoreto."
					Order By R.Score Desc, C.Customer_ID Asc";
					//echo $score_query;
	}
	function get_reportstatus($db, $statusID){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$status_query = "Select C.Customer_ID, S.Status_Desc,
							C.Phone, H.Called, H.Call_Count, R.Result_Desc, H.Result_ID, U.IBO_UserName, H.AssignTo, 
							C.Status_ID, C.CustomerID,C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip,
							hv.hvHomeCarrier,hv.hvAutocarrier
						From customers C
						Left Join customer_address A On C.Customer_ID = A.Customer_ID
						Left Join customer_rating H On C.Customer_ID = H.Customer_ID 
						Left Join status_results R On H.Result_ID = R.Result_ID
						Left Join user U On H.AssignTo = U.IBO_UserID 
						Left Join status_customer S On C.Status_ID = S.Status_ID
						Left Join customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						Where C.Status_ID = ".$statusID."
						Order By C.First_Name Asc";
						//echo $status_query;
		$getstatus = mysqli_query($db,$status_query);
	    $result = fetch_all_array($getstatus);
		return $result;							
		//sample query Bad #

	}
	function get_reportsource($db, $source){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$source_query = "Select C.CustomerID,C.Customer_ID, A.City, Status_Customer.Status_Desc, P.Expire_Date, T.Policy_Type, 
                      C.DOB, U.IBO_UserName, T.Policy_Type AS Expr1, P.PolicyNo, K.Company, 
                      P.Premium, P.RenewPremium, P.Bind_Date, C.Last_Name, C.First_Name, A.Address1, A.State_ID, A.Zip,
                      hv.hvHomeCarrier,hv.hvAutocarrier
					  FROM customers AS C INNER JOIN
                      status_customer ON C.Status_ID = Status_Customer.Status_ID 
                      LEFT OUTER JOIN customer_address AS A ON C.Customer_ID = A.Customer_ID 
                      LEFT OUTER JOIN customer_rating AS R ON C.Customer_ID = R.Customer_ID 
                      LEFT OUTER JOIN user AS U ON R.AssignTo = U.IBO_UserID 
                      LEFT OUTER JOIN customer_policy AS P ON C.Customer_ID = P.Customer_ID 
                      LEFT OUTER JOIN policy AS T ON P.Policy_Code = T.Policy_Code 
                      LEFT OUTER JOIN status_quote AS Q ON P.StatusID = Q.QStatus_ID 
                      LEFT OUTER JOIN Carriers AS K ON P.Carrier_NAIC = K.NAIC
                      LEFT JOIN customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						WHERE     (C.Orig_Source_ID = ".$source.")
						ORDER BY C.Customer_ID";
					//echo $source_query;
		$getsources = mysqli_query($db,$source_query);
	    $result = fetch_all_array($getsources);
		return $result;
	//sample query VINA limit 10
	}
	function get_reportbinddate($db, $startdate,$enddate){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$binddate_query = "Select C.Customer_ID, P.Status_Desc, Q.Bind, T.Policy_Type As Policy,
							C.DOB, C.Phone, C.Phone_Alt, C.EMail,hv.hvHomeCarrier,hv.hvAutocarrier,
							C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip, C.Status_ID, C.CustomerID
						From customer_quote Q
						Left Join customers C On (Q.Customer_ID = C.Customer_ID) 
						Left Join customer_address A On C.Customer_ID = A.Customer_ID 
						Left Join status_customer P On C.Status_ID = P.Status_ID
						Left Join policy T On Q.Policy_Code = T.Policy_Code
						LEFT JOIN customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						Where ((Q.Bind >= ".$startdate.") And (Q.Bind <= ".$enddate."))
						Order By Q.Bind Desc, Q.Policy_Code";
					//echo $binddate_query;
		$getreportbinddate = mysqli_query($db,$binddate_query);
	    $result = fetch_all_array($getreportbinddate);
		return $result;	
		//sample query 4/01/2012-4/05
	}
	function get_reportcarrierauto($db, $carrierid){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$carrierauto_query = "Select C.Customer_ID, S.Status_Desc, D.Company, 
						C.EMail, C.Status_ID, C.CustomerID, C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip 
						From customer_auto_policy P 
						Left Join customer_auto_info I On (P.Vehicle_ID = I.Vehicle_ID) Inner Join customers C On (I.Customer_ID = C.Customer_ID) Inner Join customer_address A On C.Customer_ID = A.Customer_ID 
						Left Join carriers D On(P.Carrier_NAIC = D.NAIC) 
						Left Join status_customer S On (C.Status_ID = S.Status_ID)
						Where (P.Carrier_NAIC = ".$carrierid.")
						Order By D.Company";
						//echo $carrierauto_query;
		$getcarriersauto = mysqli_query($db,$carrierauto_query);
	    $result = fetch_all_array($getcarriersauto);
		return $result;
		//sample query american national lloyds
	}
	function get_reportcarrierhome($db, $carrierhomeid){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$carrierhome_query = "Select C.Customer_ID, S.Status_Desc, D.Company,
					C.DOB, C.Phone,C.Phone_Alt, C.EMail, C.Status_ID, C.CustomerID,
					C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip
					From customer_home_policy P
					Left Join customer_address A On P.Address_ID = A.Address_ID
						Inner Join customers C On C.Customer_ID = A.Customer_ID
					Left Join carriers D On(P.Carrier_NAIC = D.NAIC)
					Left Join status_customer S On C.Status_ID = S.Status_ID
					Where (P.Carrier_NAIC = ".$carrierhomeid.")
					Order By D.Company";
					//echo $carrierhome_query;
		$getcarrierhome = mysqli_query($db,$carrierhome_query);
	    $result = fetch_all_array($getcarrierhome);
		return $result;
		//sample query asi-lloyds
	}
	function get_reportdob($db, $startdate,$enddate){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$dob_query = "Select C.Customer_ID, C.DOB, S.Status_Desc,
					C.Phone, C.EMail, C.Status_ID, C.CustomerID,hv.hvHomeCarrier,hv.hvAutocarrier,
					C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip
				From customers C
				Left Join customer_address A On C.Customer_ID = A.Customer_ID
				Left Join status_customer S On C.Status_ID = S.Status_ID
				LEFT JOIN customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
				Where ((C.DOB >= ".$startdate.") And (C.DOB <= ".$enddate."))
				Order By C.DOB Desc";
		$getdob = mysqli_query($db,$dob_query);
	    $result = fetch_all_array($getdob);
		return $result;	
		//sample 02/03/1981 2/15
	}
	function get_reportexpireauto($db, $startdate,$enddate){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$expireauto_query = "Select C.CustomerID,C.Customer_ID, S.Status_Desc, H.Expire_Date,
				C.Last_Name, C.First_Name, C.DOB, M.Marital,
				A.Address1,A.City,A.Zip,I.Model,I.Model_Year,
				C.Phone, C.EMail,hv.hvHomeCarrier,hv.hvAutocarrier,
				D.Company, H.Premium
			From customer_auto_policy H
			Left Join carriers D On (H.Carrier_NAIC = D.NAIC)
			Left Join customer_auto_info I On (H.Vehicle_ID = I.Vehicle_ID)
			Left Join customers C On (I.Customer_ID = C.Customer_ID)
			Left Join customer_address A On (A.Customer_ID = C.Customer_ID)
			Left Join status_customer S On (C.Status_ID = S.Status_ID)
			Left Join status_marital M On (C.Marital_ID = M.Marital_ID)
			LEFT JOIN customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
			Where ((H.Expire_Date >= ".$startdate.") And (H.Expire_Date <= ".$enddate.")) AND C.CustomerID IS NOT NULL
			Order By H.Expire_Date Asc";
			//echo $expireauto_query;
		$getexpireauto = mysqli_query($db,$expireauto_query);
	    $result = fetch_all_array($getexpireauto);
		return $result;
		//sample 11/18/2016 11/19			
	}
	function get_reportexpirehome($db, $startdate,$enddate){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$expirehome_query = "Select C.CustomerID,C.Customer_ID, S.Status_Desc, H.Expire_Date,
				C.Last_Name, C.First_Name, C.DOB, M.Marital,
				A.Address1,A.City,A.Zip,I.Build_Date,
				C.Phone, C.EMail,hv.hvHomeCarrier,hv.hvAutocarrier,
				D.Company, H.Coverage, H.Premium
			From customer_home_policy H
			Left Join carriers D On (H.Carrier_NAIC = D.NAIC)
			Left Join customer_address A On (H.Address_ID = A.Address_ID) 
					Inner Join customers C On ((A.Address_ID = C.Address_ID) Or (A.Customer_ID = C.Customer_ID)) 
			Left Join customer_home_info I On (H.Address_ID = I.Address_ID)
			Left Join status_customer S On (C.Status_ID = S.Status_ID)
			Left Join status_marital M On (C.Marital_ID = M.Marital_ID)
			LEFT JOIN customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
			Where ((H.Expire_Date >= ".$startdate.") And (H.Expire_Date <= ".$enddate."))
			Order By H.Expire_Date Asc";
			//echo $expirehome_query;
		$getexpirehome = mysqli_query($db,$expirehome_query);
	    $result = fetch_all_array($getexpirehome);
		return $result;
		//sample 11/18/2016 11/19
	}
	function get_reportfollowup($db, $startdate,$enddate){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$followup_query = "Select C.Customer_ID, P.Status_Desc, R.FollowUp,C.Review_Date,
				C.DOB, C.Phone, C.Phone_Alt, C.EMail, C.Status_ID, C.CustomerID,
				C.Last_Name, C.First_Name, A.Address1,A.City,A.State_ID,A.Zip,
				hv.hvHomeCarrier,hv.hvAutocarrier
			From customer_rating R
			Left Join customers C On R.Customer_ID = C.Customer_ID
			Left Join customer_address A On C.Customer_ID = A.Customer_ID
			Left Join status_customer P On (C.Status_ID = P.Status_ID)
			LEFT JOIN customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
			Where ((C.Review_Date >= ".$startdate.") And (C.Review_Date <= ".$enddate."))
			Order By C.Review_Date Asc";

			//Where ((R.FollowUp >= ".$startdate.") And (R.FollowUp <= ".$enddate."))
		$getfollowup = mysqli_query($db,$followup_query);
	    $result = fetch_all_array($getfollowup);
		return $result;
	//sample query 10/27/2011 limit 10
	}
	function get_reportgrade($db,$selected_grades){
		mysqli_query($db, "SET OPTION SQL_BIG_SELECTS=1");
		$grades_query = "Select C.Customer_ID, S.Status_Desc, R.Grade,
							C.Last_Name, C.First_Name, 
							A.Address1,A.City,A.State_ID,A.Zip,hv.hvHomeCarrier,hv.hvAutocarrier,
							C.DOB, C.Phone,C.Phone_Alt, C.EMail, C.Status_ID, C.CustomerID
						From customer_rating R
						Left Join customers C On (R.Customer_ID = C.Customer_ID)
							Inner Join customer_address A On C.Address_ID = A.Address_ID
						Left Join status_customer S On (C.Status_ID = S.Status_ID)
						LEFT JOIN customer_homevehicle_v hv On C.CustomerID = hv.hvCustomerID
						Where R.Grade IN(".$selected_grades.")
						Order By R.Grade Desc, C.Customer_ID Asc";
				//echo $grades_query;
		$getgrades_query = mysqli_query($db,$grades_query);
	    $result = fetch_all_array($getgrades_query);
		//var_dump($result);
		return $result;
	}
?>