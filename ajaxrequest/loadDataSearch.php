<?php
ini_set('memory_limit', '-1');
set_include_path('../include');
require("db/dbconnect.php");
include("ifjson/isjson.php");
require("sqlscripts/sqlscripts.php");
$unixtime=time();
opendb();
$where = '';

if(isset($_POST['search']))
{
  $date = strtotime($_POST['search']);
  $where = "WHERE customers.Last_Name LIKE LOWER('%".$_REQUEST['where']."%') OR customers.First_Name LIKE LOWER('%".$_REQUEST['where']."%') 
    OR ( CONCAT_WS(' ', customers.First_Name, customers.Last_Name) LIKE LOWER('%".$_REQUEST['where']."%') ) OR ( CONCAT_WS(' ', customers.Last_Name, customers.First_Name) LIKE LOWER('%".$_REQUEST['where']."%') ) OR customer_address.Address1 LIKE LOWER('%".$_REQUEST['where']."') 
    OR customer_address.City LIKE LOWER('%".$_REQUEST['where']."') OR customer_address.County LIKE LOWER('%".$_REQUEST['where']."') 
    OR customer_address.State_ID LIKE LOWER('%".$_REQUEST['where']."') OR customer_address.Zip LIKE LOWER('%".$_REQUEST['where']."') 
    OR ( CONCAT_WS(' ', customer_address.Address1, customer_address.City, customer_address.County, customer_address.State_ID, customer_address.Zip) 
    LIKE LOWER('%".$_REQUEST['where']."') ) OR customer_phone.Phone LIKE '%".$_REQUEST['where']."' OR customers.Email LIKE '%".$_REQUEST['where']."'";
}
$query  = "select * from customers $where ORDER BY CustomerID DESC ";
$res    = mysqli_query($db,$query);
$count  = mysqli_num_rows($res);
$recordsPerPage = $count;
if($recordsPerPage > 0)
{
  $pagination = "<br/>Total Results Found:".$recordsPerPage;
}else{
   $pagination = "";
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
                      customers.Review_Date,
                      customer_address.City,
                      customer_address.County,
                      customer_address.Zip,
                      customer_address.Address1,
                      customer_address.State_ID,
                      customer_business.businessname,
                      customer_phone.Phone as cphone,
                      customer_phone.Phonetype as cphonetype,
                      customer_phone.id as phoneid
                      FROM `customers`
                      LEFT JOIN `customer_address` on customers.Address_ID=customer_address.Address_ID
                      LEFT JOIN `customer_business` on customers.CustomerID=customer_business.CustomerID
                      LEFT JOIN `customer_phone` on customers.CustomerID=customer_phone.CustomerID
                      $where
                      ORDER BY customers.CustomerID DESC
                      LIMIT $recordsPerPage
                      ");
    $getcustomers = fetch_all_array($querys);

$count  =   count($getcustomers);
$HTML='';
if($count > 0)
{ ?>
    <table class="table table-striped no-margin" id="listcus">
                        <thead>
                          
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
                            <label><b>Phone #</b></label>
                          </th>
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
                        <!-- $customer['customerids'] -->
                        <td><?php echo $customer['First_Name'] ?></td>  
                        <td><?php echo $customer['Last_Name'] ?></td>
                        <td><?php 
                          $pol =  mysqli_query($db, "SELECT DISTINCT(customer_policy.Customer_ID),
                                customer_policy.PolicyNo as cpolicyno
                                FROM `customer_policy` 
                                WHERE Customer_ID='".$customer['customerids']."'
                                GROUP BY customer_policy.Customer_ID
                                ORDER BY customer_policy.Review_Date DESC
                              ");
                            @$getPol = mysqli_fetch_assoc($pol);
                            // echo $getPol['cpolicyno'];
                            if($getPol['cpolicyno']=='' || $getPol['cpolicyno']==null){ echo "<span class='text-warning'>n/a</span>"; }else{ echo $getPol['cpolicyno']; }
                        ?></td>
                        <td><?php echo $customer['Address1'].', '.$customer['City'].' '.$customer['County'].', '.$customer['State_ID'].' '.$customer['Zip'] ?></td>
                        <td><?php echo $customer['Email'] ?></td>  
                        <td>
                        <?php if(!is_array(isJson($customer['cphone']))){ 
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
                          ?></td>
                        <td><?php  if($customer['businessname']=='' ||$customer['businessname']==null){ echo "<span class='text-warning'>n/a</span>"; }else{ echo $customer['businessname']; } ?></td>
                         <td><?php echo @date("m/d/Y",$customer['Review_Date']); ?></td>
                        <td><span><a href="../customer/customer_information?ret=<?php echo $customer['custid']; ?>" class="text-primary" target="_blank"><i class="fa fa-pencil"> </i> edit</a></span></td>
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