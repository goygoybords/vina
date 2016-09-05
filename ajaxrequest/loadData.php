<?php
ini_set('memory_limit', '-1');
set_include_path('../include');
require("db/dbconnect.php");
include("ifjson/isjson.php");
require("sqlscripts/sqlscripts.php");
$unixtime=time();
opendb();
$where = '';
$join = '';
$joinAdd = '';
$tag = '';
$tagAdd = '';
$break = '';
$sql = '';
$brka = '';
$brkb = '';
if(isset($_REQUEST['where']) && isset($_REQUEST['searchby']))
{
  switch($_REQUEST['searchby'])
  {
    case '1':
      $tagAdd = ", customer_address.City,customer_address.County,customer_address.Zip,customer_address.Address1,customer_address.Address2,customer_address.State_ID,";

      $joinAdd = "LEFT JOIN `customer_address` on customers.Customer_ID=customer_address.Customer_ID ";
      $break = explode(" ",$_REQUEST['where']);
      if(count($break)>1)
      {
        $brka = $break[0];
        $brkb = $break[1];
         $where = "WHERE customers.Last_Name LIKE LOWER('".$_REQUEST['where']."%') OR customers.First_Name LIKE LOWER('".$_REQUEST['where']."%') OR ( CONCAT_WS(' ', customers.First_Name, customers.Last_Name) LIKE LOWER('".$_REQUEST['where']."%') ) OR ( CONCAT_WS(' ', customers.Last_Name, customers.First_Name) LIKE LOWER('".$_REQUEST['where']."%') ) OR ( customers.First_Name LIKE '%".$brka."%' AND customers.Last_Name LIKE '%". $brkb."%')
          OR ( customers.Last_Name LIKE LOWER('%".$brka."%') AND customers.First_Name LIKE LOWER('%". $brkb."%')) ";
      }else{
        $where = "WHERE customers.Last_Name LIKE LOWER('".$_REQUEST['where']."%') OR customers.First_Name LIKE LOWER('".$_REQUEST['where']."%') OR ( CONCAT_WS(' ', customers.First_Name, customers.Last_Name) LIKE LOWER('".$_REQUEST['where']."%') ) OR ( CONCAT_WS(' ', customers.Last_Name, customers.First_Name) LIKE LOWER('".$_REQUEST['where']."%') )";

      }
      
    break;
    case '2':
      $tagAdd = ", customer_address.City,customer_address.County,customer_address.Zip,customer_address.Address1,customer_address.Address2,customer_address.State_ID,";

      $joinAdd = "LEFT JOIN `customer_address` on customers.Customer_ID=customer_address.Customer_ID ";
      $tag = ", customer_policy.PolicyNo as cpolicyno";
      $join = "LEFT JOIN `customer_policy` on customers.CustomerID=customer_policy.CustomerID";
      // $where = "WHERE customer_policy.PolicyNo LIKE '%".$_REQUEST['where']."%'";
      $where = "WHERE customer_policy.PolicyNo LIKE '%".str_replace(' ', '', $_REQUEST['where'])."%'";
    break;
    case '3':
      $tagAdd = ", customer_address.City,customer_address.County,customer_address.Zip,customer_address.Address1,customer_address.Address2,customer_address.State_ID,";

      $joinAdd = "LEFT JOIN `customer_address` on customers.Customer_ID=customer_address.Customer_ID ";

      $where = "WHERE customer_address.Address1 LIKE LOWER('%".$_REQUEST['where']."%') 
                OR customer_address.City LIKE LOWER('%".$_REQUEST['where']."%') OR customer_address.County LIKE LOWER('%".$_REQUEST['where']."%') 
                OR customer_address.State_ID LIKE LOWER('%".$_REQUEST['where']."%') OR customer_address.Zip LIKE LOWER('%".$_REQUEST['where']."%') 
                OR ( CONCAT_WS(' ', customer_address.Address1, customer_address.City, customer_address.County, customer_address.State_ID, customer_address.Zip) 
                LIKE LOWER('%".$_REQUEST['where']."%') ) OR ( customer_address.Address2 LIKE LOWER('%".$_REQUEST['where']."%') 
                OR customer_address.City LIKE LOWER('%".$_REQUEST['where']."%') OR customer_address.County LIKE LOWER('%".$_REQUEST['where']."%') 
                OR customer_address.State_ID LIKE LOWER('%".$_REQUEST['where']."%') OR customer_address.Zip LIKE LOWER('%".$_REQUEST['where']."%') 
                OR ( CONCAT_WS(' ', customer_address.Address2, customer_address.City, customer_address.County, customer_address.State_ID, customer_address.Zip) 
                LIKE LOWER('%".$_REQUEST['where']."%') ) )";
    break;
    case '4':
      $tagAdd = ", customer_address.City,customer_address.County,customer_address.Zip,customer_address.Address1,customer_address.Address2,customer_address.State_ID,";

      $joinAdd = "LEFT JOIN `customer_address` on customers.Customer_ID=customer_address.Customer_ID ";
      $where = "WHERE customers.EMail LIKE LOWER('%".$_REQUEST['where']."%') ";
    break;
    case '5':
      $tagAdd = ", customer_address.City,customer_address.County,customer_address.Zip,customer_address.Address1,customer_address.Address2,customer_address.State_ID,";

      $joinAdd = "LEFT JOIN `customer_address` on customers.Customer_ID=customer_address.Customer_ID ";
      $where = "WHERE customer_phone.Phone LIKE '%".$_REQUEST['where']."%' ";
    break;
    case '6':
      $tagAdd = ", customer_address.City,customer_address.County,customer_address.Zip,customer_address.Address1,customer_address.Address2,customer_address.State_ID,";

      $joinAdd = "LEFT JOIN `customer_address` on customers.Customer_ID=customer_address.Customer_ID ";
      $where = "WHERE customer_business.businessname LIKE LOWER('%".$_REQUEST['where']."%') ";
    break;
    default:
      $tagAdd = ", customer_address.City,customer_address.County,customer_address.Zip,customer_address.Address1,customer_address.Address2,customer_address.State_ID,";

      $joinAdd = "LEFT JOIN `customer_address` on customers.Customer_ID=customer_address.Customer_ID ";
      $where = "WHERE customers.Last_Name LIKE LOWER('%".$_REQUEST['where']."%') OR customers.First_Name LIKE LOWER('%".$_REQUEST['where']."%') 
      OR ( CONCAT_WS(' ', customers.First_Name, customers.Last_Name) LIKE LOWER('%".$_REQUEST['where']."%') ) OR ( CONCAT_WS(' ', customers.Last_Name, customers.First_Name) LIKE LOWER('%".$_REQUEST['where']."%') )";
    break;
  }
 
}
if(isset($_REQUEST['sort']) && isset($_REQUEST['order']))
{
  switch($_REQUEST['sort'])
  {
    case '0':
      $sql = " ORDER BY status_customer.Status_Desc ".$_REQUEST['order'];
    break;
    case '1':
      $sql = " ORDER BY customers.Review_Date ".$_REQUEST['order'];
    break;
    case '2':
      $sql = " ORDER BY customers.First_Name ".$_REQUEST['order'];
    break;
    case '3':
      $sql = " ORDER BY customers.Last_Name ".$_REQUEST['order'];
    break;
    case '4':
      $sql = " ORDER BY customer_policy.PolicyNo ".$_REQUEST['order'];
    break;
    case '4':
      $sql = " ORDER BY customer_address.Address1 ".$_REQUEST['order'];
    break;
    case '5':
      $sql = " ORDER BY customers.EMail ".$_REQUEST['order'];
    break;
    case '6':
      $sql = " ORDER BY customer_phone.Phone ".$_REQUEST['order'];
    break;
    case '7':
      $sql = " ORDER BY customer_business.businessname ".$_REQUEST['order'];
    break;
    case '8':
      $sql = " ORDER BY customers.Review_Date ".$_REQUEST['order'];
    break;
    default:
      $sql = " ORDER BY customers.CustomerID ".$_REQUEST['order'];
    break;
  }
}
$res  = mysqli_query($db,"SELECT
                      customers.Customer_ID as customerids,
                      customers.CustomerID as custid,
                      customers.Last_Name,
                      customers.First_Name,
                      customers.Middle_Name,
                      customers.DOB,
                      customers.Phone,
                      customers.Phone_Alt,
                      customers.Email,
                      customers.Created_Date,
                      customers.Review_Date$tagAdd
                      -- customer_address.City,
                      -- customer_address.County,
                      -- customer_address.Zip,
                      -- customer_address.Address1,
                      -- customer_address.State_ID,
                      customer_business.businessname$tag,
                      status_customer.Status_Desc
                      FROM `customers`
                      $joinAdd
                      -- LEFT JOIN `customer_address` on customers.Address_ID=customer_address.Address_ID
                      LEFT JOIN `customer_business` on customers.CustomerID=customer_business.CustomerID
                      LEFT JOIN `customer_phone` on customers.CustomerID=customer_phone.CustomerID
                      LEFT JOIN `status_customer` on customers.Status_ID=status_customer.Status_ID
                      $join
                      $where
                      ");

$count  = mysqli_num_rows($res);

$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);

$recordsPerPage = (int) (!isset($_REQUEST['limit']) ? 10 :$_REQUEST['limit']);


$start = ($page-1) * $recordsPerPage;
$adjacents = "2";
 
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;   
$pagination = "";
if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination pull-right'>";
        if ($page > 1)
            $pagination.= "<a href=\"#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
 
            }
        }   
 
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
 
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href=\"#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
 
        $pagination.= "</div>";       
    }
 


$querys= mysqli_query($db,"SELECT
                      customers.Customer_ID as customerids,
                      customers.CustomerID as custid,
                      customers.Last_Name,
                      customers.First_Name,
                      customers.Middle_Name,
                      customers.DOB,
                      customers.Phone,
                      customers.Phone_Alt,
                      customers.Email,
                      customers.Created_Date,
                      customers.Review_Date$tagAdd
                      -- customer_address.City,
                      -- customer_address.County,
                      -- customer_address.Zip,
                      -- customer_address.Address1,
                      -- customer_address.State_ID,
                      customer_business.businessname,
                      customer_phone.Phone as cphone,
                      customer_phone.Phonetype as cphonetype,
                      customer_phone.id as phoneid$tag,
                      status_customer.Status_Desc
                      FROM `customers`
                      $joinAdd
                      -- LEFT JOIN `customer_address` on customers.Address_ID=customer_address.Address_ID
                      LEFT JOIN `customer_business` on customers.CustomerID=customer_business.CustomerID
                      LEFT JOIN `customer_phone` on customers.CustomerID=customer_phone.CustomerID
                      LEFT JOIN `status_customer` on customers.Status_ID=status_customer.Status_ID
                      $join
                      $where
                      $sql
                      LIMIT $start,$recordsPerPage
                      ");
    $getcustomers = fetch_all_array($querys);

$count  =   count($getcustomers);
$HTML='';
if($count > 0)
{ ?>
    <table class="table table-striped no-margin" id="listcus">
                        <thead>
                          <th>
                            <label><b>Status</b></label>
                          </th>
                          <th>
                            <label><b>First Name</b></label>
                          </th>
                          <th>
                            <label><b>Last Name</b></label>
                          </th>
                          <th>
                            <label><b>Policy #</b></label>
                          </th>
                          <th>
                            <label><b>Address</b></label>
                          </th>
                          <th>
                            <label><b>Email</b></label>
                          </th>
                          <th>
                            <label><b>Phone #</b>
                          <th>
                            <label><b>Business Name</b></label>
                          </th>
                          <th>
                            <label><b>Date Review</b></label>
                          </th>
                          <th><label><b>Action</b></label></th>
                          
                        </thead>
                    
                      <tbody>
                      <?php foreach ($getcustomers as $customer) { ?>
                      <tr>
                        <td><?php if($customer['Status_Desc']!=''){ echo $customer['Status_Desc']; }else{ echo "n/a"; } ?></td>  
                        <td><?php echo $customer['First_Name'] ?></td>  
                        <td><?php echo $customer['Last_Name'] ?></td>
                        <td><?php
                            $pol =  mysqli_query($db, "SELECT
                                 customer_policy.PolicyNo as cpolicyno
                                 FROM `customer_policy` 
                                 WHERE Customer_ID='".$customer['customerids']."'
                               ORDER BY customer_policy.Review_Date DESC
                              ");
                              @$getPol = fetch_all_array($pol);
                              foreach ($getPol as $p) {
                                 echo $p['cpolicyno']."<br/>";
                              }
                             
                        ?></td>
                        <td>
                            <?php 
                              $add =  mysqli_query($db, "SELECT
                                                    customer_address.City,
                                                    customer_address.County,
                                                    customer_address.Zip,
                                                    customer_address.Address1,
                                                    customer_address.Address2,
                                                    customer_address.State_ID
                                                   FROM `customer_address` 
                                                   WHERE Customer_ID='".$customer['customerids']."'
                                                  ORDER BY customer_address.Review_Date DESC
                                                ");
                                                @$getADD = fetch_all_array($add);
                      
                              foreach ($getADD as $add) {
                                echo "> ". $add['Address1'].' '.$customer['City'].' '.$customer['County'].' '.$customer['State_ID'].' '.$customer['Zip']."<br/>";
                                echo "> ".$add['Address2'].' '.$customer['City'].' '.$customer['County'].' '.$customer['State_ID'].' '.$customer['Zip'];
                              }
                              
                            ?>    
                        </td>
                        <td><?php echo $customer['Email'] ?></td> 
                        <td><?php if(!is_array(isJson($customer['cphone']))){ 
                                 if($customer['cphone']!='' || $customer['cphone']!=0 || $customer['cphone']!=null)
                                {
                                  echo $phone = "(".substr(substr($customer['cphone'], 0, -7), -3).') '.substr(substr($customer['cphone'],0,-4),-3).'-'.substr($customer['cphone'],-4);
                                }else{
                                   echo $phone = "<span class='text-warning'>n/a</span>";
                                }
                              }else{
                                for($c = 0 ; $c < count(json_decode($customer['cphone'])) ; $c++){
                                    $conts = json_decode($customer['cphone']);
                                    echo $phone = "(".substr(substr($conts[$c], 0, -7), -3).') '.substr(substr($conts[$c],0,-4),-3).'-'.substr($conts[$c],-4)."<br/>";
                                }             
                              }
                          ?>
                            
                          </td>
                        <td><?php  if($customer['businessname']=='' ||$customer['businessname']==null){ echo "<span class='text-warning'>n/a</span>"; }else{ echo $customer['businessname']; } ?></td>
                         <td><?php if($customer['Review_Date'] == 0 ) { echo "n/a"; } else { echo @date("m/d/Y",$customer['Review_Date']); } ?></td>
                        <td><span><a href="../customer/customer_information?ret=<?php echo $customer['custid']; ?>" class="text-primary" target="_blank"><i class="fa fa-pencil"> </i> Edit</a></span></td>
                        <td><span><a href="../calendar/calendar_add?ret=<?php echo $customer['custid']; ?>" class="text-primary" target="_blank"><i class="fa fa-pencil"> </i> Add Event</a></span></td>
                      </tr>

                    <?php } ?>
                    </tbody>
                </table>
<?php }
else
{
    $HTML='No Data Found';
}
echo $HTML;

echo $pagination;

closedb();
?>